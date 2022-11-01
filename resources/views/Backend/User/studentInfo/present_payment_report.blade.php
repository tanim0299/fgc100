<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Runnig Payment Report</title>
	<link rel="stylesheet" type="text/css" href="{{asset('public/Backend')}}/bower_components/bootstrap/css/bootstrap.min.css">
</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Noto+Serif+Bengali:wght@400;500;600&display=swap');
    body{
        font-family: 'Noto Serif Bengali'!important;
    }
</style>
<body>
        
    <div class="container-fluid">
        <div class="table-responsive">
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th>সিরিয়াল নং</th>
                        <th>রেজিষ্ট্রেশন নং</th>
                        <th>নাম</th>
                        <th>পিতার নাম</th>
                        <th>মাতার নাম</th>
                        <th>লিঙ্গ</th>
                        <th>শ্রেণী</th>
                        <th>রোল</th>
                        <th>শিক্ষাবর্ষ</th>
                        <th>মোবাইল</th>
                        <th>টিশার্ট সাইজ</th>
                        <th>টোটাল সদস্য</th>
                        <th>মোট টাকা</th>
                        <th>পেমেন্ট স্ট্যাটাস</th>
                        <th>ছবি</th>
                    </tr>
                </thead>
                <tbody>
                    @if($data)
                    @foreach($data as $showdata)
                    <tr>
                    </tr>
                        <td>{{$sl++}}</td>
                        <td>{{$showdata->registration_id}}</td>
                        <td>{{$showdata->name}}</td>
                        <td>{{$showdata->fathers_name}}</td>
                        <td>{{$showdata->mothers_name}}</td>
                        <td>{{$showdata->gender}}</td>
                        <td>{{$showdata->class}}</td>
                        <td>{{$showdata->roll_number}}</td>
                        <td>{{$showdata->session}}</td>
                        <td>{{$showdata->phone}}</td>
                        <td>{{$showdata->t_shirt}}</td>
                        <td>{{$showdata->total_member}}</td>
                        <td>{{$showdata->total_ammount}}</td>
                        <td>@if($showdata->payment == 1)<b class="badge badge-success">Paid</b>@else<b class="badge badge-danget">Unpaid</b>@endif</b></td>
                        <td>
                            <img src="{{asset('public/Backend/Images/StudentImage')}}/{{$showdata->image}}" style="height:80px;width:80px;">
                        </td>
                    @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
    
</body>
</html>