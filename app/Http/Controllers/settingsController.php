<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\guideline_anniversary;

class settingsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $data = guideline_anniversary::first();
        return view('Backend.User.other_setting.guideline_anniversary',compact('data'));
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'description'=>'required',
        ]);

        $insert = guideline_anniversary::where('id',1)->update(['description'=>$request->description]);
        if($insert)
        {
            return redirect()->back()->with('success','Data Update Successfully');
        }
        else
        {
            return redirect()->back()->with('error','Data Update Unsuccessfull');
        }
    }
}
