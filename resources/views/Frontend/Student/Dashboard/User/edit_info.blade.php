@extends('Frontend.Student.Dashboard.Layouts.master')
@section('body')
<style>
    .card.flat-card {
    padding: 30px;
}
#input-box span{
    color: red;
    font-size: 14px;
}
#input-box select:focus{
    box-shadow: none;
    border: 1px solid black;
}
#input-box input:focus{
    box-shadow: none;
    border: 1px solid black;
}
#input-box{
    margin-top: 20px;
}
.single-box span{
    margin-top: 5px;
}
.single-box a {
    text-decoration: none !important;
    color: black !important;
}

.single-box {
    text-align: center;
    padding: 10px;
}

</style>
<!-- [ Main Content ] start -->
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Edit Your Information</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('/std_dasboard')}}"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#!">Edit Your Information</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->


        <!-- [ Main Content ] start -->
        <div class="row">
            <div class="col-md-12 col-xl-12">
                <div class="card flat-card">
                    @if(Auth::guard('students')->user()->student_type == 1)
                            @if(Session::get('success'))
                        <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button> 
                                <strong>{{Session::get('success')}}</strong>
                        </div>
                        @elseif(Session::get('error'))
                        <div class="alert alert-danger alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button> 
                                <strong>{{Session::get('error')}}</strong>
                        </div>
                        @endif
                <form method="post" enctype="multipart/form-data" action="{{url('/present_info_update')}}/{{$data->id}}">
                    @csrf
                    <div class="form-group row">
                        <div class="col-lg-6 col-md-6 col-12" id="input-box">
                            <label>নাম (বাংলায়)</label> <span></span>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{$data->name}}">
                            @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-lg-6 col-md-6 col-12" id="input-box">
                            <label>পিতার নাম</label> <span></span>
                            <input type="text" name="fathers_name" class="form-control" value="{{$data->fathers_name}}">
                        </div>
                        <div class="col-lg-6 col-md-6 col-12" id="input-box">
                            <label>মাতার নাম</label> <span></span>
                            <input type="text" name="mothers_name" class="form-control" value="{{$data->mothers_name}}">
                        </div>
                        <div class="col-lg-6 col-md-6 col-12" id="input-box">
                            <label>লিঙ্গ</label>
                            <select class="form-control" name="gender">
                                <option value="" disabled=""> নির্বাচন করুন</option>
                                <option @if($data->gender == 'male') selected @endif value="male">Male</option>
                                <option @if($data->gender == 'Female') selected @endif value="Female">Female</option>
                            
                            </select>
                        </div>
                        <div class="col-lg-12 col-md-12 col-12" id="input-box">
                            <label>স্থায়ী ঠিকানা / বর্তমান ঠিকানা</label>
                            <textarea name="address" id="" cols="" rows="2" class="form-control" value={!! $data->address !!}></textarea>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12" id="input-box">
                            <label>ভর্তির সময়ের ক্লাস রোল</label>
                            <input type="text" name="admisson_time_classroll" class="form-control" value="{{$data->admission_time_classroll}}">
                        </div>
                        <div class="col-lg-6 col-md-6 col-12" id="input-box">
                            <label>ভর্তির সন</label> <span></span>
                            <input type="text" name="admission_year" class="form-control" value="{{$data->admission_year}}">
                        </div>
                        <div class="col-lg-6 col-md-6 col-6" id="input-box">
                            <label>বর্তমান অধ্যয়নরত শ্রেণী</label> <span></span>
                            <select class="form-control" name="present_class">
                                <option @if($data->present_class == NULL) selected @endif value="" disabled="" selected="">শ্রেণী নির্বাচন করুন</option>
                                <option @if($data->present_class == 'HSC') selected @endif value="HSC">এইচ এস সি</option>
                                <option @if($data->present_class == 'Degree') selected @endif value="Degree">ডিগ্রী পাস কোর্স</option>
                                <option @if($data->present_class == 'Honurs') selected @endif value="Honurs">অনার্স</option>
                                <option @if($data->present_class == 'Masters') selected @endif value="Masters">মাষ্টার্স</option>
                                
                            </select>
                        </div>
                        <div class="col-lg-6 col-md-6 col-6" id="input-box">
                            <label>রেজিষ্ট্রেশন নম্বর</label> <span>( যদি থাকে )</span>
                            <input type="text" class="form-control" name="registration_number" value="{{$data->registration_number}}">
                        </div>
                        <div class="col-lg-6 col-md-6 col-6" id="input-box">
                            <label>রোল (বোর্ড / জাতীয় বিশ্ববিদ্যালয় কর্তৃক প্রদত্ত)</label> <span>( যদি থাকে )</span>
                            <input type="text" class="form-control" name="roll_number" value="{{$data->roll_number}}">
                        </div>
                        <div class="col-lg-6 col-md-6 col-6" id="input-box">
                            <label>শিক্ষাবর্ষ</label> <span></span>
                            <input type="text" class="form-control" name="session" value="{{$data->session}}">
                        </div>
                        <div class="col-lg-6 col-md-6 col-12" id="input-box">
                            <label>মোবাইল</label> <span></span>
                            <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{$data->phone}}" readonly>
                            @error('phone')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-lg-6 col-md-6 col-12" id="input-box">
                            <label>ই-মেইল</label> <span> ( যদি থাকে )</span>
                            <input type="email" class="form-control" name="email" value="{{$data->email}}">
                        </div>
                        <div class="col-lg-6 col-md-6 col-12" id="input-box">
                            <label>টি-শার্ট সাইজ</label>
                            <select class="form-control @error('t_shirt') is-invalid @enderror" name="t_shirt">
                                <option @if($data->t_shirt == NULL) selected @endif value="0" disabled="">টি-শার্ট সাইজ নির্বাচন করুন</option>
                                <option @if($data->t_shirt == 'M') selected @endif value="M">M</option>
                                <option @if($data->t_shirt == 'L') selected @endif value="L">L</option>
                                <option @if($data->t_shirt == 'XL') selected @endif value="XL">XL</option>
                                <option @if($data->t_shirt == 'XXL') selected @endif value="XXL">XXL</option>
                            </select>
                            @error('t_shirt')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-lg-6 col-md-6 col-12" id="input-box">
                            <label>আবেদনকারীর  ছবি</label>
                            <input type="file" class="form-control" name="image" id="image">
                            <img src="{{asset('public')}}/Backend/Images/studentImage/{{$data->image}}" class="img-fluid" style="height: 80px;width:80px;border-radius:100px;" alt="আপনার ছবি নেই">
                        </div>
                            <input type="text" name="total_member" class="form-control" hidden value="1">
                        <div class="col-lg-12 col-md-12 col-12" id="input-box" style="text-align: center">
                            <input type="submit" class="btn btn-info" value="রেজিষ্ট্রেশন সম্পন্ন করুন">
                        </div>

                        <div class="col-lg-12 col-md-12 col-12" id="input-box" style="text-align: center">
                            <span style="font-size: 15px;">[ বি:দ্র: - রেজিষ্ট্রেশন সম্পন্ন হওয়ার পর লগইন করে আপনার রেজিষ্ট্রেশন ফি পরিশোধ করুন । অন্যথায় আপনার রেজিষ্ট্রেশন  বাতিল বলে গণ্য করা হইবে । ]</span>
                        </div>
                    </div>
                </form>


                    @else

                    {{-- ex_students --}}
                    @if(Session::get('success'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button> 
                        <strong>{{Session::get('success')}}</strong>
                </div>
                @elseif(Session::get('error'))
                <div class="alert alert-danger alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button> 
                        <strong>{{Session::get('error')}}</strong>
                </div>
                @endif
        <form method="post" enctype="multipart/form-data" action="{{url('/ex_update_info')}}/{{$data->id}}">
            @csrf
            <div class="form-group row">
                <div class="col-lg-6 col-md-6 col-12" id="input-box">
                    <label>নাম (বাংলায়)</label> <span></span>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{$data->name}}">
                    @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-lg-6 col-md-6 col-12" id="input-box">
                    <label>পিতার নাম</label> <span></span>
                    <input type="text" name="fathers_name" class="form-control" value="{{$data->fathers_name}}">
                </div>
                <div class="col-lg-6 col-md-6 col-12" id="input-box">
                    <label>মাতার নাম</label> <span></span>
                    <input type="text" name="mothers_name" class="form-control"  value="{{$data->mothers_name}}">
                </div>
                <div class="col-lg-6 col-md-6 col-12" id="input-box">
                    <label>লিঙ্গ</label>
                    <select class="form-control" name="gender">
                        @if($data->gender == 'male')
                        <option value="male">Male</option>
                        <option value="" disabled=""> নির্বাচন করুন</option>
                        <option value="Female">Female</option>
                        @elseif($data->gender == 'female')
                        <option value="Female">Female</option>
                        <option value="male">Male</option>
                        <option value="" disabled=""> নির্বাচন করুন</option>
                        @else 
                        <option value="" disabled=""> নির্বাচন করুন</option>
                        <option value="Female">Female</option>
                        <option value="male">Male</option>
                        @endif
                    </select>
                </div>
                <div class="col-lg-12 col-md-6 col-12" id="input-box">
                    <label>স্থায়ী ঠিকানা / বর্তমান ঠিকানা</label>
                    <textarea name="address" id="" cols="" rows="2" class="form-control">{!! $data->address !!}</textarea>
                </div>
                <div class="col-12 mt-4">
                    <b>ফেনী সরকারি কলেজের সর্বশেষ যে শ্রেণীতে অধ্যয়ন করেছেন তার তথ্য </b>
                </div>
                <div class="col-lg-3 col-md-3 col-6" id="input-box">
                    <label>সর্বশেষ যে শ্রেণীতে অধ্যয়ন করেছেন</label> <span></span>
                    <select class="form-control" name="last_class">
                        <option @if($data->last_class == NULL) selected @endif value="" disabled="">শ্রেণী নির্বাচন করুন</option>
                        <option @if($data->last_class == 'HSC') selected @endif value="HSC">এইচ এস সি</option>
                        <option @if($data->last_class == 'Degree') selected @endif value="Degree">ডিগ্রী পাস কোর্স</option>
                        <option @if($data->last_class == 'Honurs') selected @endif value="Honurs">অনার্স</option>
                        <option @if($data->last_class == 'Masters') selected @endif value="Masters">মাষ্টার্স</option>
                    </select>
                </div>
                <div class="col-lg-3 col-md-3 col-6" id="input-box">
                    <label>রেজিষ্ট্রেশন নম্বর</label> <span>*(যদি থাকে)</span>
                    <input type="text" class="form-control" name="registration_number" value="{{$data->registration_number}}">
                </div>
                <div class="col-lg-3 col-md-3 col-6" id="input-box">
                    <label>রোল নম্বর</label> <span>*(যদি থাকে)</span>
                    <input type="text" class="form-control" name="roll_number" value="{{$data->roll_number}}">
                </div>
                <div class="col-lg-3 col-md-3 col-6" id="input-box">
                    <label>পাসের সন</label>
                    <input type="number" class="form-control" name="passing_year" value="{{$data->passing_year}}">
                </div>
                <div class="col-lg-3 col-md-3 col-6" id="input-box">
                    <label>শিক্ষাবর্ষ</label>
                    <input type="number" class="form-control" name="session" value="{{$data->session}}">
                </div>

                <div class="col-lg-3 col-md-3 col-6" id="input-box">
                    <label>পেশা <span>*(যদি থাকে)</span></label>
                    <input type="text" class="form-control" name="occupation" value="{{$data->occupation}}">
                </div>
                <div class="col-lg-3 col-md-3 col-6" id="input-box">
                    <label>পদবি <span>*(যদি থাকে)</span></label>
                    <input type="text" class="form-control" name="designation" value="{{$data->designation}}">
                </div>
                <div class="col-lg-3 col-md-3 col-12" id="input-box">
                    <label>মোবাইল</label> <span></span>
                    <input type="number" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{$data->phone}}" readonly>
                    @error('phone')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-lg-6 col-md-6 col-12" id="input-box">
                    <label>ই-মেইল</label> <span>*(যদি থাকে)</span>
                    <input type="email" class="form-control" name="email" value="{{$data->email}}">
                </div>
                <div class="col-lg-6 col-md-6 col-12" id="input-box">
                    <label>টি-শার্ট সাইজ</label>
                    <select class="form-control" name="t_shirt">
                        <option @if($data->t_shirt == NULL) selected @endif value="0" disabled="">টি-শার্ট সাইজ নির্বাচন করুন</option>
                        <option @if($data->t_shirt == 'M') selected @endif value="M">M</option>
                        <option @if($data->t_shirt == "L") selected @endif value="L">L</option>
                        <option @if($data->t_shirt == 'XL') selected @endif value="XL">XL</option>
                        <option @if($data->t_shirt == 'XXL') selected @endif value="XXL">XXL</option>
                    </select>
                </div>
                <div class="col-lg-6 col-md-6 col-12" id="input-box">
                    <label>আপনার ছবি</label>
                    <input type="file" class="form-control" name="image">
                    <img src="{{asset('public')}}/Backend/Images/studentImage/{{$data->image}}" class="img-fluid" style="height: 80px;width:80px;border-radius:100px;" alt="আপনার ছবি নেই">
                </div>
                <div class="col-lg-3 col-md-3 col-12" id="input-box">
                    <label>মোট সদস্য</label>
                    <input type="text" name="total_member" class="form-control" readonly value="{{$data->total_member}}" id="total_member">
                </div>
                <div class="col-lg-3 col-md-3 col-12" id="input-box">
                    <label>রেজিষ্ট্রেশন ফি</label>
                    <input type="text" id="reg_fee" name="reg_fee" class="form-control" readonly value="{{$data->registraiton_fee}}">
                </div>
                <div class="col-6">

                </div>
            </div>
            @php 
            $id = Auth::guard('students')->user()->student_id;
            $check = DB::table('family_member_infos')->where('student_id',$id)->count();

            $family_data = DB::table('family_member_infos')->where('student_id',$id)->first();
            @endphp
            @if($check > 0)
            <div class="family_infos" id="family_info">
                <div class="row" id="">
                    <div class="col-12 mt-4">
                        <b>পরিবারের সদস্যদের তথ্য</b>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12 mt-4">
                        <label>নাম</label>
                        <input type="text" name="family_member_name" class="form-control" value="{{$family_data->family_member_name}}">
                    </div>
                    <div class="col-lg-3 col-md-6 col-12 mt-4">
                        <label>Image</label>
                        <input type="file" name="family_member_image" class="form-control">
                        <img src="{{asset('public')}}/Backend/Images/FamilyMember/{{$family_data->family_member_image}}" class="img-fluid" style="height: 80px;width:80px;border-radius:100px;" alt="আপনার ছবি নেই">
                    </div>
                </div>
            </div>
            @endif
            <div class="row">
                
                <div class="col-lg-12 col-md-12 col-12" id="input-box" style="text-align: center">
                    <input type="submit" class="btn btn-info" value="তথ্য আপডেট করুন">
                </div>

                <div class="col-lg-12 col-md-12 col-12" id="input-box" style="text-align: center">
                    <span style="font-size: 15px;">[ বি:দ্র: - রেজিষ্ট্রেশন সম্পন্ন হওয়ার পর লগইন করে আপনার রেজিষ্ট্রেশন ফি পরিশোধ করুন । অন্যথায় আপনার রেজিষ্ট্রেশন  বাতিল বলে গণ্য করা হইবে । ]</span>
                </div>
            </div>
        </form>

                    @endif
                </div>
            </div>
        </div>
    </div>
        <!-- [ Main Content ] end -->
@endsection