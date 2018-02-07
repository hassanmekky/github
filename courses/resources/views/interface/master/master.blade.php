<!DOCTYPE html>
<!--[if IE 8]><html class="ie8 ie-all" lang="en-US" prefix="og: http://ogp.me/ns#"> <![endif]-->
<!--[if IE 9]><html class="ie9 ie-all" lang="en-US" prefix="og: http://ogp.me/ns#"> <![endif]-->
<!--[if IE 10]><html class="ie10 ie-all" lang="en-US" prefix="og: http://ogp.me/ns#"> <![endif]-->
<!--[if !IE]><!-->
<!--<![endif]-->
<html>

<head>
    @foreach($settings as $setting)
    <title>{{ $setting->site_name }}</title>
    @endforeach
    <meta name="author" content="Amir Nageh">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name=viewport content="width=device-width, initial-scale=1">
    <meta charset="utf-8">

    <!-- Css Files -->
    <link href="{{url('ui')}}/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="{{url('ui')}}/css/animate.css" rel="stylesheet" type="text/css">
    <link href="{{url('ui')}}/css/font-awesome.css" rel="stylesheet" type="text/css">
    <link href="{{url('ui')}}/css/owl.carousel.css" rel="stylesheet" type="text/css">
    <link href="{{url('ui')}}/css/owl.theme.css" rel="stylesheet" type="text/css">
    <link href="{{url('ui')}}/css/selectric.css" rel="stylesheet" type="text/css">
    <link href="{{url('ui')}}/css/style.css" rel="stylesheet" type="text/css">
    <link href="{{url('ui')}}/css/reset.css" rel="stylesheet" type="text/css">
    <link href="{{url('ui')}}/images/favicon.png" rel="icon" type="text/css">

</head>

<body>

    <!-- start the loading screen -->
    <div class="wrap">
        <div class="loading">
            <div class="bounceball"></div>
            <div class="text">NOW LOADING</div>
        </div>
    </div>

    <!-- end the loading screen -->

    <div class="wrapper st-container" id="st-container">
        <!-- content push wrapper -->
        <div class="st-pusher">

            <nav class="st-menu st-effect-8" id="menu-8">
                <h2 class="icon icon-stack">
                    @foreach($settings as $setting)
                    <img src="{{ url('/basics/logo/'.$setting->logo) }}" class="img-responsive">
                    @endforeach
                </h2>
                <ul>
                    <li><a class="icon icon-data" href="{{ url('/') }}"><i class="fa fa-user"></i> الرئيسية</a></li>
                    @if(Auth::guard('web')->check())
                        <li><a class="icon icon-data" href="{{ url('/profile') }}"><i class="fa fa-user"></i> الملف الشخصي</a></li>
                        <li><a id="sd" class="icon icon-location" href="#"><i class="fa fa-lock"></i> كلمة المرور</a></li>
                    @endif
                    <li>
                        <a class="icon icon-data" href="{{ url('/allcourses') }}"><i class="fa fa-database"></i>جميع الدورات</a>
                    </li>
                    <li>
                        <a class="icon icon-location" href="{{ url('/allcourses') }}"><i class="fa fa-rocket"></i>قسم معين</a>
                    </li>
                    <li><a class="icon icon-photo" href="{{ url('/contact') }}"><i class="fa fa-phone"></i>اتصل بنا</a></li>
                    <li>
                        <a class="icon icon-location" href="{{ url('/signup') }}"><i class="fa fa-user-plus"></i>تسجيل حساب جديد</a>
                    </li>
                    <li><a class="icon icon-photo" href="{{ url('/privacy') }}"><i class="fa fa-lock"></i>سياسة الخصوصية</a></li>
                    <li><a id="sd" class="icon icon-location" href="{{ url('/about') }}"><i class="fa fa-group"></i>من نحن</a></li>

                </ul>
            </nav>
            <div class="st-content">
                <div class="dividers">
                    <span class="t1"></span>
                    <span class="t2"></span>
                    <span class="t3"></span>
                    <span class="t4"></span>
                    <span class="t5"></span>
                    <span class="t1"></span>
                    <span class="t2"></span>
                    <span class="t3"></span>
                    <span class="t4"></span>
                    <span class="t5"></span>
                </div>
                <!-- /.dividers -->
                
                <div id="st-trigger-effects" class="column">

                    <button data-effect="st-effect-8" class="st_show">
                        <i class="fa fa-bars"></i>
                    </button>
                </div>

                <header>

                    
                    <div class="error-detect">
                        <div class="container">
                            <div class="error text-center">
                                <h1 class="danger-l">اي كلام اي كلام اي كلام يا حسني اي كلام يا حسني اي كلام</h1>
                                <h1 class="message-l">اي كلام اي كلام اي كلام يا حسني اي كلام يا حسني اي كلام</h1>
                                <h1 class="success-l">اي كلام اي كلام اي كلام يا حسني اي كلام يا حسني اي كلام</h1>
                            </div>
                            <!-- /.error-danger -->
                        </div>
                        <!-- /.container -->
                    </div>
                    <!-- /.error-detect -->

                    <div class="login-area">
                        <div class="container">
                            <div class="login-form col-md-6 col-xs-12 text-right pull-right">
                                <form action="{{ url('/login') }}" method="post">
                                    {{ csrf_field() }}
                                    <h1>تسجيل الدخول</h1>
                                    <div class="login-item">
                                        <input type="email" name="email" placeholder="إسم المستخدم">
                                    </div>
                                    <!-- /.login-item -->
                                    <div class="login-item">
                                        <input type="password" name="password" placeholder="كلمة السر">
                                    </div>
                                    <!-- /.login-item -->
                                    <div class="login-item">
                                        <label class="pull-right">
                                            <input type="checkbox" name="remember" value="yes">
                                            <span>تذكر كلمة السر دائماً</span>
                                        </label>
                                        <label class="pull-left">
                                            <a href="#" class="forget">هل نسيت كلمة المرور ؟</a>
                                        </label>
                                    </div>
                                    <!-- /.login-item -->
                                    <div class="login-item">
                                        <input type="submit" value="دخول">
                                    </div>
                                </form>
                                <div>
                                    @if (count($errors) > 0)
                                    <div class="alert alert-danger">

                                        <strong>Whoops!</strong> There were some problems with your input.<br><br>

                                        <ul>

                                            @foreach ($errors->all() as $error)

                                                <li>{{ $error }}</li>

                                            @endforeach

                                        </ul>

                                    </div>
                                    @endif
                                </div>
                                <!-- /.login-item -->
                            </div>
                            <!-- /.login-form -->

                            <div class="signup-form col-md-6 col-xs-12 text-right">
                                <h1>تسجيل عضوية جديدة</h1>
                                <p>اذا كنت مستخدم جديد لموقعنا فيمكنك ان تتصفح معظم الكورسات الموجودة الان امامك ولكن لن تستطيع الحصول علي معلومات الكورس او الاشتراك به الا اذا كنت تمتلك حساب لدينا لذلك تستطيع تسجيل حساب جديد من هنا </p>
                                <a href="{{url('/signup')}}">
                                    <i class="fa fa-user-plus"></i> تسجيل عضوية
                                </a>
                            </div>
                            <!-- /.signup-form -->

                            <!-- =========================================================================================================================================== -->

                            <div class="panel-pop modal" id="forget">
                                <div class="lost-inner">
                                    <h1>هل نسيت كلمة المرور ؟</h1>
                                    <div class="lost-item">
                                        <input type="text" placeholder="الايميل المستخدم في تسجيل الدخول">
                                    </div>
                                    <!-- /.lost-item -->
                                    <div class="text-center">
                                        <input type="submit" value="إعادة ضبط">
                                    </div>
                                    <!-- /.lost-item -->
                                </div>
                                <!-- /.lost-inner -->
                            </div>
                            <!-- /.modal -->

                            <!-- =========================================================================================================================================== -->

                         </div>
                        <!-- /.container -->
                    </div>
                    <!-- /.login-area -->


                    <div class="header-nav">
                        <div class="container">
                            <div class="nav-right col-md-8 col-xs-12 pull-right">
                                <div class="logo">
                                    <a href="{{ url('/') }}" title="العلوم العصرية للتدريب">
                                        @foreach($settings as $setting)
                                        <img src="{{url('/basics/logo/'.$setting->logo)}}" alt="site-logo" width="110" height="70">
                                        @endforeach
                                    </a>
                                </div>
                                <!-- /.logo -->
                            </div>
                            <!-- /.nav-logo -->

                             @if(Auth::guard('web')->check())

                            <div class="nav-left hidden-nav col-md-4 col-xs-12 pull-left">
                                <div class="user-logged">
                                    <ul>
                                        <li>
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" class="hvr-underline-reveal">
                                                <span class="cont-img">
                                                    @if(Auth::guard('web')->user()->image == null)
                                                        <img src="{{url('ui')}}/images/s.png" alt="" width="35" height="35">
                                                    @else
                                                        <img src="upload/usersProfile/{{Auth::guard('web')->user()->image}}" alt="" width="35" height="35">
                                                    @endif
                                                </span>
                                                <b>{{  Auth::guard('web')->user()->name }}</b>
                                                <i class="fa fa-caret-down"></i>
                                            </a>
                                            <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu">
                                                <div class="drop drop-links col-xs-12">
                                                    <div class="drop-links">
                                                        <ul>
                                                            <li>
                                                                <a href="/profile">
                                                                    <i class="fa fa-user"></i>&nbsp; حسابي
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="/logout">
                                                                    <i class="fa fa-power-off"></i>&nbsp; خروج
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <!-- end drop-links -->
                                                </div>
                                                <!-- end drop -->
                                            </ul>
                                        </li>

                                         <li>
                                    <a href="#" class="show-user_search">
                                        <i class="fa fa-search"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="show-notification notificationDown" class="dropdown-toggle" data-toggle="dropdown">
                                        <span id="count" class="padge">{{ count(Auth::guard('web')->user()->unreadNotifications) }}</span>
                                        <i class="fa fa-bell"></i>
                                    </a>
                                    <ul class="dropdown-menu notification-box " role="menu" aria-labelledby="dropdownMenu">
                                        <div class="drop drop-links col-xs-12">
                                            <ul id="showNotifications">
                                                @foreach(Auth::guard('web')->user()->notifications as $noti)
                                                <li>
                                                    <a href="#" >
                                                        <img src="{{url('ui')}}/images/avatar5.png" alt="" class="img-circle pull-right">
                                                        <h4>
                                                           {!! $noti->data['user'] !!}
                                                            <small><i class="fa fa-clock-o"></i>5 دقائق</small>
                                                        </h4>
                                                        <p>{!! $noti->data['data'] !!}</p>
                                                        
                                                    </a>
                                                </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        <!-- end drop -->
                                    </ul>
                                </li>

                                    </ul>
                                </div>
                                <!-- /.user-controls -->
                            </div>

                            @else

                            <div class="nav-left col-md-4 col-xs-12 pull-left">
                                <div class="user-controls">
                                    <ul>
                                        <li>
                                            <a href="#" class="show-login">
                                                <i class="fa fa-user"></i> منطقة تسجيل الدخول
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <!-- /.user-controls -->
                            </div>

                            @endif
                            <!-- /.nav-user -->
                        </div>
                        <!-- /.container -->
                        <div class="input-container user-search col-md-12 col-xs-12 input-lft">
                            <div class="container">
                                <form action="{{ url('/search') }}" method="get">
                                    {{ csrf_field() }}
                                    <input type="text" name="searchtext" placeholder="ابحث عن جميع الكورسات من هنا">
                                    <button type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </form>
                            </div>
                            <!-- /.container -->
                        </div>
                    </div>

                   
                    <!-- /.header-nav -->
                </header>
                <!-- /header -->

                @if($flash = session('message'))

                    <div id="flash-message" class="alert alert-success" role="alert">
                        {{ $flash }}
                    </div>

                @endif

                @yield('content')


     

                <footer>
                    <div class="container">
                        <div class="footer-sub col-md-2 col-xs-12 text-center pull-right">
                            <ul>
                                <li
                                    <a href="#">من نحن</a>
                                </li>

                                <li>
                                    <a href="{{ url('/contact') }}">إتصل بنا</a>
                                </li>
                            </ul>
                        </div>
                        <!-- end footer-sub -->
                        <div class="copyrights col-md-8 col-xs-12 text-center pull-right">
                            <p>حميع الحقوق محفوظة لدي العلوم العصرية للتدريب</p>
                        </div>
                        <!-- /.copyrights -->
                        <div class="footer-links col-md-2 col-xs-12 pull-left text-center">
                            <ul>
                                @foreach(\App\Social::all() as $link)
                                <li>
                                    <a href="{{ $link->url_link }}" data-toggle="tooltip" data-placement="top" title="{{ $link->name }}">
                                        <i class="fa fa-{{$link->name}}-square"></i>
                                    </a>
                                </li>
                                @endforeach

                            </ul>
                        </div>
                        <!-- /.footer-links -->
                    </div>
                    <!-- /.container -->
                </footer>

            </div>
            <!-- /st-content -->
        </div>
    </div>
    <!-- /.wrapper -->

    <div class="toTop col-xs-12 text-center">
        <i class="fa fa-angle-up"></i>
    </div>
    <!-- /.toTop -->


    <!-- Javascript Files -->
    <script src="{{url('ui')}}/js/jquery-1.12.2.min.js" type="text/javascript"></script>
    <script src="{{url('ui')}}/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="{{url('ui')}}/js/html5shiv.min.js" type="text/javascript"></script>
    <script src="{{url('ui')}}/js/jquery-smoothscroll.js" type="text/javascript"></script>
    <script src="{{url('ui')}}/js/modernizr.min.js" type="text/javascript"></script>
    <script src="{{url('ui')}}/js/owl.carousel.min.js" type="text/javascript"></script>
    <script src="{{url('ui')}}/js/wow.min.js" type="text/javascript"></script>
    <script src="{{url('ui')}}/js/placeholdem.min.js" type="text/javascript"></script>
    <script src="{{url('ui')}}/js/toucheffects.js"></script>
    <script src="{{url('ui')}}/js/jquery.selectric.min.js" type="text/javascript"></script>
    <script src="{{url('ui')}}/js/jquery.bootstrap.wizard.min.js" type="text/javascript"></script>
    <script src="{{url('ui')}}/js/classie.js" type="text/javascript"></script>
    <script src="{{url('ui')}}/js/jquery.nicescroll.min.js" type="text/javascript"></script>
    <script src="{{url('ui')}}/js/script.js" type="text/javascript"></script>
    
    <script src="/StreamLab/StreamLab.js" type="text/javascript"></script>
    <script type="text/javascript">
        var message, showDiv = $('#showNotifications'),count=$('#count'),c;
        var slh = new StreamLabHtml()
        var sls = new StreamLabSocket({
           appId:"{{ config('stream_lab.app_id') }}",
           channelName:"wood",
           event:"*",
         });

        sls.socket.onmessage = function(res){
          ///res is data send from our api
          ///set this data to our class so you can use our helper function 
            slh.setData(res);


            if(slh.getSource() === 'messages')
            {
                c = parseInt(count.html());

                count.html(c+1);

                message = slh.getMessage();

                showDiv.prepend('<li><a href="#"><img src="" alt="" class="img-circle pull-right"><h4>المدرس<small><i class="fa fa-clock-o"></i>5 دقائق</small></h4><p>'+message+'</p></a></li>');
            }
         }

         $('.notificationDown').on('click',function(){

            count.html(0);

         });

         $.get('markAllSeen', function(){});
    </script>
    <script type="text/javascript">
        var myPlayer = videojs("example_video_1");

        $('#show-l10').click(function () {
            $('#l10').show();
            $('#example_video_1').hide();
            myPlayer.pause();
        });
    </script>
    <script type="text/javascript">
        $(':checkbox').checkboxpicker({
            onLabel: 'Right',
            offLabel: 'Wrong'
        });
    </script>
    <script type="text/javascript">
        $('#tabsleft').bootstrapWizard({
            'tabClass': 'nav nav-tabs',
            'debug': false,
            onTabShow: function (tab, navigation, index) {
                var $total = navigation.find('li').length;
                var $current = index + 1;
                var $percent = ($current / $total) * 100;
                $('#tabsleft .progress-bar').css({
                    width: $percent + '%'
                });

                // If it's the last tab then hide the last button and show the finish instead
                if ($current >= $total) {
                    $('#tabsleft').find('.pager .next').hide();
                    $('#tabsleft').find('.pager .finish').show();
                    $('#tabsleft').find('.pager .finish').removeClass('disabled');
                } else {
                    $('#tabsleft').find('.pager .next').show();
                    $('#tabsleft').find('.pager .finish').hide();
                }

            }
        });

        $('#tabsleft .finish').click(function () {
            alert('Finished!, Starting over!');
            $('#tabsleft').find("a[href*='tabsleft-tab1']").trigger('click');
        });
    </script>
    <script language="javascript" type="text/javascript">
        function printDiv(Certification) {
            var printContents = document.getElementById(Certification).innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;

            window.print();

            document.body.innerHTML = originalContents;
        }
    </script>
    
</body>

</html>