<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\terms_condition;

class termsConditionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data = terms_condition::first();
        return view('Backend.User.terms_condition.index',compact('data'));
    }
    public function terms_condition_update(Request $request)
    {
        $update = terms_condition::find(1)->update([
            'description'=>$request->description,
        ]);

        if($update)
        {
            return redirect()->back()->with('success','Data Updated Successfully');
        }
        else
        {
            return redirect()->back()->with('error','Data Updated Unsuccessfully');
        }
    }
}
