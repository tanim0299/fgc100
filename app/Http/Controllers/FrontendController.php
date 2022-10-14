<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\member_info;
use App\Models\committee_info;
use App\Models\about_anniversary;
use App\Models\convener_speech;
use App\Models\magazine;
use App\Models\news_info;
use App\Models\photo_gallery;
use App\Models\guideline_anniversary;
use App\Models\present_students;
use App\Models\ex_students;
use App\Models\family_member_info;
use App\Models\student_user;
use App\Models\terms_condition;
use App\Models\privacy_policy;
use App\Models\refund_policy;
use Exception;
use Twilio\Rest\Client;
use Auth;
use DB;
use PDF;
class FrontendController extends Controller
{
    public function index()
    {


        $main = member_info::where('committee_id',1)->where('type','main')->where('status',1)->first();
        $convneer = member_info::where('committee_id',3)->where('type','general')->where('status',1)->where('committee_type',2)->orderBy('sl','ASC')->get();
        $j_convneer = member_info::where('committee_id',3)->where('type','general')->where('status',1)->where('committee_type',1)->orderBy('sl','ASC')->get();
        $secreatary = member_info::where('committee_id',3)->where('type','general')->where('status',1)->where('committee_type',3)->orderBy('sl','ASC')->get();
        $member = member_info::where('committee_id',3)->where('type','general')->where('status',1)->where('committee_type',4)->orderBy('sl','ASC')->get();
        $about_anniversary = about_anniversary::first();
        $convener_speech = convener_speech::first();
        $news_info = news_info::get()->take(3);
        $photo = photo_gallery::get()->take(4);
        $guideline = guideline_anniversary::first();
        return view('Frontend.Layouts.home',compact('main','convneer','about_anniversary','convener_speech','news_info','photo','guideline','secreatary','member','j_convneer'));
    }
    public function advisors_panel($id)
    {
        $comm = committee_info::find($id);
        $main = member_info::where('committee_id',$id)
                ->where('type','main')
                ->where('status',1)
                ->first();
        $general = member_info::where('committee_id',$id)
                   ->where('type','general')
                   ->where('status',1)
                   ->paginate(10);
        return view('Frontend.User.advisors_panel',compact('main','comm','general'));
    }
    public function convenior_committee()
    {
        return view('Frontend.User.convenior_committee');
    }
    public function sub_committee()
    {
        return view('Frontend.User.sub_committee');
    }
    public function convenior_speach()
    {
        return view('Frontend.User.convenior_speach');
    }
    public function membersecretary_speach()
    {
        return view('Frontend.User.membersecretary_speach');
    }
    public function events()
    {
        $news_info = news_info::all();
        return view('Frontend.User.events',compact('news_info'));
    }
    public function magazine()
    {
        $data = magazine::first();
        return view('Frontend.User.magazine',compact('data'));
    }
    public function festival_gallery()
    {
        return view('Frontend.User.festival_gallery');
    }
    public function registered_students()
    {
        return view('Frontend.User.registered_students');
    }
    public function print_data()
    {
        return view('Frontend.User.print_data');
    }
    public function present_registration_form()
    {
        return view('Frontend.User.present_registration_form');
    }
    public function ex_registration_form()
    {
        return view('Frontend.User.ex_registration_form');
    }
    public function student_login()
    {
        if(Auth::guard('students')->check())
        {
            return redirect('/std_dashboard');
        }
        else
        {

            return view('Frontend.Student.login');
        }
    }
    public function studentLoginAttempt(Request $request)
    {

        // dd($request->all());
        if(Auth::guard('students')->attempt(['phone'=>$request->phone,'password'=>$request->password]))
        {
            $type = Auth::guard('students')->user()->student_type;
            if($type == 1)
            {
                $check = present_students::where('phone',$request->phone)->first();
                if($check->payment == 1)
                {
                    return redirect('/std_dashboard');
                }
                else
                {
                    return redirect('/make_payment');
                }
            }
            else
            {
                $check = ex_students::where('phone',$request->phone)->first();
                if($check->payment == 1)
                {
                    return redirect('/std_dashboard');
                }
                else
                {
                    return redirect('/make_payment');
                }
            }
        }
        else
        {
            return redirect()->back()->with('error','These Credentials Does Not Mathced To Our Record');
        }
    }
    public function student_logout()
    {
        Auth::guard('students')->logout();
        return redirect('/student_login');
    }
    public function student_dashboard()
    {
        return view('Frontend.Student.Dashboard.Layouts.home');
    }
    public function std_info_edit($type,$id)
    {
        if(Auth::guard('students')->check())
        {

            if($type == 1)
            {
                $data = present_students::where('registration_id',$id)->first();
            }
            else
            {
                $data = ex_students::where('registration_id',$id)->first();
            }
            return view('Frontend.Student.Dashboard.User.edit_info',compact('data'));
        }
        else
        {
            return redirect('/student_login');
        }
    }
    public function ex_update_info(Request $request,$id)
    {
        // dd($request->all());
        $validated = $request->validate([
            'name'=>'required',
            'phone'=>'required',
        ],
        [
            'name.required'=>'আপনার নাম দিন',
            'phone.required'=>'আপনার নাম্বার দিন',
        ]);

        $data = array(
            'name'=>$request->name,
            'fathers_name'=>$request->fathers_name,
            'mothers_name'=>$request->mothers_name,
            'gender'=>$request->gender,
            'address'=>$request->address,
            'last_class'=>$request->last_class,
            'registration_number'=>$request->registration_number,
            'roll_number'=>$request->roll_number,
            'passing_year'=>$request->passing_year,
            'session'=>$request->session,
            'occupation'=>$request->occupation,
            'designation'=>$request->designation,
            'phone'=>$request->phone,
            'email'=>$request->email,
            't_shirt'=>$request->t_shirt,
            'total_member'=>$request->total_member,
            'registraiton_fee'=>$request->reg_fee,
            'total_ammount'=>$request->total_ammount,
        );

        $update = ex_students::find($id)->update($data);

        $file = $request->file('image');

        if($file)
        {
            $pathImage = ex_students::find($id);

            $path = public_path().'/Backend/Images/studentImage/'.$pathImage->image;

            if(file_exists($path))
            {
                unlink($path);
            }
        }


        if($file)
        {
            $imageName = rand().'.'.$file->getClientOriginalExtension();

            $file->move(public_path().'/Backend/Images/StudentImage/',$imageName);

            ex_students::find($id)->update(['image'=>$imageName]);
        }

        $check = family_member_info::where('student_id',$id)->count();

        if($check > 0)
        {
            family_member_info::where('student_id',$id)->update([
                'family_member_name'=>$request->family_member_name,
            ]);

            $file = $request->file('family_member_image');

            if($file)
            {
                $pathImage = family_member_info::where('student_id',$id)->first();

                $path = public_path().'/Backend/Images/FamilyMember/'.$pathImage->family_member_image;

                if(file_exists($path))
                {
                    unlink($path);
                }
            }

            if($file)
            {
                $imageName = rand().'.'.$file->getClientOriginalExtension();

                $file->move(public_path().'/Backend/Images/FamilyMember/',$imageName);

                family_member_info::where('student_id',$id)->update(['family_member_image'=>$imageName]);

            }
        }

        if($update)
        {
            return redirect()->back()->with('success','আপনার তথ্য সমূহ আপডেট করা হয়েছে');
        }
        else
        {
            return redirect()->back()->with('error','অনুগ্রহ করে আবার চেক করুন');
        }
    }
    public function present_info_update(Request $request,$id)
    {
        $validated = $request->validate([
            'name'=>'required',
            'phone'=>'required',
        ],[
            'name.required'=>'আপনার নাম দিন',
            'phone.required'=>'আপনার নাম্বার দিন',
        ]);

        $data = array(
            'name'=>$request->name,
            'fathers_name'=>$request->fathers_name,
            'mothers_name'=>$request->mothers_name,
            'gender'=>$request->gender,
            'address'=>$request->address,
            'admisson_time_classroll'=>$request->admisson_time_classroll,
            'admission_year'=>$request->admission_year,
            'present_class'=>$request->present_class,
            'registration_number'=>$request->registration_number,
            'roll_number'=>$request->roll_number,
            'session'=>$request->session,
            'phone'=>$request->phone,
            't_shirt'=>$request->t_shirt,
            'total_member'=>$request->total_member,
            'total_ammount'=>$request->total_ammount,
        );

        $update = present_students::find($id)->update($data);

        $file = $request->file('image');

        if($file)
        {
            $pathImage = present_students::find($id);

            $path = public_path().'/Backend/Images/studentImage/'.$pathImage->image;

            if(file_exists($path))
            {
                unlink($path);
            }
        }

        if($file)
        {
            $imageName = rand().'.'.$file->getClientOriginalExtension();

            $file->move(public_path().'/Backend/Images/StudentImage/',$imageName);

            present_students::find($id)->update(['image'=>$imageName]);
        }

        if($update)
        {
            return redirect()->back()->with('success','আপনার তথ্য সমূহ আপডেট করা হয়েছে');
        }
        else
        {
            return redirect()->back()->with('error','অনুগ্রহ করে আবার চেক করুন');
        }
    }
    public function make_payment()
    {
        if(Auth::guard('students')->check())
        {
            if(Auth::guard('students')->user()->student_type == 1)
            {
                $id = Auth::guard('students')->user()->student_id;
                $data = present_students::where('registration_id',$id)->first();
            }
            else
            {
                $id = Auth::guard('students')->user()->student_id;
                $data = ex_students::where('registration_id',$id)->first();
            }
            return view('Frontend.Student.Dashboard.User.make_payment',compact('data'));
        }
        else
        {
            return redirect('/student_login');
        }
    }
    public function id_card()
    {
        if(Auth::guard('students')->check())
        {
            if(Auth::guard('students')->user()->student_type == 1)
            {
                $id = Auth::guard('students')->user()->student_id;
                $data = present_students::where('registration_id',$id)->first();
                return view('Frontend.Student.Dashboard.User.id_card',compact('data'));
            }
            else
            {
                $id = Auth::guard('students')->user()->student_id;
                $data = ex_students::where('registration_id',$id)->first();
                $family = family_member_info::where('student_id',$id)
                          ->join('ex_students','ex_students.id','=','family_member_infos.student_id')
                          ->select('ex_students.name','ex_students.last_class','ex_students.session','family_member_infos.*')
                          ->first();
                
                return view('Frontend.Student.Dashboard.User.id_card',compact('data','id','family'));
            }
        }
        else
        {
            return redirect('/student_login');
        }
    }
    public function view_news($id)
    {
        $data = news_info::find($id);
        return view('Frontend.User.view_news',compact('data'));
    }
    public function fgc_history()
    {
        $data = about_anniversary::first();
        return view('Frontend.User.fgc_history',compact('data'));
    }
    public function terms_condition()
    {
        $data = terms_condition::first();
        return view('Frontend.User.terms_condition',compact('data'));
    }
    public function privacy_policy()
    {
        $data = privacy_policy::first();
        return view('Frontend.User.privacy_policy',compact('data'));
    }
    public function refund_policy()
    {
        $data = refund_policy::first();
        return view('Frontend.User.refund_policy',compact('data'));
    }
    public function sms()
    {
        $reciver_number = '+880 1575434262';
        $message = 'আপনার মতো লোক খুব কম দেখা যায়';

        try{
            $account_sid = getenv("TWILIO_SID");
            $auth_token = getenv("TWILIO_TOKEN");
            $twilio_number = getenv("TWILIO_FROM");

            $client = new Client($account_sid, $auth_token);

            $client->messages->create($reciver_number,[
                'from' => $twilio_number,
                'body' => $message,
            ]);
            return 1;
        }catch(Exception $e){
            //
        }
    }

    public function invoice()
    {
        if(Auth::guard('students')->check())
        {
            if(Auth::guard('students')->user()->student_type == 1)
            {
                $id = Auth::guard('students')->user()->student_id;
                $data = present_students::where('registration_id',$id)->first();
                return view('Frontend.Student.Dashboard.User.invoice',compact('data'));
            }
            else
            {
                $id = Auth::guard('students')->user()->student_id;
                $data = ex_students::where('registration_id',$id)->first();
                
                return view('Frontend.Student.Dashboard.User.invoice',compact('data','id','family'));
            }
        }
        else
        {
            return redirect('/student_login');
        }
    }
    public function download_reciept()
    {
        if(Auth::guard('students')->check())
        {
            if(Auth::guard('students')->user()->student_type == 1)
            {
                $id = Auth::guard('students')->user()->student_id;
                $data = present_students::where('registration_id',$id)->first();

                $pdf = PDF::loadVIew('Frontend.Student.Dashboard.User.invoice_download',compact('data'));
                
                return $pdf->stream('invoice.pdf');
            }
            else
            {
                $id = Auth::guard('students')->user()->student_id;
                $data = ex_students::where('registration_id',$id)->first();
                $pdf = PDF::loadVIew('Frontend.Student.Dashboard.User.invoice_download',compact('data','id','family'));
                return $pdf->download('invoice.pdf');
            }
        }
        else
        {
            return redirect('/student_login');
        }
    }
}
