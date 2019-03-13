<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
 <!-- BEGIN HEAD -->
    <head>
        <meta charset="utf-8" />
        <title>@if(isset($title)) {{$title}} @endif</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="Preview page of Metronic Admin Theme #1 for statistics, charts, recent events and reports" name="description" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="{{ asset('global/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('global/plugins/simple-line-icons/simple-line-icons.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('global/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('global/plugins/bootstrap-switch/css/bootstrap-switch.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="{{ asset('global/plugins/bootstrap-daterangepicker/daterangepicker.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('global/plugins/morris/morris.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('global/plugins/fullcalendar/fullcalendar.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('global/plugins/jqvmap/jqvmap/jqvmap.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('global/plugins/export/export.css') }}" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->
		<!-- BEGIN PLUGINS USED BY X-EDITABLE -->
		<link rel="stylesheet" type="text/css" href="{{ asset('global/plugins/select2/css/select2.css') }}"/>
		<link rel="stylesheet" type="text/css" href="{{ asset('global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css') }}"/>
		<link rel="stylesheet" type="text/css" href="{{ asset('global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') }}"/>
		<link rel="stylesheet" type="text/css" href="{{ asset('global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}"/>
		<link rel="stylesheet" type="text/css" href="{{ asset('global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css') }}"/>
		<link rel="stylesheet" type="text/css" href="{{ asset('global/plugins/bootstrap-editable/bootstrap-editable/css/bootstrap-editable.css') }}"/>
		<link rel="stylesheet" type="text/css" href="{{ asset('global/plugins/bootstrap-editable/inputs-ext/address/address.css') }}"/>
		<!-- END PLUGINS USED BY X-EDITABLE -->
		<!-- BEGIN THEME GLOBAL STYLES -->
        <link href="{{ asset('global/css/components.min.css') }}" rel="stylesheet" id="style_components" type="text/css" />
        <link href="{{ asset('global/css/plugins.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <link href="{{ asset('layouts/layout/css/layout.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('layouts/layout/css/themes/darkblue.min.css') }}" rel="stylesheet" type="text/css" id="style_color" />
        <link href="{{ asset('layouts/layout/css/custom.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{asset('js/datatables/dataTables.bootstrap.css')}}" rel="stylesheet">
		<link href="{{asset('pages/css/jquery.dataTables.min.css')}}" rel="stylesheet">
		 <script src="//code.jquery.com/jquery-3.2.1.js" integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE=" crossorigin="anonymous"></script>
        <!-- END THEME LAYOUT STYLES -->
        <link rel="shortcut icon" href="{{asset('layouts/layout/img/favicon.ico')}}" /> 
		
	@stack('styles')
</head>
    <!-- END HEAD -->
 <body class="page-header-fixed page-sidebar-closed-hide-logo page-container-bg-solid page-content-white">
       @include('admin.header')
    <div class="clearfix"> </div>
   @include('admin.sidebar')
    <div class="content-wrapper">
    @yield('content')
  </div>
    <!-- Scripts -->
	 @include('admin.footer')
	
    <!--script src="{{ asset('js/app.js') }}"></script-->
<!--	<script src="{{ asset('js/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('js/datatables/dataTables.bootstrap.js') }}"></script>-->
   <script>
	$("div.menu-toggler.sidebar-toggler").click(function(){
		$("body").toggleClass("page-sidebar-closed");
	});
	</script>
	@stack('scripts')
</body>
</html>
