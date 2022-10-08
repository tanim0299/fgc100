@extends('Frontend.Layouts.master')
@section('body')
<style>
   span, b , a, p, table,li  {
    font-family: 'AdorshoLipi', Arial, sans-serif !important;
}
.input-single-box{
    margin-top: 20px;
}
</style>
  <section class="mid_banners">
    <div class="container">
        <div class="mid_banner-text">
            <img src="{{asset('public/assets/images/slider_1.jpg')}}" alt="" class="">
        </div>
    </div>
  </section>

 {{-- form --}}
 <div class="form-section">
    <div class="section-title">
        <b>অধ্যয়নরত শিক্ষার্থীদের পেমেন্ট</b>
    </div>
    <div class="container mt-4">
        @if(Session::get('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button> 
                <strong>{{Session::get('success')}}</strong>
        </div>
        @elseif(Session::get('error'))
        <div class="alert alert-danger alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button> 
                <strong>{{Session::get('error')}}</strong>
        </div>
        @endif
        <div class="form-wrapper">
            <div class="box">
                <div class="bkash-logo" style="text-align: center">
                    <img src="https://1000logos.net/wp-content/uploads/2021/02/Bkash-logo.png" alt="" class="img-fluid" height="200px" width="200px">
                </div>
                <div class="row">
                    <div class="col-lg-6 col-12">
                        <div class="input-single-box">
                            <label>আপনার নাম</label>
                            <input type="text" class="form-control" readonly value="{{$data->name}}">
                        </div>
                    </div>
                    <div class="col-lg-6 col-12">
                        <div class="input-single-box">
                            <label>আপনার নাম্বার</label>
                            <input type="text" class="form-control" readonly value="{{$data->phone}}">
                        </div>
                    </div>
                    <div class="col-lg-4 col-12">
                        <div class="input-single-box">
                            <label>রেজিষ্ট্রেশন ফি</label>
                            <input type="text" class="form-control" readonly value="{{$data->total_ammount}}">
                        </div>
                    </div>
                    <div class="col-lg-4 col-12">
                        <div class="input-single-box">
                            <label>অনলাইন চার্জ</label>
                            <input type="text" class="form-control" readonly value="20">
                        </div>
                    </div>
                    <div class="col-lg-4 col-12">
                        <div class="input-single-box">
                            <label>পরিশোধ করার পরিমাণ</label>
                            <input type="text" class="form-control" readonly value="1025">
                        </div>
                    </div>
                    <div class="col-lg-6 col-12">
                        <div class="input-single-box">
                            <input type="submit" class="btn btn-success" value="রেজিষ্ট্রেশন ফি পরিশোধ করুন">
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-12" id="input-box" style="text-align: center">
                    <span style="font-size: 15px;">[ বি:দ্র: - আপনি যদি রেজিষ্ট্রেশন ফি  এখন পরিশোধ করতে না চান তাহলে পরবর্তীতে আপনার ড্যাশবোর্ডে লগইন করে আপনার রেজিষ্ট্রেশন ফি পরিশোধ করবেন। ফি পরিশোধ ব্যাতিত রেজিষ্ট্রেশন সম্পন্ন হবে না। আপনার ড্যাশবোর্ডে <a href="{{url('/student_login')}}">লগইন করুন</a>]</span>
                </div>
            </div>
        </div>
    </div>
 </div>
@endsection