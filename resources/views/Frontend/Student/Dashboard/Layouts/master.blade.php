<!DOCTYPE html>
<html lang="en">

<head>
    @include('Frontend.Student.Dashboard.Layouts.head')
</head>
<!--oncontextmenu="return false;"-->
<body class="" >
	<!-- [ Pre-loader ] start -->
	<div class="loader-bg">
		<div class="loader-track">
			<div class="loader-fill"></div>
		</div>
	</div>
	<!-- [ Pre-loader ] End -->
	@include('Frontend.Student.Dashboard.Layouts.sidebar')

	<!-- [ Header ] end -->
    @yield('body')

@include('Frontend.Student.Dashboard.Layouts.footer')
@include('Frontend.Student.Dashboard.Layouts.js')

