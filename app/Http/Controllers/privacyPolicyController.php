<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\privacy_policy;

class privacyPolicyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $data = privacy_policy::first();
        return view('Backend.User.privacy_policy.index',compact('data'));
    }
    public function update(Request $request)
    {
        $update = privacy_policy::find(1)->update([
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
