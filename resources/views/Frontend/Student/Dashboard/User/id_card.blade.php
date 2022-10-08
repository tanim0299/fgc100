<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>ID Card</title>
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css
">
<link href="https://fonts.maateen.me/adorsho-lipi/font.css" rel="stylesheet">
<style>
	body {
    font-family: 'AdorshoLipi', Arial, sans-serif !important;
}
	.box {
    border: 1px solid black;
    height: 5in;
    width: 3.5in;   
	position: relative;
	overflow: hidden;
	background-color: rgb(253, 237, 163);
	margin-top: 20px;

}
.logo {
    text-align: center;
}

.logo img {
    max-width: 92px;
}
.title {
    text-align: center;
    margin-top: 6px;
}

.title b {
    font-size: 15px;
}
.title span {
    font-size: 13px;
}
.card-title {
    background: orange;
    /* color: white; */
    padding: 4px 0px;
    text-align: center;
    margin-top: 5px;
}
.image img {
    height: 87px;
    width: 86px;
    border: 1px solid black;
    padding: 1px;
}

.image {
    text-align: center;
    margin-top: 2px;
}
.p-info {
    font-size: 11px;
    /* margin-top: 20px; */
}

table.table tr {
    padding: 0px !important;
}

table.table td {
    padding: 3px 13px;
	border: 1px solid black;
}
.footer {
    background: orange;
    font-size: 11px;
    text-align: center;
    padding: 5px;
    position: absolute;
    bottom: 0;
    width: 100%;
}
/* .barcode{
    position: absolute;
    left: 50px;
    top: 206px;
} */

.barcode {
    margin-top: 6px;
    padding-left: 11%
}

.p-info {
    margin-top: 14px;
}

table.table {margin: 0px;}
</style>
</head>
<body oncontextmenu="return false;">

<div class="wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-6">
				<div class="box">
					<div class="logo">
						<img src="{{asset('public')}}/assets/images/logo.png" alt="" class="img-fluid">
					</div>
					<div class="title">
						<b>ফেনী সরকারি কলেজ</b><br>
						<span>শতবর্ষ উদযাপন - ২০২২</span>
					</div>
					<div class="card-title">
						<b>আইডি কার্ড</b>
					</div>
					<div class="image">
						<img src="{{asset('public')}}/Backend/Images/StudentImage/{{$data->image}}" alt="Please Upload Image" class="img-fluid">
					</div>
					<div class="barcode">
                        @php
                            $generator = new Picqer\Barcode\BarcodeGeneratorHTML();
                        @endphp
						{!! $generator->getBarcode($data->registration_id, $generator::TYPE_CODE_128) !!}
					</div>
					<div class="p-info">
						<table class="table">
							<tr>
								<td><b>নাম</b></td>
								<td>{{$data->name}}</td>
							</tr>
							<tr>
								<td><b>পিতার নাম</b></td>
								<td>{{$data->fathers_name}}</td>
							</tr>
							<tr>
								<td><b>মাতার নাম</b></td>
								<td>{{$data->mothers_name}}</td>
							</tr>
                            @if(Auth::guard('students')->user()->student_type == 0)
							<tr>
								<td><b>সর্বশেষ ক্লাস</b></td>
								<td>{{$data->last_class}}</td>
							</tr>
                            @else
							<tr>
								<td><b>ক্লাস</b></td>
								<td>{{$data->class}}</td>
							</tr>
                            @endif
							<tr>
								<td><b>শিক্ষাবর্ষ</b></td>
								<td>{{$data->session}}</td>
							</tr>
							<tr>
								<td><b>মোট সদস্য</b></td>
								<td>{{$data->total_member}}</td>
							</tr>
							<tr>
								<td><b>মোট টাকা</b></td>
								<td>{{$data->total_ammount}}/-</td>
							</tr>
						</table>
					</div>
					<div class="footer">
						<span>কার্ডটি নিজ দায়িত্বে ডাউনলোড করে সংরক্ষণ করুন।</span>
					</div>
				</div>
			</div>
			@if(Auth::guard('students')->user()->student_type == 0)
			@if($family)
			<div class="col-6">
				<div class="box">
					<div class="logo">
						<img src="{{asset('public')}}/assets/images/logo.png" alt="" class="img-fluid">
					</div>
					<div class="title">
						<b>ফেনী সরকারি কলেজ</b><br>
						<span>শতবর্ষ উদযাপন - ২০২২</span>
					</div>
					<div class="card-title">
						<b>আইডি কার্ড</b>
					</div>
					<div class="image">
						<img src="{{asset('public')}}/Backend/Images/FamilyMember/{{$family->family_member_image}}" alt="Please Upload Image" class="img-fluid">
					</div>
					<div class="barcode">
                        @php
                            $generator = new Picqer\Barcode\BarcodeGeneratorHTML();
                        @endphp
						{!! $generator->getBarcode($family->family_member_id, $generator::TYPE_CODE_128) !!}
					</div>
					<div class="p-info">
						<table class="table">
							<tr>
								<td><b>নাম</b></td>
								<td>{{$family->family_member_name}}</td>
							</tr>
							{{-- <tr>
								<td><b>পিতার নাম</b></td>
								<td>{{$data->fathers_name}}</td>
							</tr>
							<tr>
								<td><b>মাতার নাম</b></td>
								<td>{{$data->mothers_name}}</td>
							</tr> --}}
                            {{-- @if(Auth::guard('students')->user()->student_type == 0)
							<tr>
								<td><b>সর্বশেষ ক্লাস</b></td>
								<td>{{$data->last_class}}</td>
							</tr>
                            @else
							<tr>
								<td><b>ক্লাস</b></td>
								<td>{{$data->class}}</td>
							</tr>
                            @endif --}}
							<tr>
								<td><b>রেফারেন্স</b></td>
								<td>{{$family->name}}</td>
							</tr>
							<tr>
								<td><b>রেফারেন্স সর্বশেষ ক্লাস</b></td>
								<td>{{$family->last_class}}</td>
							</tr>
							<tr>
								<td><b>শিক্ষাবর্ষ</b></td>
								<td>{{$family->session}}</td>
							</tr>
						</table>
					</div>
					<div class="footer">
						<span>কার্ডটি নিজ দায়িত্বে ডাউনলোড করে সংরক্ষণ করুন।</span>
					</div>
				</div>
			</div>
			@endif
			@endif
		</div>
	</div>
</div>

<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js
"></script>
</body>
</html>