@extends(app('adthem').'.panel')

@section('content')

<div class="content-wrapper">
	<section class="content">

		<div class="row">
		<div class="intro-container">
            <div class="intro-head text-center">
                <div class="container">
                    <h1>مقدمة في كورس {{ $course->course_name}}</h1>
                </div>
                <!-- /.container -->
            </div>
            <!-- /.intro-head -->
            <div class="intro-box">
                <div class="intro-container">
                    <div class="intro-name text-right">
                        <div class="name-head col-md-7 col-xs-12 pull-right">
                            <h1>{{ $course->course_name}}</h1>
                        </div>
                        <div class="extras col-md-5 col-xs-12">
                            <span> {{ $course->course_price }} </span>
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
                        <video id="example_video_1" class="video-js vjs-default-skin" controls="true" width="80%" height="520" poster="{{ url('ui') }}/images/3lom.jpg">
                            <source src="/courses/course/{{ $course->intro_video }}" type='video/mp4' />
                        </video>
                    </div>
                    <!-- /.intro-video -->
                    <div class="intro-date col-xs-12 text-right">
                        <h1>
            <i class="fa fa-calendar"></i>
            من : {{ $course->start_date }} : {{ $course->end_date }}
        </h1>
                        
                    </div>
                    <!-- /.intro-date -->
                    <div class="intro-details text-right">
                    	<h3>الوصف</h3>
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
                                <a href="/admin/addlecture/{{ $course->id }}" class="btn btn-block btn-primary">إضافة محاضرة</a>
                            </div>
                            <!-- /.intro_lec-inner -->
                        </div>
                        <!-- /.intro-lec -->

                            @if($course->questions()->count() > 0)
                                <div class="take-exam col-xs-12 text-center">
                                    <a href="{{ url('admin/testshow/'.$course->id) }}">
                                        <i class="fa fa-file-text-o"></i> مشاهدة وتعديل الاختبار
                                    </a>
                                </div>
                            @else
                                <div class="take-exam col-xs-12 text-center">
                                    <a href="{{ url('admin/addtest/'.$course->id) }}">
                                        <i class="fa fa-file-text-o"></i> إضافة إختبار 
                                    </a>
                                </div>
                            @endif

                    </div>
                    <!-- /.intro-extra -->

                </div>
                <!-- /.container -->
            </div>
            <!-- /.intro-box -->
        </div>
        <!-- /.intro-container -->
    </div>
    <hr>
    <div><center>
            @if($course->publish == 0)
		      	<a href="/admin/{{ $course->id }}/publish" class="btn btn-success" role="button">الموافقة على النشر</a>
            @endif
		      	<a href="/admin/{{ $course->id }}/refuse" class="btn btn-warning" role="button">رفض</a>
		      	<a href="/admin/{{ $course->id }}/delete" class="btn btn-danger" role="button">حذف</a>
		      	<a href="/admin/{{ $course->id }}/update" class="btn btn-primary" role="button">تعديل</a>
		      </center>
    </section>
</div>

@stop