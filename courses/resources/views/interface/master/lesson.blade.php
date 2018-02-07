@extends(app('design').'.master')


@section('content')

<div class="intro-container">
            <div class="intro-head text-center">
                <div class="container">
                    <h1>الدرس رقم ({{ $lesson->order }}) من  دورة {{ $lesson->course->course_name }}</h1>
                    <br>
                    <h1>{{ $lesson->lesson_name }}</h1>
                </div>
                <!-- /.container -->
            </div>
            <!-- /.intro-head -->
            <div class="corse-indv">
                <div class="container">
                    <div class="mob-episodes col-xs-12">
                        <ul>
                            <li>
                                <h1>
                                    <i class="fa fa-tasks"></i>
                                    الاسبوع الاول
                                </h1>
                            </li>
                            <li>
                                <a href="#" class="active">
                                    <i class="fa fa-play-circle"></i> الدرس الاول
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-play-circle"></i> الدرس الاول
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-play-circle"></i> الدرس الاول
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-play-circle"></i> الدرس الاول
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-play-circle"></i> الدرس الاول
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-play-circle"></i> الدرس الاول
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-play-circle"></i> الدرس الاول
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-play-circle"></i> الدرس الاول
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-play-circle"></i> الدرس الاول
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-play-circle"></i> الدرس الاول
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-play-circle"></i> الدرس الاول
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-play-circle"></i> الدرس الاول
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-play-circle"></i> الدرس الاول
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-play-circle"></i> الدرس الاول
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-play-circle"></i> الدرس الاول
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- end mob-episodes -->
                    <div class="corse_indv-video col-md-12 col-xs-12 text-center">
                        <div class="corse_indv-inner">
                            <!--                        <iframe width="100%" height="520" src="https://www.youtube.com/embed/tTgD9m1p5Ss?list=PLT56sSeAKiIvfQhsA2lXUUmjfh0JyEFU7" frameborder="0" allowfullscreen></iframe>-->
                             <video id="example_video_1" class="video-js vjs-default-skin" controls="true" width="100%" height="520" poster="{{ url('ui') }}/images/3lom.jpg">
                                <source src="/courses/lessons/{{ $lesson->lesson_video }}" type='video/mp4' />
                            </video>
                            <div class="finish-corse text-left col-xs-12">
                                {{-- @foreach(Auth::guard('web')->user()->lessons()->pluck('lesson_id') as $lessonid) --}}
                                    @if(Auth::guard('web')->user()->lessons()->where('lesson_id',$lesson->id)->count() > 0 )
                                        <a href="{{ url('/coursepage/'.$lesson->course->id) }}">العودة للدورة</a>
                                    @else
                                         <a href="{{ url($lesson->id. '/finish/' . Auth::guard('web')->user()->id ) }}">
                                             لقد انهيت هذا الدرس
                                         </a>
                                    @endif
                                 {{--    @endforeach --}}
                               
                                <div class="lesson-desc col-xs-12 text-right">
                                    <h1>وصف المحاضرة</h1>
                                    <p>
                                        {{ $lesson->description }}
                                    </p>
                                </div>
                            </div>
                            <!-- end finish-corse -->
                        </div>
                        <!-- end corse_indv-inner -->
                    </div>
                    <!-- end corse_indv-video -->
                    <!--
                    <div class="corse-episodes col-md-3 col-xs-12 text-right">
    <div class="corse_episodes-inner">
        <ul>
            <li>
                <h1>
                                        <i class="fa fa-tasks"></i>
                                        الاسبوع الاول
                                    </h1>
            </li>
            <li>
                <a href="#" class="active">
                    <i class="fa fa-play-circle"></i> الدرس الأول
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-play-circle"></i> الدرس الأول
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-play-circle"></i> الدرس الأول
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-play-circle"></i> الدرس الأول
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-play-circle"></i> الدرس الأول
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-play-circle"></i> الدرس الأول
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-play-circle"></i> الدرس الأول
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-play-circle"></i> الدرس الأول
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-play-circle"></i> الدرس الأول
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-play-circle"></i> الدرس الأول
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-play-circle"></i> الدرس الأول
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-play-circle"></i> الدرس الأول
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-play-circle"></i> الدرس الأول
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-play-circle"></i> الدرس الأول
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-play-circle"></i> الدرس الأول
                </a>
            </li>
        </ul>
    </div>
    end corse-episodes-inner
</div>
end corse-episodes
-->

                    <div class="corse-comments col-xs-12">
                        <div class="disqus-comments">
                            <div class="empty-msg text-center animated shake">
                                <h1>
                                    <i class="fa fa-commenting-o"></i>
عفوا لا توجد تعليقات علي هذا الدرس                                </h1>
                            </div>
                        </div>
                        <!-- end disqus-comments -->
                    </div>
                    <!-- end corse-comments -->
                </div>
                <!-- end container -->
            </div>
            <!-- end corse-indv -->
        </div>
        <!-- /.intro-container -->

@stop