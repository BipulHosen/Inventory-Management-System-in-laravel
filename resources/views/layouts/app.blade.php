<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <!-- <script src="{{ asset('js/app.js') }}" defer></script> -->
     <!-- App favicon -->
        <link rel="shortcut icon" href="public/assets/images/favicon.ico">

        <!-- Plugins css-->
      <!--   <link href="public/assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" /> -->

        <!-- App css -->
        <link href="{{asset('public/assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" id="bootstrap-stylesheet" />
        <link href="{{asset('public/assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('public/assets/css/app.min.css')}}" rel="stylesheet" type="text/css" id="app-stylesheet" />

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
  <!--   <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
   <!--for toaster notification-->
   
    <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">

    <!-- Table datatable css -->
        <link href="{{asset('public/assets/libs/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('public/assets/libs/datatables/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('public/assets/libs/datatables/fixedHeader.bootstrap4.min.html')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('public/assets/libs/datatables/responsive.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('public/assets/libs/datatables/scroller.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
 
  
</head>
<body>
  
       <div id="wrapper">
    
                        @guest
                           
                        
                        @else
                         <!-- Topbar Start -->
            <div class="navbar-custom">
                <ul class="list-unstyled topnav-menu float-right mb-0">

                    <li class="dropdown d-none d-lg-block">
                        <a class="nav-link dropdown-toggle mr-0 waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                            <img src="public/assets/images/flags/us.jpg" alt="user-image" class="mr-2" height="12"> <span class="align-middle">English <i class="mdi mdi-chevron-down"></i> </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <img src="public/assets/images/flags/germany.jpg" alt="user-image" class="mr-2" height="12"> <span class="align-middle">German</span>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <img src="public/assets/images/flags/italy.jpg" alt="user-image" class="mr-2" height="12"> <span class="align-middle">Italian</span>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <img src="public/assets/images/flags/spain.jpg" alt="user-image" class="mr-2" height="12"> <span class="align-middle">Spanish</span>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <img src="public/assets/images/flags/russia.jpg" alt="user-image" class="mr-2" height="12"> <span class="align-middle">Russian</span>
                            </a>
                        </div>
                    </li>

                    <li class="dropdown notification-list d-none d-md-inline-block">
                        <a href="#" id="btn-fullscreen" class="nav-link waves-effect waves-light">
                            <i class="mdi mdi-crop-free noti-icon"></i>
                        </a>
                    </li>

                    <li class="dropdown notification-list">
                        <a class="nav-link dropdown-toggle  waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                            <i class="mdi mdi-bell noti-icon"></i>
                            <span class="badge badge-danger rounded-circle noti-icon-badge">3</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-lg">

                            <!-- item-->
                            <div class="dropdown-item noti-title">
                                <h5 class="font-16 m-0">
                                    <span class="float-right">
                                        <a href="#" class="text-dark">
                                            <small>Clear All</small>
                                        </a>
                                    </span>Notification
                                </h5>
                            </div>

                            <div class="slimscroll noti-scroll">
                    
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <div class="notify-icon">
                                        <i class="fa fa-user-plus text-info"></i>
                                    </div>
                                    <p class="notify-details">New user registered
                                        <small class="noti-time">You have 10 unread messages</small>
                                    </p>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <div class="notify-icon text-success">
                                        <i class="far fa-gem text-primary"></i>
                                    </div>
                                    <p class="notify-details">New settings
                                        <small class="noti-time">There are new settings available</small>
                                    </p>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <div class="notify-icon text-danger">
                                        <i class="far fa-bell text-danger"></i>
                                    </div>
                                    <p class="notify-details">Updates
                                        <small class="noti-time">There are 2 new updates available</small>
                                    </p>
                                </a>
                            </div>

                            <!-- All-->
                            <a href="javascript:void(0);" class="dropdown-item text-center notify-item notify-all">
                                    See all notifications
                            </a>

                        </div>
                    </li>

                    <li class="dropdown notification-list">
                        <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                            <img src="public/assets/images/users/avatar-1.jpg" alt="user-image" class="rounded-circle">
                        </a>
                        <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                            <!-- item-->
                            <div class="dropdown-header noti-title">
                                <h6 class="text-overflow m-0">Welcome !</h6>
                            </div>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="mdi mdi-face-profile"></i>
                                <span>Profile</span>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="mdi mdi-settings"></i>
                                <span>Settings</span>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="mdi mdi-lock"></i>
                                <span>Lock Screen</span>
                            </a>

                       

                            <!-- item-->
                           <!--  <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="mdi mdi-power-settings"></i>
                                <span>Logout</span>
                            </a> -->
                          
                          
                         
                                 <a class="dropdown-item notify-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                       <!--  <span><i class="mdi mdi-power-settings"></i>{{ __('Logout') }}</span> -->
                                         <span><i class="mdi mdi-power-settings"></i>{{ __('Logout') }}</span>
                                    </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="">
                                   <!--  <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a> -->

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                                     <div class="dropdown-divider"></div>
                            </div>
                        </li>
                       
                  
                   

                    <li class="dropdown notification-list">
                        <a href="javascript:void(0);" class="nav-link right-bar-toggle waves-effect waves-light">
                            <i class="mdi mdi-settings-outline noti-icon"></i>
                        </a>
                    </li>


                </ul>

                <!-- LOGO -->
                <div class="logo-box">
                        <a href="index.html" class="logo text-center logo-dark">
                            <span class="logo-lg">
                                <img src="public/assets/images/logo-dark.png" alt="" height="16">
                                <!-- <span class="logo-lg-text-dark">Moltran</span> -->
                            </span>
                            <span class="logo-sm">
                                <!-- <span class="logo-lg-text-dark">M</span> -->
                                <img src="public/assets/images/logo-sm.png" alt="" height="25">
                            </span>
                        </a>

                        <a href="index.html" class="logo text-center logo-light">
                            <span class="logo-lg">
                                <img src="public/assets/images/logo-light.png" alt="" height="16">
                                <!-- <span class="logo-lg-text-dark">Moltran</span> -->
                            </span>
                            <span class="logo-sm">
                                <!-- <span class="logo-lg-text-dark">M</span> -->
                                <img src="public/assets/images/logo-sm.png" alt="" height="25">
                            </span>
                        </a>
                    </div>

                <!-- LOGO -->
  

                <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
                    <li>
                        <button class="button-menu-mobile waves-effect waves-light">
                            <i class="mdi mdi-menu"></i>
                        </button>
                    </li>
        
                    <li class="d-none d-sm-block">
                        <form class="app-search">
                            <div class="app-search-box">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search...">
                                    <div class="input-group-append">
                                        <button class="btn" type="submit">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </li>
                </ul>
            </div>
            <!-- end Topbar -->
            
            <!-- ========== Left Sidebar Start ========== -->
            <div class="left-side-menu">

                    <div class="slimscroll-menu">
    
                        <!--- Sidemenu -->
                        <div id="sidebar-menu">
    
                            <div class="user-box">
                    
                                <div class="float-left">
                                    <img src="public/assets/images/users/avatar-1.jpg" alt="" class="avatar-md rounded-circle">
                                </div>
                                <div class="user-info">
                                    <div class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                John Doe <i class="mdi mdi-chevron-down"></i>
                                                        </a>
                                        <ul class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 29px, 0px); top: 0px; left: 0px; will-change: transform;">
                                            <li><a href="javascript:void(0)" class="dropdown-item"><i class="mdi mdi-face-profile mr-2"></i> Profile<div class="ripple-wrapper"></div></a></li>
                                            <li><a href="javascript:void(0)" class="dropdown-item"><i class="mdi mdi-settings mr-2"></i> Settings</a></li>
                                            <li><a href="javascript:void(0)" class="dropdown-item"><i class="mdi mdi-lock mr-2"></i> Lock screen</a></li>
                                            <li>

                                                <!-- <a href="javascript:void(0)" class="dropdown-item"><i class="mdi mdi-power-settings mr-2"></i> Logout</a> -->
                                             
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <span><i class="mdi mdi-power-settings"></i>{{ __('Logout') }}</span>
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                       

                                            </li>
                                        </ul>
                                    </div>
                                    <p class="font-13 text-muted m-0">Administrator</p>
                                </div>
                            </div>
    
                            <ul class="metismenu" id="side-menu">
    
                                <li>
                                    <a href="{{route('home')}}" class="waves-effect">
                                        <i class="mdi mdi-home"></i>
                                        <span> Dashboard </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route('pos')}}" class="waves-effect">
                                        <i class="mdi mdi-home"></i>
                                        <span class="text-primary"><strong> POS</strong> </span>
                                    </a>
                                </li>
    
                                <li>
                                    <a href="javascript: void(0);" class="waves-effect">
                                        <i class="fas fa-users"></i>
                                        <span> Employees </span>
                                        <span class="menu-arrow"></span>
                                    </a>
                                    <ul class="nav-second-level" aria-expanded="false">
                                        <li><a href="{{route('add.employee')}}">Add Employee</a></li>

                                         <li><a href="{{route('all.employee')}}">All Employee</a></li>
                                      
                                       
                                    </ul>
                                </li>
    
                               
    
                                <li>
                                    <a href="javascript: void(0);" class="waves-effect">
                                        <i class="mdi mdi-palette"></i>
                                        <span> Customer </span>
                                        <span class="menu-arrow"></span>
                                    </a>
                                    <ul class="nav-second-level" aria-expanded="false">
                                        <li><a href="{{route('add.customer')}}">Add Customers</a></li>

                                        <li><a href="{{route('all.customer')}}">All Customer</a></li>
                                        
                                    </ul>
                                </li>




                                <li>
                                    <a href="javascript: void(0);" class="waves-effect">
                                        <i class="mdi mdi-palette"></i>
                                        <span> supplier </span>
                                        <span class="menu-arrow"></span>
                                    </a>
                                    <ul class="nav-second-level" aria-expanded="false">
                                        <li><a href="{{route('add.supplier')}}">Add Supplier</a></li>

                                        <li><a href="{{route('all.supplier')}}">All supplier</a></li>
                                        
                                    </ul>
                                </li>
                                <li>
                                    <a href="javascript: void(0);" class="waves-effect">
                                        <i class="mdi mdi-palette"></i>
                                        <span> Salary(EMP) </span>
                                        <span class="menu-arrow"></span>
                                    </a>
                                    <ul class="nav-second-level" aria-expanded="false">
                                        <li><a href="{{route('add.salary')}}">Add advanced Salary</a></li>

                                        <li><a href="{{route('all.advancedsalary')}}">All Advanced Salary</a></li>

                                         <li><a href="{{route('pay.salary')}}">Pay Salary</a></li>
                                          <li><a href="{{route('pay.salary')}}">Last Month salary</a></li>
                                        
                                    </ul>
                                </li>
                                <li>
                                    <a href="javascript: void(0);" class="waves-effect">
                                        <i class="mdi mdi-palette"></i>
                                        <span> Category </span>
                                        <span class="menu-arrow"></span>
                                    </a>
                                    <ul class="nav-second-level" aria-expanded="false">
                                       
                                       
                                         <li><a href="{{route('add.category')}}">Add Category</a></li>
                                          <li><a href="{{route('all.category')}}">All category</a></li>
                                        
                                    </ul>
                                </li>

                                 <li>
                                    <a href="javascript: void(0);" class="waves-effect">
                                        <i class="mdi mdi-palette"></i>
                                        <span> Product </span>
                                        <span class="menu-arrow"></span>
                                    </a>
                                    <ul class="nav-second-level" aria-expanded="false">
                                       
                                       
                                         <li><a href="{{route('add.product')}}">Add prduct</a></li>
                                          <li><a href="{{route('all.product')}}">All Product</a></li>
                                            <li><a href="{{route('import.product')}}">Import Product</a></li>
                                        
                                    </ul>
                                </li>

                                <li>
                                    <a href="javascript: void(0);" class="waves-effect">
                                        <i class="mdi mdi-palette"></i>
                                        <span> Expense </span>
                                        <span class="menu-arrow"></span>
                                    </a>
                                    <ul class="nav-second-level" aria-expanded="false">
                                       
                                       
                                         <li><a href="{{route('add.expense')}}">Add New</a></li>
                                          <li><a href="{{route('todays.expense')}}">Todays Expense</a></li>
                                           <li><a href="{{route('month.expense')}}">Monthly Expense</a></li>
                                           <li><a href="{{route('yearly.expense')}}">Yearly Expense</a></li>
                                        
                                    </ul>
                                </li>
                                     <li>
                                    <a href="javascript: void(0);" class="waves-effect">
                                        <i class="mdi mdi-palette"></i>
                                        <span> Sales Report </span>
                                        <span class="menu-arrow"></span>
                                    </a>
                                    <ul class="nav-second-level" aria-expanded="false">
                                       
                                       
                                         <li><a href="{{route('add.expense')}}">First</a></li>
                                          <li><a href="{{route('todays.expense')}}">Second</a></li>
                                          
                                        
                                    </ul>
                                </li>
                                <li>
                                    <a href="javascript: void(0);" class="waves-effect">
                                        <i class="mdi mdi-palette"></i>
                                        <span> Attendence </span>
                                        <span class="menu-arrow"></span>
                                    </a>
                                    <ul class="nav-second-level" aria-expanded="false">
                                       
                                       
                                         <li><a href="{{route('take.attendence')}}">Take Attendence</a></li>
                                          <li><a href="{{route('all.attendence')}}">All Attendence</a></li>
                                         <li><a href="{{route('monthly.attendence')}}">Monthly Attendence</a></li>
                                          
                                        
                                    </ul>
                                </li>

                                 <li>
                                    <a href="javascript: void(0);" class="waves-effect">
                                        <i class="mdi mdi-palette"></i>
                                        <span> Setting </span>
                                        <span class="menu-arrow"></span>
                                    </a>
                                    <ul class="nav-second-level" aria-expanded="false">
                                         <li><a href="{{route('website-setting')}}">Setting</a></li>
                                         
                                          
                                        
                                    </ul>
                                </li>
    
    
    
                                    </ul>
                            <!--     </li>
                            </ul> -->
    
                        </div>
                        <!-- End Sidebar -->
    
                        <div class="clearfix"></div>
    
                    </div>
                    <!-- Sidebar -left -->
    
                </div>
                <!-- Left Sidebar End -->
                        @endguest
                   
               <!--  </div> -->
       
        <main class="py-4">
            @yield('content')
        </main>
    </div>
       <!-- Footer Start -->
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                2016 - 2020 &copy; Moltran theme by <a href="#">Bipul Hosen</a>
                            </div>
                        </div>
                    </div>
                </footer>
                <!-- end Footer -->

   <!-- Vendor js -->
        <script src="{{asset('public/assets/js/vendor.min.js')}}"></script>

        <script src="{{asset('public/assets/libs/moment/moment.min.js')}}"></script>
        <script src="{{asset('public/assets/libs/jquery-scrollto/jquery.scrollTo.min.js')}}"></script>
        <script src="{{asset('public/assets/libs/sweetalert2/sweetalert2.min.js')}}"></script>
        
        <!-- Chat app -->
        <script src="{{asset('public/assets/js/pages/jquery.chat.js')}}"></script>

        <!-- Todo app -->
        <script src="{{asset('public/assets/js/pages/jquery.todo.js')}}"></script>

        <!-- flot chart -->
        <script src="{{asset('public/assets/libs/flot-charts/jquery.flot.js')}}"></script>
        <script src="{{asset('public/assets/libs/flot-charts/jquery.flot.time.js')}}"></script>
        <script src="{{asset('public/assets/libs/flot-charts/jquery.flot.tooltip.min.js')}}"></script>
        <script src="{{asset('public/assets/libs/flot-charts/jquery.flot.resize.js')}}"></script>
        <script src="{{asset('public/assets/libs/flot-charts/jquery.flot.pie.js')}}"></script>
        <script src="{{asset('public/assets/libs/flot-charts/jquery.flot.selection.js')}}"></script>
        <script src="{{asset('public/assets/libs/flot-charts/jquery.flot.stack.js')}}"></script>
        <script src="{{asset('public/assets/libs/flot-charts/jquery.flot.crosshair.js')}}"></script>

        <!-- Dashboard init JS -->
        <script src="{{asset('public/assets/js/pages/dashboard.init.js')}}"></script>

        <!-- App js -->
        <script src="{{asset('public/assets/js/app.min.js')}}"></script>

         <!--for toaster notification-->
            
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
        <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
        <!--for sweat alert-->
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


  <!-- Vendor js -->
       <!--  <script src="{{asset('public/assets/js/vendor.min.js')}}"></script> -->

        <!-- third party js -->
        <script src="{{asset('public/assets/libs/datatables/jquery.dataTables.min.js')}}"></script>

        <script src="{{asset('public/assets/libs/datatables/dataTables.bootstrap4.min.js')}}"></script>

        <script src="{{asset('public/assets/libs/datatables/dataTables.responsive.min.js')}}"></script>

        <!-- <script src="{{asset('public/assets/libs/datatables/responsive.bootstrap4.min.js')}}"></script> -->
<!-- 
        <script src="{{asset('public/assets/libs/datatables/dataTables.buttons.min.js')}}"></script>
        <script src="{{asset('public/assets/libs/datatables/buttons.bootstrap4.min.js')}}"></script>

        <script src="{{asset('public/assets/libs/jszip/jszip.min.js')}}"></script>
        <script src="{{asset('public/assets/libs/pdfmake/pdfmake.min.js')}}"></script>
        <script src="{{asset('public/assets/libs/pdfmake/vfs_fonts.js')}}"></script>

        <script src="{{asset('public/assets/libs/datatables/buttons.html5.min.js')}}"></script>
        <script src="{{asset('public/assets/libs/datatables/buttons.print.min.js')}}"></script>

        <script src="{{asset('public/assets/libs/datatables/dataTables.fixedHeader.min.html')}}"></script>
        <script src="{{asset('public/assets/libs/datatables/dataTables.keyTable.min.js')}}"></script>
        <script src="{{asset('public/assets/libs/datatables/dataTables.scroller.min.js')}}"></script>  -->

        <!-- Datatables init -->
        <script src="{{asset('public/assets/js/pages/datatables.init.js')}}"></script>

 <script>

         
@if(Session::has('message'))
       

var type="{{Session::get('alert-type','info')}}"
switch(type){
 case 'info':
 toastr.info("{{Session::get('message')}}");
 break;
 case 'warning':
 toastr.warning("{{Session::get('message')}}");
 break;
 case 'error':
 toastr.error("{{Session::get('message')}}");
 break;
 case 'success':
 toastr.success("{{Session::get('message')}}");
 break;


}
@endif

     
    
    </script>

        <script>
      $(document).on("click","#delete",function(e)
          {
       
     
        e.preventDefault();
       var link=$(this).attr("href");
        //alert(link);
        swal({
           title: "Are you sure?",
           text: "Once deleted, you will not be able to recover this imaginary file!",
           icon: "warning",
           buttons: true,
           dangerMode: true,
 })
         .then((willDelete) => {
           if (willDelete) {

             swal("Poof! Your imaginary file has been deleted!", {
               icon: "success",
             });
             window.location.href=link;
           } else {
             swal("Your imaginary file is safe!");
           }
 });







    });
    
    </script>
</body>
</html>
