<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Ecommerce | Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="{{ asset('backend') }}/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('backend') }}/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{ asset('backend') }}/dist/css/skins/_all-skins.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('backend') }}/plugins/iCheck/flat/blue.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="{{ asset('backend') }}/plugins/morris/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="{{ asset('backend') }}/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="{{ asset('backend') }}/plugins/datepicker/datepicker3.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('backend') }}/plugins/daterangepicker/daterangepicker-bs3.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="{{ asset('backend') }}/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <link rel="stylesheet" href="{{ asset('backend') }}/plugins/datatables/dataTables.bootstrap.css">
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        @include('admin.layouts.navbar')
        <!-- Left side column. contains the logo and sidebar -->
        @include('admin.layouts.sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->


            <!-- Main content -->
            @yield('admin_content')
        </div><!-- /.content-wrapper -->

    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
    <script src="{{ asset('backend') }}/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.5 -->
    <script src="{{ asset('backend') }}/bootstrap/js/bootstrap.min.js"></script>
    <!-- Morris.js charts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="{{ asset('backend') }}/plugins/morris/morris.min.js"></script>
    <!-- Sparkline -->
    <script src="{{ asset('backend') }}/plugins/sparkline/jquery.sparkline.min.js"></script>
    <!-- jvectormap -->
    <script src="{{ asset('backend') }}/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="{{ asset('backend') }}/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{ asset('backend') }}/plugins/knob/jquery.knob.js"></script>
    <!-- daterangepicker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
    <script src="{{ asset('backend') }}/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- datepicker -->
    <script src="{{ asset('backend') }}/plugins/datepicker/bootstrap-datepicker.js"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="{{ asset('backend') }}/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <!-- Slimscroll -->
    <script src="{{ asset('backend') }}/plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="{{ asset('backend') }}/plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('backend') }}/dist/js/app.min.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{ asset('backend') }}/dist/js/pages/dashboard.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('backend') }}/dist/js/demo.js"></script>
    <script src="{{ asset('backend') }}/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ asset('backend') }}/plugins/datatables/dataTables.bootstrap.min.js"></script>

    <script>
        $(function() {
            $("#example1").DataTable();
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false
            });
        });
    </script>
</body>

</html>
