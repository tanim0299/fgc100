@extends('Backend.Layouts.master')
@section('body')
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
.titles {
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
<div class="pcoded-content">

<div class="page-header card">
<div class="row align-items-end">
<div class="col-lg-8">
<div class="page-header-title">
<!-- <i class="feather icon-home bg-c-blue"></i> -->
<div class="d-inline">
<h5>View Ex Students</h5>
<!-- <span>This Is SBIT Dashboard</span> -->

</div>
</div>
</div>

</div>
</div>

<div class="pcoded-inner-content">
<div class="main-body">
<div class="page-wrapper">
<div class="page-body">
 
 <!-- //body content goes here -->
 <div class="form-body">
    <div class="card">
        <div class="card-header">
             <h5>Seach Member</h5>
        </div>
        <div class="card-block">
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
                <input type="search" class="form-control" name="data" id="ex_data">
                <div class="row" id="getData">

                
            </div>
            </div>
        </div>
    </div> 
 </div>
 <!-- //body content goes here -->

</div>
</div>
</div>
</div>
</div>




@endsection