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
                            @if(Auth::guard('web')->user()->id ==  $course->user()->find($course->user_id)->id )
                            <li>
                                <a href="#" class="add-alert-form">
                                    <i class="fa fa-bullhorn"></i> إضافة تنويه
                                </a>
                            </li>
                            <li>
                                <a href="#" class="sent-all">
                                    <i class="fa fa-envelope"></i> إرسال للجميع
                                </a>
                            </li>
                            @endif
                            <li>
                                <a href="{{ url('/coursepage/'.$course->id) }}" class="active">
                                    <i class="fa fa-tasks"></i> الدروس
                                </a>
                            </li>

                            <li>
                                <li>
                                    <a href="{{ url('/course-comments/'.$course->id) }}">
                                        <i class="fa fa-commenting-o"></i> النقاشات
                                    </a>
                                </li>

                                <li>
                                    <a href="{{ url( '/course-alerts/' .$course->id ) }}">
                                        <i class="fa fa-bell"></i> التنويهات
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="add-fav" data-toggle="tooltip" data-placement="top" title="إضافة الي المفضلة">
                                        <i class="fa fa-heart"></i>
                                    </a>
                                    <a href="#" class="add-fav-dis" data-toggle="tooltip" data-placement="top" title="إضافة الي المفضلة">
                                        <i class="fa fa-heart"></i>
                                    </a>
                                </li>
                                <li class="rating" data-toggle="tooltip" data-placment="top" title="إضافة تقييم للدورة">
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
                                                    <i class="fa fa-star"></i>
                                                </a>
                                            </li>
                                            @endif
                                        @endfor
                                    </ul>
                                </li>
                        </ul>
                        <!-- =========================================================================================================================================== -->

                        <div class="panel-pop modal" id="msg-all">
                            <div class="lost-inner">
                                <form action="{{ url('/sendall/course/'.$course->id) }}" method="post">
                                    {{ csrf_field() }}
                                    <h1>
                                        <i class="fa fa-envelope"></i>
                                        إرسال لجميع الطلاب المشتركين في الدورة
                                    </h1>
                                    <div class="lost-item" id="messageTo">
                                        <textarea name="message" placeholder="اكتب الرسالة هنا"></textarea>
                                    </div>
                                    <!-- /.lost-item -->
                                    <div class="text-center">
                                        <input type="submit" value="إرسال">
                                    </div>
                                </form>
                                <!-- /.lost-item -->
                            </div>
                            <!-- /.lost-inner -->
                        </div>
                        <!-- /.modal -->

                        <!-- =========================================================================================================================================== -->

                        <div class="panel-pop modal" id="alert-all">
                            <div class="lost-inner">
                                <form action="{{ url('/addalert/course/'.$course->id) }}" method="post">
                                    {{ csrf_field() }}
                                    <h1>
                                        <i class="fa fa-envelope"></i>
                                        اضافة تنويه للطلاب المشتركين في الدورة
                                    </h1>
                                    <div class="lost-item" id="alert-item">
                                        <input type="text" name="title" placeholder="عنوان التنويه">
                                    </div>
                                    <!-- /.lost-item -->
                                    <div class="lost-item" id="alert-item">
                                        <textarea name="subject" placeholder="مضمون التنويه"></textarea>
                                    </div>
                                    <!-- /.lost-item -->
                                    <div class="text-center">
                                        <input type="submit" value="نشر التنويه">
                                    </div>
                                    <!-- /.lost-item -->
                                </form>
                            </div>
                            <!-- /.lost-inner -->
                        </div>
                        <!-- /.modal -->

                        <!-- =========================================================================================================================================== -->
                    </div>
                    <!-- end container -->
                </div>
                <!-- end corse-nav -->
                <div class="lesson-box text-right">
                    <div class="container">
                        <div class="week-module text-right">
                            <h1>
                                <i class="fa fa-tasks"></i>
                                الاسبوع الاول
                            </h1>
                        </div>
                        <!-- end week-moduke -->
                        <ul>
                        	@foreach($course->lesson()->orderBy('order')->get() as $lesson)
                            <li>

                                <a href="{{ url('/lesson/'.$lesson->id) }}" class="lesson-det">
                                    @foreach(Auth::guard('web')->user()->lessons()->pluck('lesson_id') as $lessonid)
                                    @if( $lessonid == $lesson->id )
                                    <i class="fa fa-play-circle" style="color: green;"></i>
                                    @else
                                    <i class="fa fa-play-circle"></i>
                                    @endif
                                    @endforeach
                                    <span class="lesson-name">{{ $lesson->lesson_name }}</span>
                                </a>
                                <h3>8 دقيقة</h3>
                                @if(Auth::guard('web')->user()->id ==  $course->user()->find($course->user_id)->id )
                                <a href="#" class="del-lesson" data-toggle="tooltip" data-placement="top" title="حذف الدرس">
                                    <i class="fa fa-trash"></i>
                                </a>
                                @endif

                            </li>
                            @endforeach
                        </ul>

                        @if(Auth::guard('web')->user()->id ==  $course->user()->find($course->user_id)->id )

                        <a class="btn btn-primary" href="">اضافة محاضرة جدية</a>
                        @endif

                        </div>

                        <!-- Rating Section -->
                        @if(Auth::guard('web')->user()->id !=  $course->user()->find($course->user_id)->id )
                        <div class="container">
                            <div class="row" style="margin-top:40px;">
                                <div class="col-md-6">
                                <div class="well well-sm">
                                    <div class="text-right">
                                        <a class="btn btn-success btn-green" href="#reviews-anchor" id="open-review-box">أضف تقييم</a>
                                    </div>
                                
                                    <div class="row text-right" id="post-review-box" style="display:none;">
                                        <div class="col-md-12 ">
                                            <form accept-charset="UTF-8" action="{{ url($course->id.'/rating/'. Auth::guard('web')->user()->id) }}" method="post">
                                                {{ csrf_field() }}
                                                <input id="ratings-hidden" name="rating" type="hidden"> 
                                                <textarea class="form-control animated" cols="50" id="new-review" name="comment" placeholder="ادخل تقييمك للكورس ..." rows="5"></textarea>
                                
                                                <div class="text-right">
                                                    <div class="stars starrr" data-rating="0"></div>
                                                    <a class="btn btn-danger btn-sm" href="#" id="close-review-box" style="display:none; margin-right: 10px;">
                                                    <span class="glyphicon glyphicon-remove"></span>إلغاء</a>
                                                    <button class="btn btn-success" type="submit">حفظ</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div> 
                                 
                                </div>
                            </div>
                        </div>
                        <hr />
                        <!-- end Rating Section -->
                        @endif

                        @if(Auth::guard('web')->user()->id !=  $course->user()->find($course->user_id)->id && $course->questions()->count() > 0 )
                        <div class="take-exam col-xs-12 text-center">
                            <a href="{{ url('/testshow/'.$course->id) }}">
                                <i class="fa fa-file-text-o"></i> ابدا الاختبار الان
                            </a>
                        </div>
                        @elseif(Auth::guard('web')->user()->id ==  $course->user()->find($course->user_id)->id)
                            @if($course->questions()->count() > 0)
                                <div class="take-exam col-xs-12 text-center">
                                    <a href="{{ url('/teachtest/'.$course->id) }}">
                                        <i class="fa fa-file-text-o"></i> مشاهدة وتعديل الاختبار
                                    </a>
                                </div>
                            @else
                                <div class="take-exam col-xs-12 text-center">
                                    <a href="{{ url('/addquiz/'.$course->id) }}">
                                        <i class="fa fa-file-text-o"></i> إضافة إختبار 
                                    </a>
                                </div>
                            @endif
                        @endif
                        <!-- end take-exam -->
                    </div>
                    <!-- end container -->
                </div>
                <!-- end lesson-box -->
            </div>
            <!-- end corse-box -->

        </div>
        <!-- /.intro-container -->

@stop