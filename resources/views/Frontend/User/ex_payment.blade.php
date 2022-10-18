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
        <b>প্রাক্তন শিক্ষার্থীদের পেমেন্ট</b>
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
                    <img src="{{asset('public/assets/images')}}/ssl_logo.png" alt="" class="img-fluid">
                </div>
                <div class="row">
                    <div class="col-lg-6 col-12">
                        <div class="input-single-box">
                            <label>আপনার নাম</label>
                            <input type="text" class="form-control" id="customer_name" readonly value="{{$data->name}}">
                            <input type="hidden" class="form-control" id="reg_id" readonly value="{{$data->registration_id}}">
                        </div>
                    </div>
                    <div class="col-lg-6 col-12">
                        <div class="input-single-box">
                            <label>আপনার নাম্বার</label>
                            <input type="text" class="form-control" id="mobile" readonly value="{{$data->phone}}">
                        </div>
                    </div>
                    <div class="col-lg-6 col-12">
                        <div class="input-single-box">
                            <label>মোট সদস্য</label>
                            <input type="text" class="form-control" id="total_member" readonly value="{{$data->total_member}}">
                        </div>
                    </div>
                    <div class="col-lg-6 col-12">
                        <div class="input-single-box">
                            <label>রেজিষ্ট্রেশন ফি</label>
                            <input type="text" class="form-control" id="total_member" readonly value="3000">
                        </div>
                    </div>
                    @php
                    $total_ammount = $data->total_ammount;

                    $online_charge = $data->total_member * 75;

                    $total_taka = $total_ammount + $online_charge;
                    @endphp
                    <div class="col-lg-6 col-12">
                        <div class="input-single-box">
                            <label>অনলাইন চার্জ</label>
                            <input type="text" class="form-control" id="total_member" readonly value="{{$online_charge}}">
                        </div>
                    </div>
                    <div class="col-lg-6 col-12">
                        <div class="input-single-box">
                            <label>পরিশোধ করার পরিমাণ</label>
                            <input type="text" class="form-control" id="total_amount" readonly value="{{$total_taka}}">
                        </div>
                    </div>
                    <div class="col-lg-6 col-12">
                        <div class="input-single-box">
                            <!--<input type="submit" class="btn btn-success" value="পরিশোধ করুন">-->
     <button class="btn btn-primary btn-lg btn-block" id="sslczPayBtn"
                        token="if you have any token validation"
                        postdata="your javascript arrays or objects which requires in backend"
                        order="If you already have the transaction generated for current order"
                        endpoint="{{ url('/pay-via-ajax') }}"> Pay Now
                </button>
                        </div>
                    </div>
                </div>
                <div class="col-12 mt-2">
                    <span style="color: red;">[ বি:দ্র:- পেমেন্ট কম্প্লিট হওয়ার পর ছয় ঘন্টার মধ্যে অটো ইনভয়েস আপডেট হবে এবং পেইড দেখাবে। তাৎক্ষণিক পেইড না দেখালে দ্বিতীয় বার পেমেন্ট করবেন না  ।   ]</span>
                </div>
                <div class="col-lg-12 col-md-12 col-12" id="input-box" style="text-align: center">
                    <span style="font-size: 15px;">[ আপনি যদি রেজিষ্ট্রেশন ফি  এখন পরিশোধ করতে না চান তাহলে পরবর্তীতে আপনার ড্যাশবোর্ডে লগইন করে আপনার রেজিষ্ট্রেশন ফি পরিশোধ করবেন। রেজিষ্ট্রেশন ফি পরিশোধ ব্যাতিত রেজিষ্ট্রেশন গ্রহণ করা হবে না। আপনার ড্যাশবোর্ডে <a href="{{url('/student_login')}}">লগইন করুন</a>]</span>
                </div>
            </div>
        </div>
    </div>
 </div>
 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>


<!-- If you want to use the popup integration, -->
<script>
    var obj = {};
    obj.cus_name = $('#customer_name').val();
    obj.cus_phone = $('#mobile').val();
    obj.total_member = $('#total_member').val();
    // obj.cus_addr1 = $('#address').val();
    obj.amount = $('#total_amount').val();
    obj.reg_id = $('#reg_id').val();
    obj.type = 'ex';

    $('#sslczPayBtn').prop('postdata', obj);

    (function (window, document) {
        var loader = function () {
            var script = document.createElement("script"), tag = document.getElementsByTagName("script")[0];
            script.src = "https://seamless-epay.sslcommerz.com/embed.min.js?" + Math.random().toString(36).substring(7); // USE THIS FOR LIVE
            // script.src = "https://sandbox.sslcommerz.com/embed.min.js?" + Math.random().toString(36).substring(7); // USE THIS FOR SANDBOX
            tag.parentNode.insertBefore(script, tag);
        };

        window.addEventListener ? window.addEventListener("load", loader, false) : window.attachEvent("onload", loader);
    })(window, document);
</script>
@endsection
