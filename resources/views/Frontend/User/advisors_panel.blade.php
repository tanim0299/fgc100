@extends('Frontend.Layouts.master')
@section('body')
  <section class="mid_banner">
    <div class="container">
        <div class="mid_banner-text">
            <b>{{$comm->committee_name}}</b><br>
            <a href="{{url('/')}}">হোম</a> > <span>{{$comm->committee_name}}</span>
        </div>
    </div>
  </section>

  {{-- কমিটি --}}
  <div class="comitee-box">
    <div class="container">
        <div class="section-title">
            <b>{{$comm->committee_name}} এর সদস্যবৃন্দ</b>
        </div>
        @if($main)
        <div class="row justify-content-center text-center">
            <div class="col-lg-3 col-md-6 col-12">
                <div class="member-box">
                    <div class="member-image">
                        @php 
                        $path = public_path().'/Backend/Images/MemberImage/'.$main->image;
                        @endphp
                        @if(file_exists($path))
                        <img src="{{asset('public/Backend/Images/MemberImage')}}/{{$main->image}}" alt="">
                        @else
                        <img src="{{asset('public/assets/images')}}/avatar.jpg" alt="">
                        @endif
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
        <div class="row justify-content-center text-center">
            @if($general)
            @foreach($general as $view)
            <div class="col-lg-3 col-md-6 col-6">
                <div class="member-box">
                    <div class="member-image">
                        @php 
                        $path = public_path().'/Backend/Images/MemberImage/'.$view->image;
                        @endphp
                        @if(file_exists($path))
                        <img src="{{asset('public/Backend/Images/MemberImage')}}/{{$view->image}}" alt="">
                        @else
                        <img src="{{asset('public/assets/images')}}/avatar.jpg" alt="">
                        @endif
                    </div>
                    <div class="member_name">
                        <b>{{$view->name}}</b><br>
                        <span>{{$view->designation}}</span><br>
                        <span>{{$view->workplace}}</span><br>
                    </div>
                </div>
            </div>
            @endforeach
            @endif
        </div>
        <div class="pagination" style="margin-top:20px;justify-content:center">
            {{ $general->links() }}
        </div>
    </div>
  </div>
@endsection