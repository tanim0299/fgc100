<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\photo_gallery;

class photogalleryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $data = photo_gallery::all();
        $sl=1;
        return view('Backend.User.other_setting.add_photo',compact('data','sl'));
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'=>'required',
            'image'=>'required',
        ]);

        $insert = photo_gallery::create($request->except('_token','submit'));
        if($insert)
        {
            $file = $request->file('image');
            
            if($file)
            {
                $image_name = rand().'.'.$file->getClientOriginalExtension();
                
                $file->move(public_path().'/Backend/assets/images/gallery/',$image_name);
                
                photo_gallery::where('id',$insert->id)->update(['image'=>$image_name]);
            }
            return redirect()->back()->with('success','Data Insert Successfully');
        }
        else
        {
            return redirect()->back()->with('error','Data Insert Unsuccessfull');
        }
    }
    public function edit($id)
    {
        $data = photo_gallery::find($id);
        return view('Backend.User.other_setting.edit_photo',compact('data'));
    }
    public function update(Request $request,$id)
    {
        $validated = $request->validate([
            'title'=>'required',
        ]);

        $insert = photo_gallery::where('id',$id)->update($request->except('_token','submit','image'));

        $file = $request->file('image');

        if($file)
        {
            $pathImage = photo_gallery::find($id);
            
            $path = public_path().'/Backend/assets/images/gallery/'.$pathImage->image;

            if(file_exists($path))
            {
                unlink($path);
            }
        }

        if($file)
        {
            $image_name = rand().'.'.$file->getClientOriginalExtension();
            
            $file->move(public_path().'/Backend/assets/images/gallery/',$image_name);
            
            photo_gallery::where('id',$id)->update(['image'=>$image_name]);
        }

        if($insert)
        {
            return redirect('/add_photo')->with('success','Data Update Successfully');
        }
        else
        {
            return redirect()->back()->with('error','Data Update Unsuccessfull');
        }

    }

    public function delete($id)
    {
        $pathImage = photo_gallery::find($id);
            
        $path = public_path().'/Backend/assets/images/gallery/'.$pathImage->image;

        if(file_exists($path))
        {
            unlink($path);
        }

        $delete = photo_gallery::find($id)->delete();

        if($delete)
        {
            return redirect()->back()->with('success','Data Delete Successfully');
        }
        else
        {
            return redirect()->back()->with('error','Data Delete Unsuccessfull');
        }
    }
}
