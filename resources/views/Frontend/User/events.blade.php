@extends('Frontend.Layouts.master')
@section('body')
<style>
    a.uk-inline {
    background: #f7ecec;
    padding: 12px;
    border-radius: 9px;
    height: 289px;
    box-shadow: 0px 0px 3px black;
    text-decoration: none;
    color:black;
}
</style>
  <section class="mid_banner">
    <div class="container">
        <div class="mid_banner-text">
            <b>ইভেন্টস / নিউজ</b><br>
            <a href="{{url('/')}}">হোম</a> > <span>ইভেন্টস / নিউজ</span>
        </div>
    </div>
  </section>

      {{-- গ্যালারী --}}
  <div class="section">
    <div class="container">
       <div class="section-title">
           <b>ইভেন্টস / নিউজ</b>
       </div>
       <div class="photo_gallery">
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
    </div>
 </div>
@endsection