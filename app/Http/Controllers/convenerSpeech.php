<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\convener_speech;

class convenerSpeech extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $data = convener_speech::first();
        return view('Backend.User.other_setting.convener_speech',compact('data'));
    }
    public function store(Request $request)
    {
        $insert = convener_speech::where('id',1)->update($request->except('_token','submit','image'));

        $file = $request->file('image');

        if($file)
        {
            $pathImage = convener_speech::find(1);

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

            convener_speech::find(1)->update(['image'=>$image_name]);
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
