@extends('Frontend.Layouts.master')
@section('body')
  <section class="mid_banner">
    <div class="container">
        <div class="mid_banner-text">
            <b>প্রাইভেসি এবং পলিসি</b><br>
            <a href="{{url('/')}}">হোম</a> > <span>প্রাইভেসি এবং পলিসি</span>
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