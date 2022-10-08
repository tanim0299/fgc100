@extends('Frontend.Layouts.master')
@section('body')
  <section class="mid_banner">
    <div class="container">
        <div class="mid_banner-text">
            <b>শর্তাবলী</b><br>
            <a href="{{url('/')}}">হোম</a> > <span>শর্তাবলী</span>
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