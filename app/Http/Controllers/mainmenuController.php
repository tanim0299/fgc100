<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\main_menu;
use DB;

class mainmenuController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        return view('Backend.User.main_menu.create');
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'sl' => 'required|unique:main_menu',
            'link_name' => 'required|min:5',
            'status' => 'required',
        ]);
    
        $insert = main_menu::create($request->except('_token','submit'));
    
        if($insert)
        {
            return redirect()->back()->with('success','Data Insert Successfully');
        }
        else
        {
            return redirect()->back()->with('error','Data Insert Unsuccessfull!');
        }
    
    
        
    }
    public function view()
    {
        $data = main_menu::all();
        return view('Backend.User.main_menu.index',compact('data'));
    }
    public function edit($id)
    {
        $data = DB::table('main_menu')->where('id',$id)->first();
        return view('Backend.User.main_menu.edit',compact('data'));
    }
    public function update(Request $request,$id)
    {
        $validated = $request->validate([
            'sl' => 'required',
            'link_name' => 'required|min:5',
            'status' => 'required',
        ]);
    
        $update = DB::table('main_menu')->where('id',$id)->update($request->except('_token','submit'));

        if($update)
        {
            return redirect()->back()->with('success','Data Update Successfully');
        }
        else
        {
            return redirect()->back()->with('error','Data Update Unsuccessfull!');
        }
    }
    public function delete($id)
    {
        $delete = main_menu::find($id)->delete();

        if($delete)
        {
            return redirect()->back()->with('success','Data Delete Successfully');
        }
        else
        {
            return redirect()->back()->with('error','Data Delete Unsuccessfull!');
        }
    }
}
