<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\committee_info;

class committeeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        return view('Backend.User.committee.create');
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'serial_no'=>'required',
            'committee_name'=>'required',
            'status'=>'required',
        ]);

        $insert = committee_info::create($request->except('_token','submit'));
        if($insert)
        {
            return redirect()->back()->with('success','Data Insert Successfully');
        }
        else
        {
            return redirect()->back()->with('error','Data Insert Unsuccessfully');
        }
    }
    public function view()
    {
        $data = committee_info::all();
        return view('Backend.User.committee.index',compact('data'));
    }
    public function edit($id)
    {
        $data = committee_info::find($id);
        return view('Backend.User.committee.edit',compact('data'));
    }
    public function update(Request $request,$id)
    {
        $validated = $request->validate([
            'serial_no'=>'required',
            'committee_name'=>'required',
            'status'=>'required',
        ]);

        $insert = committee_info::where('id',$id)->update($request->except('_token','submit'));
        if($insert)
        {
            return redirect()->back()->with('success','Data Update Successfully');
        }
        else
        {
            return redirect()->back()->with('error','Data Update Unsuccessfully');
        }
    }
    public function delete($id)
    {
        $delete = committee_info::find($id)->delete();
        if($delete)
        {
            return redirect()->back()->with('success','Data Delete Successfully');
        }
        else
        {
            return redirect()->back()->with('error','Data Delete Unsuccessfully');
        }
    }
}
