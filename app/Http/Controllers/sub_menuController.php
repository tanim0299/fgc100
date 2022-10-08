<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\main_menu;
use App\Models\sub_menu;
use DB;

class sub_menuController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $main_menu = main_menu::all()->where('status','1');
        return view('Backend.User.submenu.create',compact('main_menu'));
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'sl' => 'required|unique:sub_menu',
            'main_menuid' => 'required',
            'submenu_name' => 'required|min:5',
            'status' => 'required',
        ]);
    
        $insert = DB::table('sub_menu')->insert($request->except('_token','submit'));
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
        $data = DB::table('sub_menu')
                ->join('main_menu','main_menu.id','=','sub_menu.main_menuid')
                ->select('main_menu.link_name','sub_menu.*')
                ->get();
        return view('Backend.User.submenu.index',compact('data'));
    }
    public function edit($id)
    {
        $main_menu = DB::table('main_menu')->get()->where('status','1');
        $data = sub_menu::find($id);
        return view('Backend.User.submenu.edit',compact('data','main_menu'));
    }
    public function update(Request $request,$id)
    {
        $validated = $request->validate([
            'sl' => 'required',
            'main_menuid' => 'required',
            'submenu_name' => 'required',
            'status' => 'required',
        ]);
    
            // dd($request->all());
    
        $update = DB::table('sub_menu')->where('id',$id)->update($request->except('_token','submit'));
    
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
        $delete = sub_menu::find($id)->delete();
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
