@extends('Frontend.Layouts.master')
@section('body')
  <section class="mid_banner">
    <div class="container">
        <div class="mid_banner-text">
            <b>স্মারক গ্রন্থ</b><br>
            <a href="{{url('/')}}">হোম</a> > <span>স্মারক গ্রন্থ</span>
        </div>
    </div>
  </section>
@if($data)
  <div class="container">
    <div class="image" style="text-align: center">
      @php 
      $path = public_path().'/Backend/Images/'.$data->image;
      @endphp
      @if(file_exists($path))
      <img src="{{$path}}" alt="" class="img-fluid">
      @endif
    </div>
    <div class="text-wrap" style="text-align: justify;">
        <p>{!! $data->description !!}</p>
    </div>
  </div>
  @endif
    
@endsection