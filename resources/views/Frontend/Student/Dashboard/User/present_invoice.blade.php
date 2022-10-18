<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Payment Invoice</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Noto+Serif+Bengali:wght@400;500;600&display=swap');
        body{
    font-family: 'Noto Serif Bengali'!important;
}
.logo img {
    max-width: 177px;
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
    background: rgb(27 163 80);
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
                    <div class="col-12 text-center">
                        <div class="logo">
                            <img src="{{asset('public/assets/images')}}/logo.png" alt="" class="img-fluid">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="title">
                            <b>ফেনী সরকারি কলেজ</b>
                            <p>শতবর্ষপূর্তি উদযাপন - ২০২২</p>
                        </div>
                    </div>
                    <div class="col-2">
                        
                    </div>
                </div>
            </div>
            <div class="card-title">
                <b>পেমেন্ট রশিদ</b>
            </div>
            <div class="invoice-body mt-2">
                <div class="row">
                    <div class="col-10">
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
                                লিঙ্গ : <b style="text-transform:capitalize;">{{$data->gender}}</b>
                            </div>
                            
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
                            <div class="col-6" id="signle-box">
                                মোট টাকা : ৳ {{$data->total_ammount}}/-
                            </div>
                            <div class="col-6" id="signle-box">
                                পেমেন্ট : @if($data->payment == 1)<b class="badge badge-success">Paid</b>@else <b class="badge badge-danger">Unpaid</b> @endif
                            </div>
                            <div class="col-6" id="signle-box">
                                 @php
                                    $generator = new Picqer\Barcode\BarcodeGeneratorHTML();
                                @endphp
        						{!! $generator->getBarcode($data->registration_id, $generator::TYPE_CODE_128) !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="image">
                            <img src="{{asset('public')}}/Backend/Images/StudentImage/{{$data->image}}" alt="Please Upload Image" class="img-fluid" height="200px" width="190px">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="download-btn text-center print-d-none mt-5">
            {{-- <a href="{{url('/download_reciept')}}" class="btn btn-info"> Download</a> --}}
            <a href="#" onclick="window.print()" class="btn btn-dark"> Print</a>
        </div>
    </div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

@if(Session::has('warning_pay'))
  <script>
      swal('Oops!', '{{ Session::get('warning_pay') }}', 'warning');
  </script>

@endif
@if(Session::has('error_pay'))
  <script>
      swal('Oops!', '{{ Session::get('error_pay') }}', 'error');
  </script>

@endif
@if(Session::has('success_pay'))
  <script>
      swal('Congratulations!', '{{ Session::get('success_pay') }}', 'success');
  </script>

@endif
</body>
</html>