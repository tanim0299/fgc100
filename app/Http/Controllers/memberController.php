<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\committee_info;
use App\Models\member_info;
use DB;
use Image;

class memberController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $committee = committee_info::where('status',1)->get();
        return view('Backend.User.member.create',compact('committee'));
    }
    public function store(Request $request)
    {
        // dd($request->all());

        $validated = $request->validate([
            'name'=>'required',
            'committee'=>'required',
            'designation'=>'required',
            'workplace'=>'required',
            'type'=>'required',
            'status'=>'required',
            'image'=>'mimes:jpeg,png,gif|max:2048',
        ]);

        $insert = member_info::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'committee_id'=>$request->committee,
            'designation'=>$request->designation,
            'workplace'=>$request->workplace,
            'adress'=>$request->adress,
            'admin_id'=>$request->admin_id,
            'type'=>$request->type,
            'image'=>'0',
            'status'=>$request->status,
        ]);

        if($insert)
        {
            $file = $request->file('image');
            
            if($file)
            {
                $file = $request->file('image');
                $image_name = rand().'.'.$file->getClientOriginalExtension();

                $path = public_path().'/Backend/Images/MemberImage/';

                $img = Image::make($request->file('image')->getRealPath());


                $img->resize(400, 400, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($path.'/'.$image_name);


                // $file->move(public_path().'/Backend/Images/MemberImage/',$image_name);
                member_info::where('id',$insert->id)->update(['image'=>$image_name]);
            }

            return redirect()->back()->with('success','Data Insert Successfully');
        }
        else
        {
            return redirect()->back()->with('error','Data Insert Unsuccessfull');
        }
    }

    public function view()
    {
        $data = member_info::join('committee_infos','committee_infos.id','=','member_infos.committee_id')
                ->select('member_infos.*','committee_infos.committee_name')
                ->get();
        $sl = 1;
        return view('Backend.User.member.index',compact('data','sl'));
    }
    public function edit($id)
    {
        $committee = committee_info::where('status',1)->get();
        $data = member_info::find($id);
        return view('Backend.User.member.edit',compact('data','committee'));
    }
    public function update(Request $request,$id)
    {
        $validated = $request->validate([
            'name'=>'required',
            'committee'=>'required',
            'designation'=>'required',
            'workplace'=>'required',
            'type'=>'required',
            'status'=>'required',
        ]);

        $insert = member_info::find($id)->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'committee_id'=>$request->committee,
            'designation'=>$request->designation,
            'workplace'=>$request->workplace,
            'adress'=>$request->adress,
            'admin_id'=>$request->admin_id,
            'type'=>$request->type,
            'status'=>$request->status,
            'committee_type'=>$request->committee_type,
        ]);

        if($insert)
        {

            $file = $request->file('image');
    
            if($file)
            {
                $pathImage = member_info::find($id);
                $path = public_path().'/Backend/Images/MemberImage/'.$pathImage->image;
    
                if(file_exists($path))
                {
                    unlink($path);
                }
            }
    
            if($file)
            {
                $image_name = rand().'.'.$file->getClientOriginalExtension();
                $path = public_path().'/Backend/Images/MemberImage/';

                $img = Image::make($request->file('image')->getRealPath());


                $img->resize(400, 400, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($path.'/'.$image_name);
                member_info::where('id',$id)->update(['image'=>$image_name]);
            }

            return redirect('view_member')->with('success','Data Update Successfully');
        }
        else
        {
            return redirect()->back()->with('error','Data Update Unsuccessfull');
        }
    }

    public function delete($id)
    {
        $pathImage = member_info::find($id);
        $path = public_path().'/Backend/Images/MemberImage/'.$pathImage->image;

        if(file_exists($path))
        {
            unlink($path);
        }

        $delete = member_info::find($id)->delete();
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
