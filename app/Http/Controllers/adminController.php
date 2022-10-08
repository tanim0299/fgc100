<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\User;
use Hash;

class adminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        return view('Backend.User.admin.create');
    }
    public function store(Request $request)
    {
        // return $request->all();
        $validated = $request->validate([
            'name'=>'required',
            'email'=>'required|unique:users',
            'password'=>'required',
        ]);

        if($request->password == $request->password_confirmation)
        {
             $insert = DB::table('users')->insertGetId([
                'name'=>$request->name,
                'email'=>$request->email,
                'password'=>Hash::make($request->password),
                'adress'=>$request->adress,
                'phone'=>$request->phone,
                'password_recover'=>$request->password,
             ]);

             $file = $request->file('image');

             if($file)
             {
                $image_name = rand().'.'.$file->getClientOriginalExtension();

                $file->move(public_path().'/Backend/Images/adminImage',$image_name);

                DB::table('users')->where('id',$insert)->update([
                    'image'=>$image_name,
                ]);
             }

             if($insert)
             {
                return redirect()->back()->with('success','Admin Created Successfully');
             }
             else
             {
                return redirect()->back()->with('error','Admin Created Unsuccesfull');
             }
        }
        else
        {
            return redirect()->back()->with('error','Password Does Not Matched');
        }
    }
    public function view()
    {
        $data = DB::table('users')->get();
        $sl = 1;
        return view('Backend.User.admin.index',compact('data','sl'));
    }
    public function edit($id)
    {
        $data = DB::table('users')->where('id',$id)->first();
        return view('Backend.User.admin.edit',compact('data'));
    }
    public function update(Request $request,$id)
    {
        $validated = $request->validate([
            'name'=>'required',
            'email'=>'required',
            'password'=>'required',
        ]);

        if($request->password == $request->password_confirmation)
        {
            $insert = DB::table('users')
                      ->where('id',$id)
                      ->update([
                        'name'=>$request->name,
                        'email'=>$request->email,
                        'password'=>Hash::make($request->password),
                        'adress'=>$request->adress,
                        'phone'=>$request->phone,
                        'password_recover'=>$request->password,
                      ]);
            $file = $request->file('image');

            if($file)
            {
                $pathImage = DB::table('users')->where('id',$id)->first();

                $path = public_path().'/Backend/Images/adminImage/'.$pathImage->image;

                if(file_exists($path))
                {
                    unlink($path);
                }
            }

            if($file)
             {
                $image_name = rand().'.'.$file->getClientOriginalExtension();

                $file->move(public_path().'/Backend/Images/adminImage',$image_name);

                DB::table('users')->where('id',$id)->update([
                    'image'=>$image_name,
                ]);
             }

             if($insert)
             {
                return redirect()->back()->with('success','Admin Updated Successfully');
             }
             else
             {
                return redirect()->back()->with('error','Admin Updated Unsuccessfull');
             }
        }
        else
        {
            return redirect()->back()->with('error','Password Does Not Matched');
        }
    }

    public function delete($id)
    {
        
        $pathImage = DB::table('users')->where('id',$id)->first();
        
        $path = public_path().'/Backend/Images/adminImage/'.$pathImage->image;
        
        if(file_exists($path))
        {
            unlink($path);
        }
        
        $delete = DB::table('users')->where('id',$id)->delete();

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
