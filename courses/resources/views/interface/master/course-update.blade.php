@extends(app('design').'.master')


@section('content')

<div class="up-container">
            <div class="up-header text-center">
                <div class="container">
                    <h1>تعديل دورة {{ $course->course_name }}</h1>
                </div>
                <!-- /.container -->
            </div>
            <!-- /.up-header -->
            <div class="up-box">
                <div class="container">
                    <div class="up-form">

                        <form action="{{ url('/updatecourse/'.$course->id) }}" method="post" class="add-form" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="up_form-item">
                                <h1>عنوان الدورة</h1>
                                <input type="text" name="title" value="{{ $course->course_name }}" placeholder="اضف عنوان الدورة" required>
                            </div>
                            <!-- /.up_form-item -->
                            <div class="up_form-item">
                                <h1>متطلب سابق</h1>
                                <input type="text" name="prev_know" value="{{ $course->prev_know }}" placeholder="متطلب سابق" required>
                            </div>
                            <!-- /.up_form-item -->
                            <div class="up_form-item">
                                <h1>المجال</h1>
                                
                                <select name="category_id">
                                  @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                  @endforeach
                                </select>
                            </div>
                            <!-- /.up_form-item -->
                            <div class="up_form-item">
                                <h1>رابط فيديو</h1>
                                <div class="add_cont text-right">
                                    <div class="lecture-item">
                                        <div class="add_cont text-right">
                                            <label class="text-right">
                                                <input type="checkbox" id="up-video">
                                                <span>اذا أردت رفع فيديو من جهازك الشخصي</span>
                                            </label>

                                            <div class="videoUploaded col-xs-12 text-right">
                                                <span><i class="fa fa-video-camera"></i> ارفع فيديو من جهازك</span>
                                                <input type="file" name="intro_video" class="uploaded">
                                            </div>
                                            
                                        </div>

                                    </div>
                                    <!-- /.lecture-item -->
                                </div>
                                <input type="text" placeholder="ادخل رابط فيديو" class="linked">

                            </div>
                            <!-- /.up_form-item -->
                            <div class="up_form-item">
                                <h1>وصف الدورة</h1>
                                <textarea name="description" placeholder="اضف وصف الدورة" required>{{ $course->description }}</textarea>
                            </div>
                            <!-- /.up_form-item -->
                            <div class="up_form-item">
                                <h1>الجنس المتوقع</h1>
                                <div class="add_cont text-right">
                                    @if($course->exp_gender == 'ذكر,انثي')
                                        <label class="text-right">
                                            <input name="exp_gender[]" value="ذكر" type="checkbox" checked>
                                            <span>ذكور</span>
                                        </label>
                                        <label class="text-right">
                                            <input name="exp_gender[]" value="انثي" type="checkbox" checked>
                                            <span>إناث</span>
                                        </label>
                                    @elseif($course->exp_gender == 'ذكر')
                                        <label class="text-right">
                                            <input name="exp_gender[]" value="ذكر" type="checkbox" checked>
                                            <span>ذكور</span>
                                        </label>
                                        <label class="text-right">
                                            <input name="exp_gender[]" value="انثي" type="checkbox">
                                            <span>إناث</span>
                                        </label>
                                    @elseif($course->exp_gender == 'انثي')
                                        <label class="text-right">
                                            <input name="exp_gender[]" value="ذكر" type="checkbox" >
                                            <span>ذكور</span>
                                        </label>
                                        <label class="text-right">
                                            <input name="exp_gender[]" value="انثي" type="checkbox" checked>
                                            <span>إناث</span>
                                        </label>
                                    @else
                                        <label class="text-right">
                                            <input name="exp_gender[]" value="ذكر" type="checkbox" >
                                            <span>ذكور</span>
                                        </label>
                                        <label class="text-right">
                                            <input name="exp_gender[]" value="انثي" type="checkbox" >
                                            <span>إناث</span>
                                        </label>
                                    @endif
                                </div>
                            </div>

                            <div class="up_form-item">
                                <h1>نوع الدورة</h1>
                                <div class="add_cont text-right">
                                    @if($course->course_price == '')
                                        <label class="text-right">
                                            <input type="radio" name="price" checked>
                                            <span>مجاني</span>
                                        </label>
                                        <label class="text-right">
                                            <input type="radio" name="price">
                                            <span>مدفوع</span>
                                        </label>
                                    @else
                                        <label class="text-right">
                                            <input type="radio" name="price">
                                            <span>مجاني</span>
                                        </label>
                                        <label class="text-right">
                                            <input type="radio" name="price" checked>
                                            <span>مدفوع</span>
                                        </label>
                                    @endif
                                    <input type="number" min="1" name="course_price" value="{{ $course->course_price }}" data-toggle="tooltip" data-placement="top" title="اضف سعر الدورة">
                                </div>
                            </div>

                            <div class="up_form-item">
                                <h1>تاريخ بداية الدورة</h1>
                                <input type="date" name="start_date" value="{{ $course->start_date }}" placeholder="اضف عنوان الدورة" required>
                            </div>

                           <div class="up_form-item">
                                <h1>تاريخ نهاية الدورة</h1>
                                <input type="date" name="end_date" value="{{ $course->end_date }}" placeholder="اضف عنوان الدورة">
                            </div>

                            <div class="up_form-item">
                                <h1>صورة غلاف الدورة </h1>
                                <div class="add_cont text-right">
                                    
                                    <input type="file" name="image" data-toggle="tooltip" data-placement="top" title="اضف صورة غلاف">
                                </div>
                            </div>
                            <!-- /.up_form-item -->

                            <div class="up_form-item">
                                <a class="add-cert">اضافة شهادة للدورة</a>
                                <div class="course-cert">
                                    <div class="up_form-item">
                                        <h1>إسم الشهادة</h1>
                                        <input type="text" name="cert_name" value="{{ $course->cert_name }}" placeholder="">
                                    </div>
                                    <!-- /.up_form-item -->
                                    <div class="up_form-item">
                                        <h1>الجهة المانحة</h1>
                                        <input type="text" name="cert_orgnization" value="{{ $course->cert_orgnization }}" placeholder="">
                                    </div>
                                    <!-- /.up_form-item -->
                                    <div class="up_form-item">
                                        <h1>تكلفة الشهادة</h1>
                                        <div class="add_cont text-right">
                                            @if($course->cert_price == '')
                                                <label class="text-right">
                                                    <input type="radio" name="f" checked>
                                                    <span>مجاني</span>
                                                </label>
                                                <label class="text-right">
                                                    <input type="radio" name="f">
                                                    <span>مدفوع</span>
                                                </label>
                                            @else
                                                <label class="text-right">
                                                    <input type="radio" name="f">
                                                    <span>مجاني</span>
                                                </label>
                                                <label class="text-right">
                                                    <input type="radio" name="f" checked>
                                                    <span>مدفوع</span>
                                                </label>
                                            @endif
                                            <input type="number" name="cert_price" value="{{ $course->cert_price }}" min="1" data-toggle="tooltip" data-placement="top" title="اضف سعر الشهادة"> </div>
                                        </div>
                                        <!-- /.up_form-item -->
                                    </div>
                                    <!-- /.course-cert -->
                                </div>
                                <!-- /.up_form-item -->

                                <div class="up_form-item up-confirm">
                                    <input type="submit" value="اضافة الدورة">
                                </div>
                                <!-- /.up_form-item -->
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

                        </div>
                        <!-- /.up-form -->
                    </div>
                    <!-- /.container -->
                </div>
                <!-- /.up-box -->
            </div>
            <!-- /.up-container -->
@stop