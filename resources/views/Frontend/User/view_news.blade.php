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
.single-box img{
    height: 400px;
    width: 500px;
}
.single-box{
    box-shadow: none;
    border: none;
    text-align: center;
    margin: auto;
}
</style>
  <section class="mid_banner">
    <div class="container">
        <div class="mid_banner-text">
            <b>নিউজ / ইভেন্টস</b><br>
            <a href="{{url('/')}}">হোম</a> > <span>নিউজ / ইভেন্টস</span>
        </div>
    </div>
  </section>

      {{-- গ্যালারী --}}
  <div class="section">
    <div class="container">
       <div class="single-box">
           <img src="{{asset('public/Backend/assets/images/news')}}/{{$data->image}}" alt="" class="img-fluid"><br>
           <p><b>{{$data->title}}</b></p>
           <div class="description mt-4">
            {!! $data->description !!}
           </div>
       </div>
    </div>
 </div>
@endsection