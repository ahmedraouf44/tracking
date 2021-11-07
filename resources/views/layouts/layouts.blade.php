<!DOCTYPE html>
<html lang="{{ trans('backLang.code') }}" dir="{{ trans('backLang.direction') }}">
<head>
    @include('includes.header')

</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">

    <!-- start Navbar -->
    @include('includes.navbar')
    <!-- end Navbar -->

    <!-- start Sidebar -->
    @include('includes.Sidebar')
    <!-- end Sidebar -->

    <div class="content-wrapper">

        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Tracking System</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

    <!-- Content Section -->
    @yield('content')
    <!-- end of Content Section -->

    </div>

    <!-- Main Footer -->
    <footer class="main-footer">
        <strong>Copyright &copy; 2021 <a href="#">Tracking</a>.</strong>
        All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
            <!--<b>Version</b> 3.0.1-->
        </div>
    </footer>

</div>
    @include('includes.footer')

    @yield('js')

</body>
</html>
