<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title')</title>






    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('sb-admin/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('sb-admin/dist/css/styleAdmin.css') }}" rel="stylesheet">
    <!-- MetisMenu CSS -->
    <link href="{{ asset('sb-admin/vendor/metisMenu/metisMenu.min.css')}}" rel="stylesheet">

<link type="text/css" href="{{asset('sb-admin/vendor/datatables-plugins/dataTables.bootstrap.css')}}" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link type="text/css" href="{{asset('sb-admin/vendor/datatables-responsive/dataTables.responsive.css')}}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{asset('sb-admin/dist/css/sb-admin-2.css')}}" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="{{asset('sb-admin/vendor/morrisjs/morris.css')}}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{asset('sb-admin/vendor/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">



    <!-- DataTables CSS -->
    


    </head>

    <body>

        <div id="wrapper">

            <!-- Navigation -->
            <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="{{ route('getDashboard')}}">
                        @if(Auth::user()->level_id < 2)
                            Admin management
                        @else 
                            Censor management
                        @endif
                    </a>
                </div>
                <!-- /.navbar-header -->

                <ul class="nav navbar-top-links navbar-right">

                    <!-- /.dropdown -->
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-user fa-fw"></i> {{ Auth::user()->name }} <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="{{ route('getLogout') }}"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                            </li>

                        </ul>
                        <!-- /.dropdown-user -->
                    </li>
                    <!-- /.dropdown -->
                </ul>
                <!-- /.navbar-top-links -->

                <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                        <ul class="nav" id="side-menu">
                            <li>
                                <a href="{{ route('getDashboard')}}"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                            </li>

                            <li>
                                <a href="#"><i class="fa fa-sitemap fa-fw"></i> Manage News <span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="{{ route('getAddNews') }}"><i class="fa fa-plus-square" aria-hidden="true"></i> Add News</a>
                                    </li>

                                    <li>
                                        <a href="{{ route('getListNews') }}"><i class="fa fa-list" aria-hidden="true"></i> List News</a>

                                    </li>
                                </ul>
                            </li>
                            
                            @if(Auth::user()->level_id < 2)
                            
                            
                            <li>
                                <a href="#"><i class="fa fa-sitemap fa-fw"></i> Manage Major <span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="{{ route('getAddMajor') }}"><i class="fa fa-plus-square" aria-hidden="true"></i> Add Major</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('getListMajors') }}"><i class="fa fa-list" aria-hidden="true"></i> List Majors</a>

                                    </li>
                                </ul>
                            </li>

                            <li>
                                <a href="#"><i class="fa fa-sitemap fa-fw"></i> Manage Subject <span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="{{ route('getAddSubject') }}"><i class="fa fa-plus-square" aria-hidden="true"></i> Add Subject</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('getListSubjects') }}"><i class="fa fa-list" aria-hidden="true"></i> List Subjects</a>

                                    </li>
                                </ul>
                            </li>

                            <li>
                                <a href="#"><i class="fa fa-sitemap fa-fw"></i> Manage User <span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="{{ route('getAddUser') }}"><i class="fa fa-plus-square" aria-hidden="true"></i> Add User</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('getListUser') }}"><i class="fa fa-list" aria-hidden="true"></i> List Users</a>

                                    </li>
                                </ul>
                            </li>
                            
                            <li>
                                <a href="{{ route('getReport') }}"><i class="fa fa-flag" aria-hidden="true"></i> Log</a>

                            </li>
                            @endif

                        </ul>
                    </div>
                    <!-- /.sidebar-collapse -->
                </div>
                <!-- /.navbar-static-side -->
            </nav>

            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">@yield('header')</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                    @include('sb-admin.blocks.errors')
                    @yield('content')
                </div>
                <!-- /.row -->

                <!-- /.row -->
            </div>
            <!-- /#page-wrapper -->

        </div>
        <!-- /#wrapper -->

        <!-- jQuery -->




        <script src="{{asset('sb-admin/vendor/jquery/jquery.min.js')}}"></script>

        <script src="{{asset('sb-admin/dist/js/myscript.js')}}"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="{{asset('sb-admin/vendor/bootstrap/js/bootstrap.min.js')}}"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="{{asset('sb-admin/vendor/metisMenu/metisMenu.min.js')}}"></script>


        <script src="{{asset('sb-admin/vendor/raphael/raphael.min.js')}}"></script>
        <script src="{{asset('sb-admin/vendor/morrisjs/morris.min.js')}}"></script>
        {{-- <script src="{{asset('sb-admin/data/morris-data.js')}}"></script> --}}

        <!-- Custom Theme JavaScript -->
        <script src="{{asset('sb-admin/dist/js/sb-admin-2.js')}}"></script>
        



         <script src="{{asset('sb-admin/vendor/datatables/js/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('sb-admin/vendor/datatables-plugins/dataTables.bootstrap.min.js')}}"></script>
        <script src="{{asset('sb-admin/vendor/datatables-responsive/dataTables.responsive.js')}}"></script>



        <!-- Morris Charts JavaScript -->
   


        <!-- Bootstrap Core JavaScript -->

        <!-- Metis Menu Plugin JavaScript -->

        <!-- DataTables JavaScript -->
       

        <!-- Custom Theme JavaScript -->
        <script>
            $(document).ready(function() {
                $('#dataTables-example').DataTable({
                    responsive: true
                });
            });
        </script>

    </body>

    </html>
