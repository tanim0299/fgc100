<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Payment Invoice</title>
    <link rel="stylesheet" href="{{base_path().'/public/bootstrap.min.css'}}">
    <style>
        /* @import url('https://fonts.googleapis.com/css2?family=Noto+Serif+Bengali:wght@400;500;600&display=swap');
        body{
    font-family: 'Noto Serif Bengali'!important;
} */

@font-face {
    font-family: 'Noto Serif Bengali';
    font-display: block;
    src: url('http://localhost/fgc_anniversary/NotoSansSinhala-Light.ttf') format("truetype");
}
body {
    font-family: 'Noto Serif Bengali';
    font-style: normal;
    font-weight: 500;
    font-size: 14px!important;
}
.payment_invoice {
    width: 591px;
    margin: auto;
}

.title {
    text-align: center;
}

.title b {
    font-size: 22px;
}

.title p {
    font-size: 20px;
}
.payment_invoice {
    border: 1px solid lightgray;
    /* padding: 19px; */
    box-shadow: 0px 1px 1px 0px lightgray;
}
div#top-header {
    padding: 10px;
}
.card-title {
    background: rgb(224 105 45);
    margin: 0px;
    padding: 5px;
    text-align: center;
    color: white;
    font-size: 15px;
    -webkit-print-color-adjust: exact;
}
div#signle-box {
    margin-top: 14px;
}

.invoice-body {
    padding: 0px 13px;
    padding-bottom: 20px;
}
@media print{
    .print-d-none{
        display: none;
    }
}
    </style>
</head>
<body>

    <div class="container">
        <div class="payment_invoice">
            <div class="payment-title">
                <div class="row" id="top-header">
                    <div class="col-2">
                        <div class="logo">
                            <img src="{{asset('public/assets/images')}}/logo.png" alt="" class="img-fluid">
                        </div>
                    </div>
                    <div class="col-8">
                        <div class="title">
                            <b>ফেনী সরকারি কলেজ</b>
                            <p>শতবর্ষপূর্তি উদযাপন - ২০২২</p>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="image">
                            <img src="{{asset('public')}}/Backend/Images/StudentImage/{{$data->image}}" alt="Please Upload Image" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-title">
                <b>পেমেন্ট রশিদ</b>
            </div>
            <div class="invoice-body">
                <div class="row">
                    <div class="col-6" id="signle-box">
                        রেজিষ্ট্রেশন নাম্বার : <b>{{$data->registration_id}}</b>
                    </div>
                    <div class="col-6" id="signle-box">
                        মোট সদস্য : <b>{{$data->total_member}}</b>
                    </div>
                    <div class="col-12" id="signle-box">
                        নাম : <b>{{$data->name}}</b>
                    </div>
                    <div class="col-12" id="signle-box">
                        মোবাইল : <b>{{$data->phone}}</b>
                    </div>
                    <div class="col-6" id="signle-box">
                        লিঙ্গ : <b>{{$data->gender}}</b>
                    </div>
                    @if(Auth::guard('students')->user()->student_type == 1)
                    {{-- for runnig student --}}
                    <div class="col-6" id="signle-box">
                        ক্লাস : <b>{{$data->present_class}}</b>
                    </div>
                    <div class="col-6" id="signle-box">
                        রোল : <b>{{$data->roll_number}}</b>
                    </div>
                    <div class="col-6" id="signle-box">
                        শিক্ষাবর্ষ : <b>{{$data->session}}</b>
                    </div>
                    
                    {{-- for runnig student --}}
                    @else
                    {{-- for ex student --}}
                    <div class="col-6" id="signle-box">
                        সর্বশেষ যে শ্রেণীতে অধ্যয়ন করেছে : <b>{{$data->last_class}}</b>
                    </div>
                    <div class="col-6" id="signle-box">
                        পাসের সন : <b>{{$data->passing_year}}</b>
                    </div>
                    {{-- for ex student --}}
                    @endif
                    <div class="col-6" id="signle-box">
                        মোট টাকা : ৳ {{$data->total_ammount}}/-
                    </div>
                    <div class="col-6" id="signle-box">
                        পেমেন্ট : <b class="badge badge-success">Paid</b>
                    </div>
                </div>
            </div>
        </div>
        
    </div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
</body>
</html>