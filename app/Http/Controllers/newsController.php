<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\news_info;

class newsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $data = news_info::all();
        $sl = 1;
        return view('Backend.User.other_setting.add_news',compact('data','sl'));
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'=>'required',
            'image'=>'required',
        ]);

        $insert = news_info::create($request->except('_token','submit'));
        if($insert)
        {
            $file = $request->file('image');

            if($file)
            {
                $image_name = rand().'.'.$file->getClientOriginalExtension();

                $file->move(public_path().'/Backend/assets/images/news/',$image_name);

                news_info::find($insert->id)->update(['image'=>$image_name]);
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
        $data = news_info::find($id);
        return view('Backend.User.other_setting.edit_news',compact('data'));
    }
    public function update(Request $request,$id)
    {
        // dd($request->all());
        // return $id;
        $validated = $request->validate([
            'title'=>'required',
            // 'image'=>'required',
        ]);

        $insert = news_info::where('id',$id)->update($request->except('_token','submit','image'));

        $file = $request->file('image');

        if($file)
        {
            $pathImage = news_info::find($id);

            $path = public_path().'/Backend/assets/images/news/'.$pathImage->image;

            // return $path;

            if(file_exists($path))
            {
                unlink($path);
            }
        }

        if($file)
        {
            $image_name = rand().'.'.$file->getClientOriginalExtension();

            $file->move(public_path().'/Backend/assets/images/news/',$image_name);

            news_info::where('id',$id)->update(['image'=>$image_name]);
        }

        if($insert)
        {
            return redirect('/add_news')->with('success','Data Update Successfully');
        }
        else
        {
            return redirect()->back()->with('error','Data Update Unsuccessfull');
        }
    }
    public function delete($id)
    {
        $pathImage = news_info::find($id);

        $path = public_path().'/Backend/assets/images/news/'.$pathImage->image;

        // return $path;

        if(file_exists($path))
        {
            unlink($path);
        }

        $delete = news_info::where('id',$id)->delete();

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
