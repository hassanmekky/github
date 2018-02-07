@extends(app('design').'.master')


@section('content')

<div class="intro-container col-xs-12">
            <div class="intro-head text-center">
                <div class="container">
                    <h1>{{ $course->course_name }}</h1>
                </div>
                <!-- /.container -->
            </div>
            <!-- /.intro-head -->

            <div class="corse-box col-xs-12">
                <div class="corse-nav text-center">
                    <div class="container">
                        <ul>
                            <li>
                                <a href="{{ url('/coursepage/'.$course->id) }}">
                                    <i class="fa fa-tasks"></i> الدروس
                                </a>
                            </li>

                            <li>
                                <a href="{{ url('/course-comments/'.$course->id) }}">
                                    <i class="fa fa-commenting-o"></i> النقاشات
                                </a>
                            </li>

                            <li>
                                <a href="{{ url( '/course-alerts/' .$course->id ) }}" class="active">
                                    <span class="padge">{{ $alerts->count() }}</span>
                                    <i class="fa fa-bell"></i> التنويهات
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- end container -->
                </div>
                <!-- end corse-nav -->
                <div class="lesson-box text-right">
                    <div class="container">
                        <div class="alert-box">
                            <div class="all-alerts col-xs-12 text-right">
                                <ul>
                                    @foreach($alerts as $alert)
                                    <li>
                                        <h1>التعليق من قبل المدرس</h1>
                                        <span>{{ $alert->created_at->format('Y-m-d') }}</span>
                                        <p>{{ $alert->subject }}</p>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                            <!-- end all-alerts -->
                            <!--
                            <div class="empty-msg text-center animated shake">
    <h1>
                                    <i class="fa fa-bell-slash"></i>
                                    لا توجد تعليقات حتي الان
                                </h1>
</div>
-->
                            <!-- end empty-msg -->
                        </div>
                        <!-- end alert-box -->
                    </div>
                    <!-- end container -->
                </div>
                <!-- end lesson-box -->
            </div>
            <!-- end corse-box -->

        </div>
        <!-- /.intro-container -->

@stop