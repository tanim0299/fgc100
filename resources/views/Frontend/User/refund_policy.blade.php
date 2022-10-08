@extends('Frontend.Layouts.master')
@section('body')
  <section class="mid_banner">
    <div class="container">
        <div class="mid_banner-text">
            <b>রিফান্ড পলিসি</b><br>
            <a href="{{url('/')}}">হোম</a> > <span>রিফান্ড পলিসি</span>
        </div>
    </div>
  </section>
@if($data)
  <div class="container">
    <div class="text-wrap" style="text-align: justify;">
        <p>{!! $data->description !!}</p>
    </div>
  </div>
  @endif
    
@endsection