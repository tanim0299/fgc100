@extends('Frontend.Layouts.master')
@section('body')
<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img class="d-block w-100" src="{{asset('public/assets/images')}}/slider_1.jpg" alt="First slide">
      </div>
      {{-- <div class="carousel-item">
        <img class="d-block w-100" src="{{asset('public/assets/images')}}/slider_1.jpg" alt="First slide">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="{{asset('public/assets/images')}}/slider_2.jpg" alt="Second slide">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="{{asset('public/assets/images')}}/slider_3.jpg" alt="Third slide">
      </div> --}}
    </div>
    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>


  <div class="links">
    <li class="">
        <!--<a class="nav-link btn btn-info" href="{{url('/present-registration-form')}}" style="color: white !important;">বর্তমান শিক্ষার্থীদের নিবন্ধন</a>-->
        <a class="nav-link btn btn-info btn-sm btn-disabled" href="#" style="color: white !important;"><i class="fa fa-users"></i>১লা নভেম্বর থেকে বর্তমান শিক্ষার্থীদের রেজিষ্ট্রেশন চালু হবে</a>
      </li>
    <li class="">
        <a class="nav-link btn btn-warning" href="{{url('/ex-registration-form')}}" style="color: white !important;">প্রাক্তন শিক্ষার্থীদের নিবন্ধন</a>
      </li>
    @if(Auth::guard('students')->check())
    @php
    $type = Auth::guard('students')->user()->student_type;
    $id = Auth::guard('students')->user()->student_id;
    if($type == 1)
    {
      $data = DB::table('present_students')->where('registration_id',$id)->first();
    }
    else {
      $data = DB::table('ex_students')->where('registration_id',$id)->first();
    }
    @endphp
    <li class="nav-item" style="">
        <a class="nav-link btn btn-dark btn-sm" href="{{url('/std_dashboard')}}" style="color: white !important;"><i class="fa fa-user"></i> {{$data->name}}</a>
      </li>
    @else
    <li class="nav-item" style="">
        <a class="nav-link btn btn-success btn-sm" href="{{url('/student_login')}}" style="color: white !important;"><i class="fa fa-user"></i> লগইন করুন</a>
      </li>

      @endif
  </div>

  {{-- news events --}}

  {{-- <div class="container">
    <div class="section-title text-left">
        <b>নিউজ / ইভেন্টস</b>
    </div>
    <div class="events-wrapper">
     <div class="row">
        @if($news_info)
        @foreach($news_info as $view)
        <div class="col-lg-4 col-md-6 col-12">
            <div class="single-box">
            <a target="_blank" href="{{url('/view_news')}}/{{$view->id}}">
                <img src="{{asset('public/Backend/assets/images/news')}}/{{$view->image}}" alt="" class="img-fluid"><br>
                <p>{{$view->title}}</p>
            </a>
            </div>
        </div>
        @endforeach
        @endif
      </div>
    </div>
    
  </div> --}}

  @if($convener_speech)
  {{-- আহ্বায়কের কথা --}}
  <div class="section-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-12">
                <div class="image">
                 <center> <br> <img src="{{asset('public/Backend/Images/')}}/{{$convener_speech->image}}" alt="" class="img-fluid"> </center>
                </div>
            </div>
            <div class="col-lg-8 col-md-8 col-12">
                <div class="text box" style="text-align: justify;">
                    <b>প্রধান উপদেষ্টার কথা</b>
                    <p>{!! $convener_speech->description !!}</p>
                </div>
            </div>
            
        </div>
    </div>
  </div>
@endif


{{-- @if($about_anniversary)
  <div class="container" style="margin-top:20px;">
    <div class="row">
        <div class="col-lg-12 col-md-8 col-12">
            <div class="text">
                <b>ফেনী সরকারি কলেজ প্রতিষ্ঠার ইতিহাস</b><br>
                {!! $about_anniversary->description !!}
            </div>
        </div>
    </div>
  </div>
  @endif --}}

  <div class="container" style="margin-top:20px;">
    <div class="row">
        <div class="col-lg-12 col-md-8 col-12">
            <div class="text" style="text-align: justify;">
                <b>ফেনী সরকারি কলেজ প্রতিষ্ঠার ইতিহাস</b><br>
                আজ শতবর্ষ পূর্ণ করল ফেনী সরকারী  কলেজ।<br>
                ১৯২২ সালের ৮  আগষ্ট ফেনী কলেজের একাডেমিক কার্যক্রম আনুষ্ঠানিকভাবে শুরু হয়। ভৌগলিক ও অবস্থানগত কারণে ফেনী সরকারী কলেজের গুরুত্ব বাংলাদেশের দক্ষিণ পুর্বাঞ্চলের জনগণের নিকট অপরিসীম। সাহিত্য, সংস্কৃতি, শিক্ষা-দীক্ষায় ফেনী সরকারী কলেজ ইতোমধ্যে আলাদা বৈশিষ্ট্যে সমোজ্জল। ঢাকা বিশ্ববিদ্যালয়ের সমসাময়িককালে তথা ১৯২২ সালে প্রতিষ্ঠিত এ কলেজ সারা দক্ষিণ পূর্ব বাংলায় ৪টি কলেজের মধ্যে একটি, অপর তিনটি হল চট্টগ্রাম কলেজ, ভিক্টোরিয়া কলেজ ও এম.সি কলেজ। প্রতিষ্ঠালগ্ন থেকে এ পর্যন্ত শ্রমজীবী মানুষ হতে শুরু করে বিদ্যোৎসাহী বিদগ্ধ, কৃতি শিক্ষক, ছাত্র-ছাত্রীদের সম্মিলিত প্রচেষ্টায় এটি অনুকরণীয় শিক্ষা প্রতিষ্ঠান হিসেবে স্বীকৃতি লাভ করে আসছে। </p> <a target="_blank" href="{{url('/fgc_history')}}" class="btn btn-info">বিস্তারিত</a>
            </div>
        </div>
    </div>
  </div>



@if($guideline)
  {{-- শতবর্ষ নিয়ে কথা --}}
  <div class="container" style="margin-top:20px;">
    <div class="row">
        <div class="col-lg-12 col-md-8 col-12">
            <div class="text box">
                <b>শতবর্ষপূর্তি উৎসবের রূপরেখা</b>
                <p>{!! $guideline->description !!}</p>
            </div>
        </div>
    </div>
  </div>
@endif


  {{-- কমিটি --}}
  <div class="comitee-box">
    <div class="container">
        
        @if($main)
        <div class="section-title">
            <b>প্রধান উপদেষ্টা</b>
        </div>
        <div class="row justify-content-center text-center">
            <div class="col-lg-3 col-md-3 col-12">
                <div class="member-box">
                    <div class="member-image">
                        <img src="{{asset('public/Backend/Images/MemberImage')}}/{{$main->image}}" alt="">
                    </div>
                    <div class="member_name">
                        <b>{{$main->name}}</b><br>
                        <span>{{$main->designation}}</span><br>
                        <span>{{$main->workplace}}</span><br>
                    </div>
                </div>
            </div>
        </div>
        @endif

        <div class="section-title">
            <b>আহ্বায়ক</b>
        </div>
        <div class="row justify-content-center text-center">
            @if($j_convneer)
            @foreach($j_convneer as $view)
            <div class="col-lg-3 col-md-3 col-12">
                <div class="member-box">
                    <div class="member-image">
                        @php 
                        $path = public_path().'/Backend/Images/MemberImage/'.$view->image;
                        // echo $path;
                        @endphp
                        @if(file_exists($path))
                        <img src="{{asset('public/Backend/Images/MemberImage')}}/{{$view->image}}" alt="">
                        @else
                        <img src="{{asset('public/assets/images')}}/avatar.jpg" alt="">
                        @endif
                    </div>
                    <div class="member_name">
                        {{-- {{$path}}<br> --}}
                        <b>{{$view->name}}</b><br>
                        <span>{{$view->designation}}</span><br>
                        <span>{{$view->workplace}}</span><br>
                    </div>
                </div>
            </div>
            @endforeach
            @endif
        </div>

        <div class="section-title">
            <b>যুগ্ম আহ্বায়ক বৃন্দ</b>
        </div>
        <div class="row justify-content-center text-center">
            @if($convneer)
            @foreach($convneer as $view)
            <div class="col-lg-3 col-md-6 col-6">
                <div class="member-box">
                    <div class="member-image">
                        @php 
                        $path = public_path().'/Backend/Images/MemberImage/'.$view->image;
                        // echo $path;
                        @endphp
                        @if(file_exists($path))
                        <img src="{{asset('public/Backend/Images/MemberImage')}}/{{$view->image}}" alt="">
                        @else
                        <img src="{{asset('public/assets/images')}}/avatar.jpg" alt="">
                        @endif
                    </div>
                    <div class="member_name">
                        {{-- {{$path}}<br> --}}
                        <b>{{$view->name}}</b><br>
                        <span>{{$view->designation}}</span><br>
                        <span>{{$view->workplace}}</span><br>
                    </div>
                </div>
            </div>
            @endforeach
            @endif
        </div>

        <div class="section-title">
            <b>সদস্য সচিব</b>
        </div>
        <div class="row justify-content-center text-center">
            @if($secreatary)
            @foreach($secreatary as $view)
            <div class="col-lg-3 col-md-6 col-6">
                <div class="member-box">
                    <div class="member-image">
                        @php 
                        $path = public_path().'/Backend/Images/MemberImage/'.$view->image;
                        // echo $path;
                        @endphp
                        @if(file_exists($path))
                        <img src="{{asset('public/Backend/Images/MemberImage')}}/{{$view->image}}" alt="">
                        @else
                        <img src="{{asset('public/assets/images')}}/avatar.jpg" alt="">
                        @endif
                    </div>
                    <div class="member_name">
                        {{-- {{$path}}<br> --}}
                        <b>{{$view->name}}</b><br>
                        <span>{{$view->designation}}</span><br>
                        <span>{{$view->workplace}}</span><br>
                    </div>
                </div>
            </div>
            @endforeach
            @endif
        </div>


        <div class="section-title">
            <b>সদস্য বৃন্দ</b>
        </div>
        <div class="row justify-content-center text-center">
            @if($member)
            @foreach($member as $view)
            <div class="col-lg-3 col-md-6 col-6">
                <div class="member-box">
                    <div class="member-image">
                        @php 
                        $path = public_path().'/Backend/Images/MemberImage/'.$view->image;
                        // echo $path;
                        @endphp
                        @if(file_exists($path))
                        <img src="{{asset('public/Backend/Images/MemberImage')}}/{{$view->image}}" alt="">
                        @else
                        <img src="{{asset('public/assets/images')}}/avatar.jpg" alt="">
                        @endif
                    </div>
                    <div class="member_name">
                        {{-- {{$path}}<br> --}}
                        <b>{{$view->name}}</b><br>
                        <span>{{$view->designation}}</span><br>
                        <span>{{$view->workplace}}</span><br>
                    </div>
                </div>
            </div>
            @endforeach
            @endif
        </div>
    </div>
  </div>


  {{-- গ্যালারী --}}
  <div class="section">
     <div class="container">
        <div class="section-title">
            <b>গ্যালারী</b>
        </div>
        <div class="photo_gallery">
            <div class="uk-child-width-1-4@m" uk-grid uk-lightbox="animation: scale">
                @if($photo)
                @foreach($photo as $view)
                <div>
                    <a class="uk-inline" href="{{asset('public/Backend/assets/images/gallery')}}/{{$view->image}}" data-caption="{{$view->title}}">
                        <img src="{{asset('public/Backend/assets/images/gallery')}}/{{$view->image}}" width="500" height="400" alt="" id="gallery_image" class="img-fluid">
                    </a>
                </div>
                @endforeach
                @endif
            </div>
        </div>
     </div>
  </div>
@endsection