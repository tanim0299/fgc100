<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\about_anniversary;

class aboutAnniversary extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $data = about_anniversary::first();
        return view('Backend.User.other_setting.about_anniversary',compact('data'));
    }
    public function store(Request $request)
    {
        $insert = about_anniversary::where('id',1)->update($request->except('_token','submit','image'));

        $file = $request->file('image');

        if($file)
        {
            $pathImage = about_anniversary::find(1);

            $path = public_path().'/Backend/Images/'.$pathImage->image;

            if(file_exists($path))
            {
                unlink($path);
            }
        }

        if($file)
        {
            $image_name = rand().'.'.$file->getClientOriginalExtension();

            $file->move(public_path().'/Backend/Images/',$image_name);

            about_anniversary::find(1)->update(['image'=>$image_name]);
        }

        if($insert)
        {
            return redirect()->back()->with('success','Data Insert Successfull');
        }
        else
        {
            return redirect()->back()->with('error','Data Insert Unsuccessfull');
        }
    }
}
