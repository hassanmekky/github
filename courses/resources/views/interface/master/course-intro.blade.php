@extends(app('design').'.master')


@section('content')
<div class="wrapper" >
<div class="intro-container">
            <div class="intro-head text-center">
                <div class="container">
                    <h1>{{ $course->course_name}}</h1>
                </div>
                <!-- /.container -->
            </div>
            <!-- /.intro-head -->
            <div class="intro-box">
                <div class="container">
                    <div class="intro-name text-right">
                        <div class="name-head col-md-7 col-xs-12 pull-right">
                            <h1>{{ $course->course_name}}</h1>
                        </div>
                        <div class="extras col-md-5 col-xs-12">
                            <span>{{ $course->course_price}}</span>
                            <div class="intro-rating">
                                <ul>
                                    @for($star = 1; $star <= 5; $star++ )
                                        @if( $courserate >= $star )
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-star active"></i>
                                            </a>
                                        </li>
                                        @else
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-star-o"></i>
                                            </a>
                                        </li>
                                        @endif
                                    @endfor
                                </ul>
                            </div>
                            <!-- end intro-rating -->
                        </div>
                    </div>
                    <!-- /.intro-name -->
                    <div class="intro-video col-xs-12 text-center">
                        <!--                        <iframe width="100%" height="520" src="https://www.youtube.com/embed/tTgD9m1p5Ss?list=PLT56sSeAKiIvfQhsA2lXUUmjfh0JyEFU7" frameborder="0" allowfullscreen></iframe>-->
                        <video id="example_video_1" class="video-js vjs-default-skin" controls="true" width="100%" height="520" poster="{{ url('ui') }}/images/3lom.jpg">
                            <source src="/courses/course/{{ $course->intro_video }}" type='video/mp4' />
                        </video>
                    </div>
                    <!-- /.intro-video -->
                    <div class="intro-date col-xs-12 text-right">
                        <h1>
            <i class="fa fa-calendar"></i>
            من : {{ $course->start_date }} إلى : {{ $course->end_date }}
        </h1>

                @if(Auth::guard('web')->check())

                        @if($course->users()->where('user_id',Auth::guard('web')->user()->id)->count() > 0 )
                            <a href="{{ url('/coursepage/'.$course->id) }}">الذهاب الى  للدورة</a>
                                    
                                    
                        @elseif( in_array($course->category()->find($course->category_id)->name, 
                            explode(' , ', Auth::guard('web')->user()->interests))


                            && in_array($course->user()->find($course->user_id)->gender, 
                            explode(' , ', Auth::guard('web')->user()->prefered_courses)) 

                            && in_array(Auth::guard('web')->user()->gender, 
                            explode(',', $course->exp_gender))

                            && Auth::guard('web')->user()->role == 'متدرب')

                                @if($course->course_price == 'مجاني')
                                <a href="{{ url($course->id . '/subscribe/' . Auth::guard('web')->user()->id) }}" >
                                    <i class="fa fa-paper-plane"></i> إشترك في الدورة
                                </a>
                                @else
                                    <a href="#" class="show-credit">
                                    <i class="fa fa-paper-plane"></i> إشترك في الدورة
                                </a>
                                @endif

                        @else

                                <a href="/profile">
                                    <i class="fa fa-cog"></i> عدل ملفك الشخصي لتستطيع الاشتراك في الدورة
                                </a>
                        @endif
                @else
                    <a href="{{ url('/signup') }}" >
                     <i class="fa fa-paper-plane"></i> إشترك في الدورة
                    </a>

                @endif
                    </div>
                    <!-- /.intro-date -->
                    <div class="intro-details text-right">
                        <p>{{ $course->description }}</p>
                    </div>
                    <!-- /.intro-details -->

                    <div class="intro-extra col-xs-12">
                        <div class="intro-instructor col-md-6 col-xs-12 text-right pull-left">
                            <div class="intro_instructor-inner">
                                <h1>عن المدرس</h1>
                                <div class="avatar text-center">
                                    <div class="av-inner">
                                        <img src="images/s.png" alt="" width="80" height="80">
                                    </div>
                                    <!-- /.av-inner -->
                                </div>
                                <!-- /.avatar -->
                                <div class="instructor-data">
                                    <a href="#" class="know-teacher" data-toggle="tooltip" data-placement="top" title="اضغط لمعرفة هوية المحاضر">{{ $course->user()->find($course->user_id)->name }}</a>
                                    <p>{{ $course->user()->find($course->user_id)->bio }} </p>
                                </div>
                                <!-- /.instructor-data -->
                            </div>
                            <!-- /.intro_instructor-inner -->
                        </div>
                        <!-- /.intro-instructor -->
                        <div class="intro-lec col-md-6 col-xs-12 text-right pull-right">
                            <div class="intro_lec-inner">
                                <h1>ماذا يحتوي هذا الكورس</h1>
                                <ol>
                                    @foreach($course->lesson as $lesson ) 
                                    <li>
                                        <i class="fa fa-play-circle"></i> {{ $lesson->lesson_name }}
                                    </li>
                                    @endforeach
                                </ol>
                            </div>
                            <!-- /.intro_lec-inner -->
                        </div>
                        <!-- /.intro-lec -->
                    </div>
                    <!-- /.intro-extra -->

                </div>
                <!-- /.container -->
            </div>
            <!-- /.intro-box -->
        </div>
        <!-- /.intro-container -->

        
    

    <div class="toTop col-xs-12 text-center">
        <i class="fa fa-angle-up"></i>
    </div>
    <!-- /.toTop -->

    <!-- =========================================================================================================================================== -->

    <div class="panel-pop modal" id="instructor">
        <div class="intro-instructor col-xs-12 text-right">
            <div class="intro_instructor-inner">
                <h1>عن المدرس</h1>
                <div class="avatar text-center">
                    <div class="av-inner">
                        <img src="images/s.png" alt="" width="80" height="80">
                    </div>
                    <!-- /.av-inner -->
                </div>
                <!-- /.avatar -->
                <div class="instructor-data">
                    <a>أمير ناجح الدسوقي</a>
                    <p>{{ $course->user()->find($course->user_id)->bio }}</p>
                </div>
                <!-- /.instructor-data -->
            </div>
            <!-- /.intro_instructor-inner -->
        </div>
        <!-- /.intro-instructor -->
    </div>
    <!-- /.modal -->

    <!-- =========================================================================================================================================== -->


    <div class="panel-pop modal" id="payment">
        <div>
            <h1>
                <i class="fa fa-shopping-cart"></i>
                تأكيد الاشتراك في الكورس
            </h1>
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active">
                    <a href="#credit-card" aria-controls="credit-card" role="tab" data-toggle="tab">
                        <i class="fa fa-credit-card"></i>Credit Card
                    </a>
                </li>
                <li role="presentation">
                    <a href="#paypal" aria-controls="paypal" role="tab" data-toggle="tab">
                        <i class="fa fa-paypal"></i> Paypal
                    </a>
                </li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade active" id="credit-card">...</div>
                <div role="tabpanel" class="tab-pane fade" id="paypal">
                    <div class="paypal-box text-center">
                        {{-- <a href="/paynow/{{ $course->id }}">تأكيد الدفع من خلال البايبال</a> --}}
                        @if(Auth::guard('web')->check())
                            {{-- <a href="../{{$course->id}}/subscribe/{{ Auth::guard('web')->user()->id }}">تأكيد الدفع من خلال البايبال
                            </a> --}}
                            <a href="{{  url('/paynow/'. $course->id) }}">تأكيد الدفع من خلال البايبال</a>
                        @endif
                    </div>
                    <!-- end paypal-box -->
                </div>
            </div>

        </div>
    </div>
    <!-- /.modal -->



@stop