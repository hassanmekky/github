<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>AdminLTE 2 | Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.4 -->
    <link rel="stylesheet" href="{{url('panel/bootstrap/css/bootstrap.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons 2.0.0 -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{url('panel/dist/css/AdminLTE.min.css')}}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{url('panel/dist/css/skins/_all-skins.min.css')}}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{url('panel/plugins/iCheck/flat/blue.css')}}">
    <!-- Morris chart -->
    <link rel="stylesheet" href="{{url('panel/plugins/morris/morris.css')}}">
    <!-- jvectormap -->
    <link rel="stylesheet" href="{{url('panel/plugins/jvectormap/jquery-jvectormap-1.2.2.css')}}">
    <!-- Date Picker -->
    <link rel="stylesheet" href="{{url('panel/plugins/datepicker/datepicker3.css')}}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{url('panel/plugins/daterangepicker/daterangepicker-bs3.css')}}">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="{{url('panel/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">

    <link rel="stylesheet" href="{{url('panel/dist/fonts/fonts-fa.css')}}">
    <link rel="stylesheet" href="{{url('panel/dist/css/bootstrap-rtl.min.css')}}">
    <link rel="stylesheet" href="{{url('ui')}}/css/style.css"  type="text/css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="skin-blue sidebar-mini">
    <div class="wrapper">

      <header class="main-header">
        <!-- Logo -->
        <a href="index2.html" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>A</b>LT</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Admin</b>LTE</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
              <li class="dropdown messages-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-envelope-o"></i>
                  <span class="label label-success">0</span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">You have 0 messages</li>
                  <li>
                    <!-- inner menu: contains the actual data -->
                    <ul class="menu">
                      <li><!-- start message -->
                        <a href="#">
                          <h4>
                            Support Team
                            <small><i class="fa fa-clock-o"></i> 5 mins</small>
                          </h4>
                          <p>Why not buy a new awesome theme?</p>
                        </a>
                      </li><!-- end message -->
                    </ul>
                  </li>
                  <li class="footer"><a href="#">See All Messages</a></li>
                </ul>
              </li>
              <!-- Notifications: style can be found in dropdown.less -->
              <li class="dropdown notifications-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-bell-o"></i>
                  <span class="label label-warning">{{ count(Auth::guard('admin')->user()->unreadNotifications) }}</span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">You have {{ count(Auth::guard('admin')->user()->unreadNotifications) }} notifications</li>
                  <li>
                    <!-- inner menu: contains the actual data -->
                    <ul class="menu">
                      @foreach(Auth::guard('admin')->user()->notifications as $noti)
                      <li>
                         {!! $noti->data['data'] !!}
                         {{  $noti->markAsRead() }}
                        
                      </li>
                      @endforeach
                    </ul>
                  </li>
                  <li class="footer"><a href="#">View all</a></li>
                </ul>
              </li>
              
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="{{url('panel/dist/img/user2-160x160.jpg')}}" class="user-image" alt="User Image">
                  <span class="hidden-xs">{{  Auth::guard('admin')->user()->name }}</span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="{{url('panel/dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
                    <p>
                     {{  Auth::guard('admin')->user()->name }}
                      <small>Member since {{ Auth::guard('admin')->user()->created_at }}</small>
                    </p>
                  </li>
                  <!-- Menu Body -->
                  <li class="user-body">
                    <div class="col-xs-4 text-center">
                      <a href="#">Followers</a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#">Sales</a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#">Friends</a>
                    </div>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-right">
                      <a href="#" class="btn btn-default btn-flat">Profile</a>
                    </div>
                    <div class="pull-left">
                      <a href="{{url('admin/logout')}}" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
              <!-- Control Sidebar Toggle Button -->
              <li>
                <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-right image">
              <img src="{{url('panel/dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p>{{  Auth::guard('admin')->user()->name }}</p>
              <a href="#"><i class="fa fa-circle text-success"></i> آنلاین</a>
            </div>
          </div>
          <!-- search form -->
          <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="أبحث ...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="active treeview">
              <a href="#">
                <i class="fa fa-dashboard"></i> <span>الرئيسية</span> <i class="fa fa-angle-left pull-left"></i>
              </a>
              <ul class="treeview-menu">
                 <li class="active"><a href="{{url('admin')}}"><i class="fa fa-circle-o"></i>Dashboard</a></li>
                 <li><a href="{{url('admin/courses')}}"><i class="fa fa-circle-o"></i>الكورسات</a></li>
                <li><a href="{{url('admin/categories')}}"><i class="fa fa-circle-o"></i>الاقسام</a></li>
                 <li><a href="{{url('admin/teachers')}}"><i class="fa fa-circle-o"></i>المدربين</a></li>
                <li><a href="{{url('admin/users')}}"><i class="fa fa-circle-o"></i>المستخدمين</a></li>
                <li><a href="{{url('admin/certificates')}}"><i class="fa fa-circle-o"></i>الشهادات</a></li>
                <li><a href="{{url('admin/exams')}}"><i class="fa fa-circle-o"></i>الامتحانات</a></li>
              </ul>
              <a href="#">
                <i class="fa fa-dashboard"></i> <span>الصفحات</span> <i class="fa fa-angle-left pull-left"></i>
              </a>
              <ul class="treeview-menu">
                 <li class="active"><a href="{{ url('admin/testmonials') }}"><i class="fa fa-circle-o"></i>قالوا عنا</a></li>
                 <li><a href="{{url('admin/contact')}}"><i class="fa fa-circle-o"></i>اتصل بنا</a></li>
                <li><a href="{{url('admin/about')}}"><i class="fa fa-circle-o"></i>من نحن</a></li>
                 <li><a href="{{url('admin/faquestions')}}"><i class="fa fa-circle-o"></i>الاسئلة الشائعة</a></li>
              </ul>
              <a href="#">
                <i class="fa fa-dashboard"></i> <span>الضبط</span> <i class="fa fa-angle-left pull-left"></i>
              </a>
              <ul class="treeview-menu">
                 <li class="active"><a href="{{ url('admin/settings') }}"><i class="fa fa-circle-o"></i>عام</a></li>
                 <li><a href="{{ url('admin/social') }}"><i class="fa fa-circle-o"></i>وسائل التواصل الاجتماعي</a></li>
                {{-- <li><a href="{{url('admin/about')}}"><i class="fa fa-circle-o"></i>من نحن</a></li>
                 <li><a href="{{url('admin/faquestions')}}"><i class="fa fa-circle-o"></i>الاسئلة الشائعة</a></li> --}}
              </ul>
            </li>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>
   


      <!-- Content Wrapper. Contains page content -->
    
    @include(app('adthem').'.errors')  

    @if($flash = session('message'))

        <div id="admin-flash-message" class="alert alert-success" role="alert">
            {{ $flash }}
        </div>

    @endif


    @yield('content')  



     </div>

    <!-- jQuery 2.1.4 -->
    <script src="{{url('panel/plugins/jQuery/jQuery-2.1.4.min.js')}}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <!-- Bootstrap 3.3.4 -->
    <script src="{{url('panel/bootstrap/js/bootstrap.min.js')}}"></script>
    <!-- Morris.js charts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="{{url('panel/plugins/morris/morris.min.js')}}"></script>
    <!-- Sparkline -->
    <script src="{{url('panel/plugins/sparkline/jquery.sparkline.min.js')}}"></script>
    <!-- jvectormap -->
    <script src="{{url('panel/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
    <script src="{{url('panel/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{url('panel/plugins/knob/jquery.knob.js')}}"></script>
    <!-- daterangepicker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
    <script src="{{url('panel/plugins/daterangepicker/daterangepicker.js')}}"></script>
    <!-- datepicker -->
    <script src="{{url('panel/plugins/datepicker/bootstrap-datepicker.js')}}"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="{{url('panel/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
    <!-- Slimscroll -->
    <script src="{{url('panel/plugins/slimScroll/jquery.slimscroll.min.js')}}"></script>
    <!-- FastClick -->
    <script src="{{url('panel/plugins/fastclick/fastclick.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{url('panel/dist/js/app.min.js')}}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{url('panel/dist/js/pages/dashboard.js')}}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{url('panel/dist/js/demo.js')}}"></script>
    
    

  </body>
</html>
