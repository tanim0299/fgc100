@extends('Frontend.Layouts.master')
@section('body')
<style>
   span, b , a, p, table,li  {
    font-family: 'AdorshoLipi', Arial, sans-serif !important;
}
</style>
  <section class="mid_banners">
    <div class="container">
        <div class="mid_banner-text">
            <img src="{{asset('public/assets/images/slider_1.jpg')}}" alt="" class="">
        </div>
    </div>
  </section>


  <div class="section">
    <div class="container">
       <div class="section-title">
           <b>রেজিষ্ট্রেশন প্রক্রিয়ার ভিডিও টিউটোরিয়াল</b>
       </div>
    </div>
 </div>


 {{-- form --}}
 <div class="form-section">
    <div class="container mt-4" style="text-align: center">
        <video width="800" height="700" controls>
            <source src="{{asset('public/vedio')}}/Fgc100celebration_converted.m4v" type="video/mp4">
            <source src="mov_bbb.ogg" type="video/ogg">
            Your browser does not support HTML video.
          </video>
    </div>
 </div>
@endsection