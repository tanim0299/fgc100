<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\refund_policy;

class refundPolicyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $data = refund_policy::first();
        return view('Backend.User.refund_policy.index',compact('data'));
    }
    public function update(Request $request)
    {
        $update = refund_policy::find(1)->update([
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
