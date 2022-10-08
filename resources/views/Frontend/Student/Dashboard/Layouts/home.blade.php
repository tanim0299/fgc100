@extends('Frontend.Student.Dashboard.Layouts.master')
@section('body')

<!-- [ Main Content ] start -->
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Student Information</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('/std_dasboard')}}"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#!">Your Information</a></li>
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
                    <div class="row text-center mt-3">
                        <div class="col-lg-12 col-md-6 col-12">
                            <div class="profile">
                                @php 
                                $type = Auth::guard('students')->user()->student_type;
                                if($type == 1)
                                {
                                    $id = Auth::guard('students')->user()->student_id;
                                    $data = DB::table('present_students')->where('registration_id',$id)->first();
                                }
                                else 
                                {
                                    $id = Auth::guard('students')->user()->student_id;
                                    $data = DB::table('ex_students')->where('registration_id',$id)->first();
                                }
                                @endphp
                                @php 
                                $path = public_path().'/Backend/Images/StudentImage/'.$data->image;
                                @endphp
                                @if(file_exists($path))
                                <img src="{{asset('public')}}/Backend/Images/StudentImage/{{$data->image}}" alt="" class="img-fluid"><br><br>
                                @endif
                                <b>{{$data->name}}</b><br>
                                @if(Auth::guard('students')->user()->student_type == 1)
                                <span>{{$data->present_class}}</span><br>
                                @else
                                <span>{{$data->last_class}}</span><br>
                                @endif
                                <span>ফেনী সরকারি কলেজ</span>
                            </div>
                        </div>
                    </div>
                    <div class="information-box">
                        <div class="title" style="padding-left: 10px;border-left:2px solid green;">
                            <h5>Your Personal Information</h5>
                        </div>
                        <div class="row">
                            <div class="col-lg-4 col-md-6 col-12">
                                <div class="info-single">
                                    <b>নাম</b><br>
                                    <span>{{$data->name}}</span>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12">
                                <div class="info-single">
                                    <b>পিতার নাম</b><br>
                                    <span>{{$data->fathers_name}}</span>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12">
                                <div class="info-single">
                                    <b>মাতার নাম</b><br>
                                    <span>{{$data->mothers_name}}</span>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12">
                                <div class="info-single">
                                    <b>লিঙ্গ</b><br>
                                    <span style="text-transform: capitalize">{{$data->gender}}</span>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12">
                                <div class="info-single">
                                    <b>স্থায়ী ঠিকানা</b><br>
                                    <span>{{$data->address}}</span>
                                </div>
                            </div>
                            @if(Auth::guard('students')->user()->student_type == '1')
                            <div class="col-lg-4 col-md-6 col-12">
                                <div class="info-single">
                                    <b>ভর্তির সন</b><br>
                                    <span>{{$data->admission_year}}</span>
                                </div>
                            </div>
                            @else 
                            <div class="col-lg-4 col-md-6 col-12">
                                <div class="info-single">
                                    <b>পাসের সন</b><br>
                                    <span>{{$data->passing_year}}</span>
                                </div>
                            </div>
                            @endif

                            @if(Auth::guard('students')->user()->student_type == '1')
                            <div class="col-lg-4 col-md-6 col-12">
                                <div class="info-single">
                                    <b>শ্রেণী</b><br>
                                    <span>{{$data->present_class}}</span>
                                </div>
                            </div>
                            @else 
                            <div class="col-lg-4 col-md-6 col-12">
                                <div class="info-single">
                                    <b>সর্বশেষ অধ্যয়নকৃত ক্লাস</b><br>
                                    <span>{{$data->last_class}}</span>
                                </div>
                            </div>
                            @endif
                            <div class="col-lg-4 col-md-6 col-12">
                                <div class="info-single">
                                    <b>রেজিষ্ট্রেশন নাম্বার</b><br>
                                    <span>{{$data->registration_number}}</span>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12">
                                <div class="info-single">
                                    <b>রোল নম্বর</b><br>
                                    <span>{{$data->roll_number}}</span>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12">
                                <div class="info-single">
                                    <b>শিক্ষাবর্ষ</b><br>
                                    <span>{{$data->session}}</span>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12">
                                <div class="info-single">
                                    <b>মোবাইল</b><br>
                                    <span>{{$data->phone}}</span>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12">
                                <div class="info-single">
                                    <b>ইমেইল</b><br>
                                    <span>{{$data->email}}</span>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12">
                                <div class="info-single">
                                    <b>সর্বমোট টাকা</b><br>
                                    <span>{{$data->total_ammount}}</span> <span class="badge badge-danger">Unpaid</span>
                                </div>
                            </div>
                            @php
                                $generator = new Picqer\Barcode\BarcodeGeneratorHTML();
                            @endphp
                            <div class="col-lg-4 col-md-6 col-12">
                                <div class="info-single">
                                    <b>বারকোড</b><br>
                                    {!! $generator->getBarcode($data->registration_id, $generator::TYPE_CODE_128) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <!-- [ Main Content ] end -->
@endsection