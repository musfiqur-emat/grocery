<!DOCTYPE html>
<html>
<head>
	<title>
		Grossary
	</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<link href="{{URL::to('/')}}/public/css/fonts-googleapis.css" rel="stylesheet" type="text/css" />
        <link href="{{URL::to('/')}}/public/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="{{URL::to('/')}}/public/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="{{URL::to('/')}}/public/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="{{URL::to('/')}}/public/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
        <link href="{{URL::to('/')}}/public/css/bootstrap-timepicker.min.css" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- CSS FOR DATERANGE -->
        <link href="{{URL::to('/')}}/public/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css" rel="stylesheet" type="text/css" />
        <!-- ENDS -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="{{URL::to('/')}}/public/assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="{{URL::to('/')}}/public/assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <link href="{{URL::to('/')}}/public/assets/layouts/layout/css/layout.min.css" rel="stylesheet" type="text/css" />
        <link href="{{URL::to('/')}}/public/assets/layouts/layout/css/custom.min.css" rel="stylesheet" type="text/css" />

        <link href="{{URL::to('/')}}/public/assets/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
        <link href="{{URL::to('/')}}/public/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="{{URL::to('/')}}/public/css/jquery-confirm.min.css">
        <link rel="stylesheet" href="{{URL::to('/')}}/public/css/chosen.css">
</head>
<body>
	@include('developer.includes.header')
	<div class="container">	
	       @yield('body')
	       @include('developer.includes.footer')
	</div>
	
</body>
</html>