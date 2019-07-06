<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
    <title>Easy Admin Panel an Admin Panel Category Flat Bootstrap Responsive Website Template | Home :: w3layouts</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Easy Admin Panel Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('admin/dasbroad') }}/css/bootstrap.min.css" rel='stylesheet' type='text/css' />
    <!-- Custom CSS -->
    <link href="{{ asset('admin/dasbroad') }}/css/style.css" rel='stylesheet' type='text/css' />
    <!-- Graph CSS -->
    <link href="{{ asset('admin/dasbroad') }}/css/font-awesome.css" rel="stylesheet">
    <!-- jQuery -->
    <!-- lined-icons -->
    <link rel="stylesheet" href="{{ asset('admin/dasbroad') }}/css/icon-font.min.css" type='text/css' />
    <!-- //lined-icons -->
    <!-- chart -->
    <script src="{{ asset('admin/dasbroad') }}/js/Chart.js"></script>
    <!-- //chart -->
    <!--animate-->
    <link href="{{ asset('admin/dasbroad') }}/css/animate.css" rel="stylesheet" type="text/css" media="all">
    <script src="{{ asset('admin/dasbroad') }}/js/wow.min.js"></script>
    <script>
        new WOW().init();
    </script>
    <!--//end-animate-->
    <!----webfonts--->
    <link href='https://fonts.googleapis.com/css?family=Cabin:400,400italic,500,500italic,600,600italic,700,700italic' rel='stylesheet' type='text/css'>
    <!---//webfonts--->
    <!-- Meters graphs -->
    <script src="{{ asset('admin/dasbroad') }}/js/jquery-1.10.2.min.js"></script>
    <!-- Placed js at the end of the document so the pages load faster -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
  
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
        {{-- <link rel="stylesheet" type="text/css" href="/DataTables/datatables.css">
        
        <script type="text/javascript" charset="utf8" src="/DataTables/datatables.js"></script> --}}

        <script type="text/javascript" src="{{asset('')}}ckeditor/ckeditor.js"></script>
        {{-- <script type="text/javascript" src="//cdn.ckeditor.com/4.5.3/standard/ckeditor.js"></script> --}}

</head>

<body class="sticky-header left-side-collapsed"  onload="initMap()">
<section>
    <!-- left side start-->
@include('admincp.sidebar')
<!-- left side end-->

    <!-- main content start-->
    <div class="main-content">
        <!-- header-starts -->
    @include('admincp.header')
    <!-- //header-ends -->
    <section style="margin: 2.5%">
        @yield('content')
    </section>
    <!--body wrapper end-->
    </div>
    <!--footer section start-->
    <footer>
        <p>&copy 2015 Easy Admin Panel. All Rights Reserved | Design by <a href="https://w3layouts.com/" target="_blank">w3layouts.</a></p>
    </footer>
    <!--footer section end-->

    <!-- main content end-->
</section>

<script src="{{ asset('admin/dasbroad') }}/js/jquery.nicescroll.js"></script>
<script src="{{ asset('admin/dasbroad') }}/js/scripts.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="{{ asset('admin/dasbroad') }}/js/bootstrap.min.js"></script>
<script>
$(document).ready( function () {
            $('#dbtbl').DataTable();
        } );
</script>

</body>
</html>
