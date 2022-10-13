<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\present_students;
use App\Models\ex_students;
use App\Models\family_member_info;
use App\Models\student_user;
use Auth;
use DB;
use Hash;
use Image;
use App\Lib\Adnsms\lib\AdnSmsNotification;

class RegistrationController extends Controller
{
    public function AutoCode($table, $fildname, $prefix, $length)
    {
        $id_length = $length;
        $max_id = DB::table($table)->max($fildname);
        $prefix = $prefix;
        $prefix_length = strlen($prefix);
        $only_id = substr($max_id, $prefix_length);
        $new = (int)($only_id);
        $new++;
        $number_of_zero = $id_length - $prefix_length - strlen($new);
        $zero = str_repeat("0", $number_of_zero);
        $made_id = $prefix . $zero . $new;
        return $made_id;
    }
    public function present_registration(Request $request)
    {

        $validated = $request->validate(
            [
                'name' => 'required',
                'phone' => 'required|max:11|min:11|unique:present_students|unique:student_users',
                'image' => 'mimes:jpeg,png,jpg,gif|max:2048',
                'fathers_name' => 'required',
                'mothers_name' => 'required',
                'gender' => 'required',
                'session' => 'required',
            ],
            [
                'name.required' => 'আপনার নাম দিন',
                'phone.required' => 'আপনার মোবাইল নাম্বার দিন',
                'phone.max' => 'মোবাইল নাম্বার সর্বোচ্চ ডিজিট ১১',
                'phone.min' => 'মোবাইল নাম্বার সর্বনিম্ন ডিজিট ১১',
                'phone.unique' => 'এই মোবাইল নাম্বারটি দ্বারা রেজিষ্ট্রেশন সম্পন্ন হয়েছে',
                'fathers_name.required' => 'আপনার পিতার নাম দিন',
                'mothers_name.required' => 'আপনার মাতার নাম দিন',
                'gender.required' => 'লিঙ্গ নির্বাচন করুন',
                'session.required' => 'আপনার শিক্ষাবর্ষ দিন',
            ]
        );

        $registration_id = $this->AutoCode('present_students', 'registration_id', 'RS-', '10');


        $total_ammount = 1000;

        $data = array(
            'registration_id' => $registration_id,
            'name' => $request->name,
            'fathers_name' => $request->fathers_name,
            'mothers_name' => $request->mothers_name,
            'gender' => $request->gender,
            'address' => $request->address,
            'admisson_time_classroll' => $request->admisson_time_classroll,
            'admission_year' => $request->admission_year,
            'present_class' => $request->present_class,
            'registration_number' => $request->registration_number,
            'roll_number' => $request->roll_number,
            'session' => $request->session,
            'phone' => $request->phone,
            't_shirt' => $request->t_shirt,
            'total_member' => 1,
            'total_ammount' => $total_ammount,
            'image' => '0',
        );
        $insert = present_students::create($data);

        if ($insert) {
            $id = $insert->id;

            $file = $request->file('image');
            if ($file) {
                $imageName = rand() . '.' . $file->getClientOriginalExtension();


                $img = Image::make($request->file('image')->getRealPath());

                $path = public_path() . '/Backend/Images/StudentImage/';
                $img->resize(100, 100, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($path . '/' . $imageName);

                present_students::find($id)->update(['image' => $imageName]);
            }

            $password = rand(1000, 9999);

            student_user::create([
                'student_id' => $registration_id,
                'student_type' => 1,
                'email' => $request->email,
                'phone' => $request->phone,
                'password' => Hash::make($password),
                'pass_recover' => $password,
            ]);
            $message = 'Your Registration  Successfully Done. User ID:' . $request->phone . ' Password:' . $password . 'Please Pay Your Registration Fee';
            $recipient = $request->phone;       // For SINGLE_SMS or OTP
            $requestType = 'SINGLE_SMS';    // options available: "SINGLE_SMS", "OTP"
            $messageType = 'TEXT';         // options available: "TEXT", "UNICODE"
            $sms = new AdnSmsNotification();
            $sms->sendSms($requestType, $message, $recipient, $messageType);
            // return 1;
            return redirect('/present_payment/' . $insert->id)->with('success', 'আপনার রেজিষ্ট্রেশন সম্পন্ন হয়েছে');
        } else {
            return redirect()->back()->with('error', 'রেজিষ্ট্রেশন সম্পন্ন হয়নি। দয়া করে আবার দেখুন');
        }
    }
    public function ex_registration(Request $request)
    {
        // dd($request->all());



        $validated = $request->validate(
            [
                'name' => 'required',
                'phone' => 'required|max:11|min:11|unique:ex_students|unique:student_users',
                'image' => 'mimes:jpeg,png,jpg,gif|max:2048',
                'family_member_image' => 'mimes:jpeg,png,jpg,gif|max:2048',
                'fathers_name' => 'required',
                'mothers_name' => 'required',
            ],
            [
                'name.required' => 'আপনার নাম দিন',
                'phone.required' => 'আপনার মোবাইল নাম্বার দিন',
                'phone.max' => 'মোবাইল নাম্বার সর্বোচ্চ ডিজিট ১১',
                'phone.min' => 'মোবাইল নাম্বার সর্বনিম্ন ডিজিট ১১',
                'phone.unique' => 'এই মোবাইল নাম্বারটি দ্বারা রেজিষ্ট্রেশন সম্পন্ন হয়েছে',
                'fathers_name.required' => 'আপনার পিতার নাম দিন',
                'mothers_name.required' => 'আপনার মাতার নাম দিন',
            ]
        );

        $registration_id = $this->AutoCode('ex_students', 'registration_id', 'PS-', '10');
        $total_ammount = '';
        $total_member = '';
        if ($request->family_member == 'yes') {
            $total_member = 2;
            $total_ammount = 6000;
        } else {
            $total_member = 1;
            $total_ammount = 3000;
        }
        $data = array(
            'registration_id' => $registration_id,
            'name' => $request->name,
            'fathers_name' => $request->fathers_name,
            'mothers_name' => $request->mothers_name,
            'gender' => $request->gender,
            'address' => $request->address,
            'last_class' => $request->last_class,
            'registration_number' => $request->registration_number,
            'roll_number' => $request->roll_number,
            'passing_year' => $request->passing_year,
            'session' => $request->session,
            'occupation' => $request->occupation,
            'designation' => $request->designation,
            'phone' => $request->phone,
            'email' => $request->email,
            't_shirt' => $request->t_shirt,
            'total_member' => $total_member,
            'registraiton_fee' => 3000,
            'total_ammount' => $total_ammount,
            'image' => '0',
        );

        $insert = ex_students::create($data);

        if ($insert) {
            $id = $insert->id;

            $password = rand(1000, 9999);

            student_user::create([
                'student_id' => $registration_id,
                'student_type' => 0,
                'email' => $request->email,
                'phone' => $request->phone,
                'password' => Hash::make($password),
                'pass_recover' => $password,
            ]);

            $message = 'Your Registration  Successfully Done. User ID:' . $request->phone . ' Password:' . $password . 'Please Pay Your Registration Fee';
            $recipient = $request->phone;       // For SINGLE_SMS or OTP
            $requestType = 'SINGLE_SMS';    // options available: "SINGLE_SMS", "OTP"
            $messageType = 'TEXT';         // options available: "TEXT", "UNICODE"
            $sms = new AdnSmsNotification();
            $sms->sendSms($requestType, $message, $recipient, $messageType);

            if ($request->family_member == 'yes') {
                $insertFamily = family_member_info::create([
                    'student_id' => $registration_id,
                    'family_member_id' => $this->AutoCode('family_member_infos', 'family_member_id', 'FM-', '10'),
                    'family_member_name' => $request->family_member_name,
                ]);

                if ($insertFamily) {
                    $id = $insertFamily->id;
                    $file = $request->file('family_member_image');

                    if ($file) {
                        $imageName = rand() . '.' . $file->getClientOriginalExtension();

                        $img = Image::make($request->file('image')->getRealPath());

                        $path = public_path() . '/Backend/Images/FamilyMember/';
                        $img->resize(100, 100, function ($constraint) {
                            $constraint->aspectRatio();
                        })->save($path . '/' . $imageName);

                        family_member_info::find($id)->update(['family_member_image' => $imageName]);
                    }
                }
            }


            $file = $request->file('image');

            if ($file) {
                $id = $insert->id;
                $imageName = rand() . '.' . $file->getClientOriginalExtension();

                $img = Image::make($request->file('image')->getRealPath());

                $path = public_path() . '/Backend/Images/StudentImage/';
                $img->resize(100, 100, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($path . '/' . $imageName);

                ex_students::find($id)->update(['image' => $imageName]);
            }


            return redirect('/ex_payment/' . $insert->id)->with('success', 'আপনার রেজিষ্ট্রেশন সম্পন্ন হয়েছে');
        }
    }


    public function presentpayment($id)
    {
        $data = present_students::find($id);
        if ($data->payment == 1) {
            return redirect('/');
        } else {

            return view('Frontend.User.present_payment', compact('data'));
        }
    }
    public function expayment($id)
    {
        $data = ex_students::find($id);
        if ($data->payment == 1) {
            return redirect('/');
        } else {

            return view('Frontend.User.ex_payment', compact('data'));
        }
    }


    public function check_phone(Request $request)
    {
        $check = student_user::where('phone',$request->phone_data)->count();
        
        if($check == 1)
        {
            return 0;
        }
        else
        {
            return 1;
        }
    }

    public function foget_pass(){
        return view('Frontend.Student.reset_pass');
    }

    public function verify_number(Request $request)
    {
        // dd($request->all());
        $check  = student_user::where('phone',$request->phone)->count();

        if($check == 1)
        {
            DB::table('reset_passwords')->where('phone',$request->phone)->delete();

            $otp = rand(1000,9999);

            $message = 'Your OTP is '. $otp;
            $recipient = $request->phone;       // For SINGLE_SMS or OTP
            $requestType = 'SINGLE_SMS';    // options available: "SINGLE_SMS", "OTP"
            $messageType = 'TEXT';         // options available: "TEXT", "UNICODE"
            $sms = new AdnSmsNotification();
            $sms->sendSms($requestType, $message, $recipient, $messageType);

            DB::table('reset_passwords')->insert([
                'phone'=>$request->phone,
                'otp'=>$otp,
            ]);


            return redirect('/otp/'.$request->phone);
        }
        else
        {
            return redirect()->back()->with('error','Your Phone Number Does Not Found');
        }
    }

    public function otp($phone)
    {
        $data = DB::table('reset_passwords')->where('phone',$phone)->first();
        return view('Frontend.Student.otp',compact('data'));
    }
    public function verify_otp(Request $request)
    {
        $validated = $request->validate([
            'otp'=>'required|max:4|min:4',
        ],
        [
            'otp.required'=>'OTP Is Required',
            'otp.max'=>'OTP Must Be At Least 4 Character',
            'otp.min'=>'OTP Must Be At Least 4 Character ',
        ]);

        $check = DB::table('reset_passwords')->where('phone',$request->phone)->where('otp',$request->otp)->count();
        if($check == 1)
        {
            return redirect('/change_pass/'.$request->phone);
        }
        else
        {
            return redirect()->back()->with('error','OTP Does Not Matched');
        }
        
    }
    public function change_pass($phone)
    {
        return view('Frontend.student.change_pwd',compact('phone'));
    }
    public function change_password(Request $request)
    {
        $validated = $request->validate([
            'password'=>'required|max:4|min:4',
        ],[
            'password.required'=>'Password Is Required',
            'password.max'=>'Password Must Be At Least 4 Character',
            'password.min'=>'Password Must Be At Least 4 Character ',
        ]);

        $update = student_user::where('phone',$request->phone)->update([
            'password'=>Hash::make($request->password),
            'pass_recover'=>$request->password,
        ]);

        if($update){
            return redirect('/student_login');
        }
        else
        {
            return redirect()->back()->with('erorr','Something Went Wrong');
        }
    }
}
