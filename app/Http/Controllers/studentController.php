<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\present_students;
use App\Models\ex_students;
use App\Models\family_member_info;

class studentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function presentStudent()
    {
        $data = present_students::all();
        $sl=1;
        return view('Backend.User.studentInfo.present_student',compact('data','sl'));
    }
    public function ex_students()
    {
        return view('Backend.User.studentInfo.ex_students');

    }
    public function familyMember()
    {
        return view('Backend.User.studentInfo.family_member');

    }
    public function getpresentStudents(Request $request)
    {
        // return $request->data;

        $data = present_students::where('registration_id','like','%'.$request->data.'%')->first();

        return view('Backend.User.studentInfo.get_present',compact('data'));
    }
    public function getexStudents(Request $request)
    {
        // return $request->data;

        $data = ex_students::where('registration_id','like','%'.$request->data.'%')->first();

        return view('Backend.User.studentInfo.get_ex',compact('data'));
    }

    public function getfamilyMember(Request $request)
    {
        $data = family_member_info::where('family_member_id','like','%'.$request->data.'%')
                ->join('ex_students','ex_students.id','=','family_member_infos.student_id')
                ->select('family_member_infos.*','ex_students.name','ex_students.last_class','ex_students.session')
                ->first();

        return view('Backend.User.studentInfo.get_family',compact('data'));
    }
    
    public function ex_payment_report()
    {
        $data = ex_students::where('payment',1)->get();
        $sl = 1;
        return view('Backend.User.studentInfo.ex_payment_report',compact('data','sl'));
    }
}
