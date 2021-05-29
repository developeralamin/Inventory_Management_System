<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
   <title>Inventory Management System</title>
    <!-- Scripts -->
    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}
    <!-- Fonts -->
     <link rel="shortcut icon" href="{{ asset('asset/images/favicon_1.ico') }}">

    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}

            
        <!-- Base Css Files -->
        <link href="{{ asset('asset/css/bootstrap.min.css') }}" rel="stylesheet" />
        <!-- Font Icons -->
    <link href="{{ asset('asset/assets/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" />
        <link href="{{ asset('asset/assets/ionicon/css/ionicons.min.css') }}" rel="stylesheet" />
        <link href="{{ asset('asset/css/material-design-iconic-font.min.css') }}" rel="stylesheet">
        <!-- animate css -->
        <link href="{{ asset('asset/css/animate.css') }}" rel="stylesheet" />
        <!-- Waves-effect -->
        <link href="{{ asset('asset/css/waves-effect.css') }}" rel="stylesheet">
        <!-- sweet alerts -->
        <link href="{{ asset('asset/assets/sweet-alert/sweet-alert.min.css') }}" rel="stylesheet">
        <!-- Custom Files -->
        <link href="{{ asset('asset/css/helper.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('asset/css/style.css') }}" rel="stylesheet" type="text/css" />
        <script src="{{ asset('asset/js/modernizr.min.js')  }}"></script>
         <!-- DataTables -->
        <link href="{{ asset('asset/assets/datatables/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css" />
</head>
  <body>
    <body class="fixed-left">
        <!-- Begin page -->
        <div id="wrapper">
        
            @guest
                        
            @else
           <!-- Top Bar Start -->
            <div class="topbar">
                <!-- LOGO -->
                <div class="topbar-left">
                    <div class="text-center">
                        <a href="{{ route('home') }}" class="logo"><i class="md md-terrain"></i> <span>Inventory System</span></a>
                    </div>
                </div>
                <!-- Button mobile view to collapse sidebar menu -->
                <div class="navbar navbar-default" role="navigation">
                    <div class="container">
                        <div class="">
                            <div class="pull-left">
                                <button class="button-menu-mobile open-left">
                                    <i class="fa fa-bars"></i>
                                </button>
                                <span class="clearfix"></span>
                            </div>
                            <form class="navbar-form pull-left" role="search">
                                <div class="form-group">
                                    <input type="text" class="form-control search-bar" placeholder="Type here for search...">
                                </div>
                                <button type="submit" class="btn btn-search"><i class="fa fa-search"></i></button>
                            </form>

                            <ul class="nav navbar-nav navbar-right pull-right">
                                <li class="dropdown hidden-xs">
                                    <a href="#" data-target="#" class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" aria-expanded="true">
                                        <i class="md md-notifications"></i> <span class="badge badge-xs badge-danger">3</span>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-lg">
                                        <li class="text-center notifi-title">Notification</li>
                                        <li class="list-group">
                                           <!-- list item-->
                                           <a href="javascript:void(0);" class="list-group-item">
                                              <div class="media">
                                                 <div class="pull-left">
                                                    <em class="fa fa-user-plus fa-2x text-info"></em>
                                                 </div>
                                                 <div class="media-body clearfix">
                                                    <div class="media-heading">New user registered</div>
                                                    <p class="m-0">
                                                       <small>You have 10 unread messages</small>
                                                    </p>
                                                 </div>
                                              </div>
                                           </a>
                                           <!-- list item-->
                                            <a href="javascript:void(0);" class="list-group-item">
                                              <div class="media">
                                                 <div class="pull-left">
                                                    <em class="fa fa-diamond fa-2x text-primary"></em>
                                                 </div>
                                                 <div class="media-body clearfix">
                                                    <div class="media-heading">New settings</div>
                                                    <p class="m-0">
                                                       <small>There are new settings available</small>
                                                    </p>
                                                 </div>
                                              </div>
                                            </a>
                                            <!-- list item-->
                                            <a href="javascript:void(0);" class="list-group-item">
                                              <div class="media">
                                                 <div class="pull-left">
                                                    <em class="fa fa-bell-o fa-2x text-danger"></em>
                                                 </div>
                                                 <div class="media-body clearfix">
                                                    <div class="media-heading">Updates</div>
                                                    <p class="m-0">
                                                       <small>There are
                                                          <span class="text-primary">2</span> new updates available</small>
                                                    </p>
                                                 </div>
                                              </div>
                                            </a>
                                           <!-- last list item -->
                                            <a href="javascript:void(0);" class="list-group-item">
                                              <small>See all notifications</small>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="hidden-xs">
                                    <a href="#" id="btn-fullscreen" class="waves-effect waves-light"><i class="md md-crop-free"></i></a>
                                </li>
                                <li class="hidden-xs">
                                    <a href="#" class="right-bar-toggle waves-effect waves-light"><i class="md md-chat"></i></a>
                                </li>
                                <li class="dropdown">
                                    <a href="" class="dropdown-toggle profile" data-toggle="dropdown" aria-expanded="true"><img src="{{ asset('asset/images/users/me.jpg') }}" alt="user-img" class="img-circle"> </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="javascript:void(0)"><i class="md md-face-unlock"></i> Profile</a></li>
                                        <li><a href="javascript:void(0)"><i class="md md-settings"></i> Settings</a></li>
                                        <li><a href="javascript:void(0)"><i class="md md-lock"></i> Lock screen</a></li>
                                        <li>
                                       <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{-- {{ __('Logout') }} --}}
                                    <i class="md md-settings-power"></i>
                                    Logout
                                    </a>
                                     <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <!--/.nav-collapse -->
                    </div>
                </div>
            </div>
            <!-- Top Bar End -->


            <!-- ========== Left Sidebar Start ========== -->

            <div class="left side-menu">
                <div class="sidebar-inner slimscrollleft">
                    <div class="user-details">
                        <div class="pull-left">
                            <img src="{{ asset('asset/images/users/me.jpg') }}" alt="" class="thumb-md img-circle">
                        </div>
                        <div class="user-info">
                            <div class="dropdown">
                               <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a href="javascript:void(0)"><i class="md md-face-unlock"></i> Profile<div class="ripple-wrapper"></div></a></li>
                                    <li><a href="javascript:void(0)"><i class="md md-settings"></i> Settings</a></li>
                                    <li><a href="javascript:void(0)"><i class="md md-lock"></i> Lock screen</a></li>
                                    <li>
                                       <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{-- {{ __('Logout') }} --}}
                                    <i class="md md-settings-power"></i>
                                    Logout
                                    </a>
                                     <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>
                                </ul>
                            </div>
                            
                            <p class="text-muted m-0">Admin</p>
                        </div>
                    </div>
                    <!--- Divider -->
                    <div id="sidebar-menu">
                        <ul>
                            <li class="{{ Request::is('home*') ? 'active':'' }}">
                                <a href="{{ route('home') }}" class="waves-effect active"><i class="md md-home"></i><span> Dashboard </span></a>
                            </li>

                            <li class="">
                                <a href="{{ route('pos') }}" class="waves-effect"><i class="md md-share"></i><span> POS </span></a>
                            </li>

                            <li  class="{{ Request::is('employee*') ? 'active':'' }} has_sub">
                                <a href="#" class="waves-effect"><i class="md md-mail"></i><span> Employee </span><span class="pull-right"><i class="md md-add"></i></span></a>
                            <ul class="list-unstyled">
                                <li><a href="{{ route('employee.index') }}">All Employee</a></li>
                                
                            </ul>
                            </li>


                            <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="md md-palette"></i> <span> Customer</span> <span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="{{ route('customer.index') }}">All Customer</a></li>
                                
                                </ul>
                            </li>

                            <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="md md-invert-colors-on"></i><span> Supplier </span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="{{ route('supplier.index') }}">All Supplier</a></li>
                                
                                </ul>
                            </li>

                            <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="md md-redeem"></i> <span> Salaries (EMP) </span> <span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="{{ route('salary.create') }}">Add Salary</a></li>

                                    <li><a href="{{ route('salary.index') }}">All Salary</a></li>

                                    <li><a href="{{ route('pay.salary') }}">Pay Salary</a></li>

                                    <li><a href="{{ route('salary.index') }}">Last Pay Salary</a></li>
                                
                                </ul>
                            </li>
                            
                            <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="md md-now-widgets"></i><span> Category </span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="{{  route('category.index')  }}">All Category</a></li>
                                    <li><a href="{{  route('category.create') }}">Add Category</a></li>
                                </ul>
                            </li>

                            <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="md md-view-list"></i><span> Products </span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="{{ route('product.index') }}">All Product</a></li>
                                    <li><a href="{{ route('product.create') }}">Add Product</a></li>
                                   
                                </ul>
                            </li>

                            <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="md md-poll"></i><span> Expense </span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="{{ route('add.expense') }}">Add Expense</a></li>
                                    <li><a href="{{  route('today.expense') }}">Today Expense</a></li>
                                    <li><a href="{{ route('monthly.expense') }}">Monthly Expense</a></li>
                                    <li><a href="{{ route('yearly.expense') }}">Yearly Expense</a></li>
                                    
                                </ul>
                            </li>

                <li class="has_sub">
                    <a href="#" class="waves-effect"><i class="ion-refresh"></i><span> Attendance </span><span class="pull-right"><i class="md md-add"></i></span></a>
                      <ul class="list-unstyled">
                         <li><a href="{{ route('take.attendance') }}">Take Attendance</a></li>
                         <li><a href="{{ route('all.attendance') }}">All Attendance</a></li>
                                   
                     </ul>
               </li>

                            <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="md md-place"></i><span> Orders </span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="{{ route('pending_order') }}">Pending Order</a></li>
                                    <li><a href="{{ route('success_order') }}">Success Order</a></li>
                                   
                                </ul>
                            </li>

                            <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="md md-place"></i><span> Sales Report </span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="#"></a></li>
                                   
                                </ul>
                            </li>

                            <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="md md-pages"></i><span>Setting</span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="{{ route('setting.profile') }}">Setting</a></li>
                                   
                                </ul>
                            </li>

                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <!-- Left Sidebar End --> 

            @endguest
        </div>

        <main class="py-4">
            @yield('content')
        </main>
    
 </div>


 <script>
            var resizefunc = [];
        </script>

     <!-- jQuery  -->
        <script src="{{ asset('asset/js/jquery.min.js') }}"></script>
        <script src="{{ asset('asset/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('asset/js/waves.js') }}"></script>
        <script src="{{ asset('asset/js/wow.min.js') }}"></script>
        <script src="{{ asset('asset/js/jquery.nicescroll.js') }}" type="text/javascript"></script>
        <script src="{{ asset('asset/js/jquery.scrollTo.min.js') }}"></script>
        <script src="{{ asset('asset/assets/chat/moment-2.2.1.js') }}"></script>
        <script src="{{ asset('asset/assets/jquery-sparkline/jquery.sparkline.min.js') }}"></script>
        <script src="{{ asset('asset/assets/jquery-detectmobile/detect.js') }}"></script>
        <script src="{{ asset('asset/assets/fastclick/fastclick.js') }}"></script>
        <script src="{{ asset('asset/assets/jquery-slimscroll/jquery.slimscroll.js') }}"></script>
        <script src="{{ asset('asset/assets/jquery-blockui/jquery.blockUI.js') }}"></script>
        <!-- sweet alerts -->
        <script src="assets/sweet-alert/sweet-alert.min.js"></script>
        <script src="assets/sweet-alert/sweet-alert.init.js"></script>
        <!-- flot Chart -->
        <script src="{{ asset('asset/assets/flot-chart/jquery.flot.js') }}"></script>
        <script src="{{ asset('asset/assets/flot-chart/jquery.flot.time.js') }}"></script>
        <script src="{{ asset('asset/assets/flot-chart/jquery.flot.tooltip.min.js') }}"></script>
        <script src="{{ asset('asset/assets/flot-chart/jquery.flot.resize.js') }}"></script>
        <script src="{{ asset('asset/assets/flot-chart/jquery.flot.pie.js') }}"></script>
        <script src="{{ asset('asset/assets/flot-chart/jquery.flot.selection.js') }}"></script>
        <script src="{{ asset('asset/assets/flot-chart/jquery.flot.stack.js') }}"></script>
        <script src="{{ asset('asset/assets/flot-chart/jquery.flot.crosshair.js') }}"></script>
        <!-- Counter-up -->
        <script src="{{ asset('asset/assets/counterup/waypoints.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('asset/assets/counterup/jquery.counterup.min.js') }}" type="text/javascript"></script>
        <!-- CUSTOM JS -->
        <script src="{{ asset('asset/js/jquery.app.js') }}"></script>
        <!-- Dashboard -->
        <script src="{{ asset('asset/js/jquery.dashboard.js') }}"></script>
        <!-- Chat -->
        <script src="{{ asset('asset/js/jquery.chat.js') }}"></script>
        <!-- Todo -->
        <script src="{{ asset('asset/js/jquery.todo.js') }}"></script>
        <script src="{{ asset('asset/assets/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('asset/assets/datatables/dataTables.bootstrap.js') }}"></script>


       
        <script type="text/javascript">
            /* ==============================================
            Counter Up
            =============================================== */
            jQuery(document).ready(function($) {
                $('.counter').counterUp({
                    delay: 100,
                    time: 1200
                });
                $('#usetable').dataTable();
            });
        </script>
</body>
</html>
