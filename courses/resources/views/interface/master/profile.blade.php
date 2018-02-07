@extends(app('design').'.master')


@section('content')

<div class="profile-content empty-course">
    <div class="container">
        <div class="right_tap-box col-md-3 col-xs-12 hidden-xs hidden-sm pull-right">
            <div class="right_box-inner">
                <!-- Nav tabs -->
                <a class="toggle-slidenav hidden-xs hidden-sm">
                    <i class="fa fa-close"></i>
                </a>
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active">

                        <a href="#home" aria-controls="home" role="tab" data-toggle="tab">
                            <i class="fa fa-user"></i> الملف الشخصي
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#password" aria-controls="password" role="tab" data-toggle="tab">
                            <i class="fa fa-lock"></i> كلمة المرور
                        </a>
                    </li>
                    @if(Auth::guard('web')->user()->role == 'مدرب' || Auth::guard('web')->user()->role == 'مدرب,متدرب')
                    <li role="presentation">
                        <a href="#courses" aria-controls="courses" role="tab" data-toggle="tab">
                            <i class="fa fa-database"></i> الدورات
                        </a>
                    </li>
                    @endif
                    <li role="presentation">
                        <a href="#interests" aria-controls="interests" role="tab" data-toggle="tab">
                            <i class="fa fa-diamond"></i> الاهتمامات
                        </a>
                    </li>
                    @if(Auth::guard('web')->user()->role == 'مدرب' || Auth::guard('web')->user()->role == 'مدرب,متدرب')
                    <li role="presentation">
                        <a href="#cv" aria-controls="cv" role="tab" data-toggle="tab">
                            <i class="fa fa-file-text-o"></i> السيرة الذاتية
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#blance" aria-controls="blance" role="tab" data-toggle="tab">
                            <i class="fa fa-file-text-o"></i>الرصيد 
                        </a>
                    </li>
                    @endif
                    @if(Auth::guard('web')->user()->role == 'متدرب' || Auth::guard('web')->user()->role == 'مدرب,متدرب')
                    <li role="presentation">
                        <a href="#all-courses" aria-controls="all-courses" role="tab" data-toggle="tab">
                            <i class="fa fa-eye"></i> تصفح الدورات
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#my_courses" aria-controls="my_courses" role="tab" data-toggle="tab">
                            <i class="fa fa-folder-open-o"></i> دوراتي كمتدرب
                        </a>
                    </li>

                    <li role="presentation">
                        <a href="#my_certf" aria-controls="my_certf" role="tab" data-toggle="tab">
                            <i class="fa fa-table"></i> شهاداتي كمتدرب
                        </a>
                    </li>
                    @endif

                </ul>
            </div>
            <!-- /.right_box-inner -->
        </div>
        <!-- /.right_tap-box -->

        <div class="mobile_tap-box col-md-12 col-xs-12 hidden-lg text-center">
            <div class="right_box-inner">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active">

                        <a href="#home" aria-controls="home" role="tab" data-toggle="tab" title="الملف الشخصي">
                            <i class="fa fa-user"></i>
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#password" aria-controls="password" role="tab" data-toggle="tab" title="كلمة المرور">
                            <i class="fa fa-lock"></i>
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#courses" aria-controls="courses" role="tab" data-toggle="tab" title="الدورات">
                            <i class="fa fa-database"></i>
                        </a>
                    </li>

                    <li role="presentation">
                        <a href="#interests" aria-controls="interests" role="tab" data-toggle="tab" title="الاهتمامات">
                            <i class="fa fa-diamond"></i>
                        </a>
                    </li>

                    <li role="presentation">
                        <a href="#cv" aria-controls="cv" role="tab" data-toggle="tab" title="السيرة الذاتية">
                            <i class="fa fa-file-text-o"></i>
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#all-courses" aria-controls="all-courses" role="tab" data-toggle="tab" title="تصفح الدورات">
                            <i class="fa fa-eye"></i>
                        </a>
                    </li>

                    <li role="presentation">
                        <a href="#my_courses" aria-controls="my_courses" role="tab" data-toggle="tab" title="دوراتي كمتدرب">
                            <i class="fa fa-folder-open-o"></i>
                        </a>
                    </li>

                </ul>
            </div>
            <!-- /.right_box-inner -->
        </div>
        <!-- /.mobile_tap-box -->

        <div class="left_tap-box col-md-9 col-xs-12 pull-left">
            <div class="left_box-inner">
                <!-- Tab panes -->
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane fade in  active" id="home">
                        <div class="home-head">
                            <h1>
                                <i class="fa fa-user"></i>
                                الملف الشخصي
                                <a class="edit-personal">
                                    <i class="fa fa-cog"></i>
                                    تعديل البيانات
                                </a>
                                <button class="cancel-personal" type="reset">
                                    <i class="fa fa-times"></i>
                                    إلغاء التعديل
                                </button>
                            </h1>
                        </div>
                        <!-- /.home-head -->

                        <div class="home_img  text-center">
                            <div class="home_img-inner">
                                <div class="left-caption col-xs-12">
                                    <div class="imgcontent col-xs-12">
                                        <div class="bstext">
                                            <span>
                                  <i class="fa fa-camera"></i><br>
                                  Upload an image
                              </span>
                                        </div>
                                        <form action="/userupdate/{{ Auth::guard('web')->user()->id }}" method="post" enctype="multipart/form-data">
                                        	{{ csrf_field() }}
                                        <!-- /.bstext -->
                                        <output id="list"></output>
                                        <input type="file" name="profile_img" id="show-adj8" name="myFileSelect">
                                    </div>
                                    <!-- /.imgcontent -->
                                </div>
                                <!-- /.left-caption -->
                                @if(Auth::guard('web')->user()->image == null)
                                	<img src="{{url('ui')}}/images/s.png" alt="" width="150" height="150">
                                @else
                                	<img src="upload/usersProfile/{{Auth::guard('web')->user()->image}}" alt="" width="150" height="150">
                                @endif
                            </div>
                        </div>
                        <!-- /.home_img -->
                        <div class="home-content">

                            <div class="home_data col-md-10 col-sm-10 col-xs-12 text-right">
                                
                                	
                                    <div class="home_data-item all-set col-md-6 col-sm-6  col-xs-12 pull-right">
                                        <div>
                                            <i class="fa fa-user-secret"></i>
                                            <h1>الإسم بالكامل</h1>
                                            <input type="text"
                                             		name="all_name"
                                             		value="{{Auth::guard('web')->user()->all_name }}" id="edit-area" placeholder="الإسم بالكامل">
                                            <span>{{  Auth::guard('web')->user()->all_name }}</span>
                                        </div>
                                    </div>
                                    <!-- /.home_data-item -->

                                    <div class="home_data-item all-set col-md-6 col-sm-6  col-xs-12 pull-right">
                                        <div>
                                            <i class="fa fa-user"></i>
                                            <h1>إسم المستخدم</h1>
                                            <input type="text"
                                             name="name" 
                                             value="{{ Auth::guard('web')->user()->name }}"
                                             id="edit-area" placeholder="إسم المستخدم">
                                            <span>{{  Auth::guard('web')->user()->name }}</span>
                                        </div>
                                    </div>
                                    <!-- /.home_data-item -->
                                    <div class="home_data-item all-set col-md-6 col-sm-6  col-xs-12 pull-right">
                                        <div>
                                            <i class="fa fa-phone"></i>
                                            <h1>رقم الهاتف</h1>
                                            <input type="text" name="phonenumber"
                                             	   value="{{Auth::guard('web')->user()->phonenumber}}" 
                                                   id="edit-area" placeholder="رقم الهاتف">
                                            <span>{{  Auth::guard('web')->user()->phonenumber }}</span>
                                        </div>
                                    </div>
                                    <!-- /.home_data-item -->

                                    <div class="home_data-item all-set col-md-6 col-sm-6  col-xs-12 pull-right">
                                        <div>
                                            <i class="fa fa-envelope"></i>
                                            <h1>البريد الإلكتروني</h1>
                                            <input type="email" name="email" value="{{Auth::guard('web')->user()->email}}" id="edit-area" placeholder="البريد الإلكتروني">
                                            <span>{{  Auth::guard('web')->user()->email }}</span>
                                        </div>
                                    </div>
                                    <!-- /.home_data-item -->
                                    <div class="home_data-item col-md-6 col-sm-6  col-xs-12 pull-right">
                                        <div>
                                            <i class="fa fa-globe"></i>
                                            <h1>الدولة</h1>
                                            <input type="text" id="edit-area" placeholder="الدولة">
                                            <span>{{  Auth::guard('web')->user()->country }}</span>
                                        </div>
                                    </div>
                                    <!-- /.home_data-item -->
                                    <div class="home_data-item all-set col-md-6 col-sm-6  col-xs-12 pull-right">
                                        <div>
                                            <i class="fa fa-male"></i>
                                            <h1>الجنس</h1>

                                            <span>{{  Auth::guard('web')->user()->gender }}</span>
                                        </div>
                                    </div>
                                    <!-- /.home_data-item -->
                                    <div class="home_data-item all-set col-md-6 col-sm-6  col-xs-12 pull-right">
                                        <div>
                                            <i class="fa fa-globe"></i>
                                            <h1>مدرب / متدرب</h1>
                                            <select id="edit-area" name="role">
                                                <option value="مدرب">مدرب</option>
                                                <option value="متدرب">متدرب</option>
                                                <option value="مدرب,متدرب">مدرب,متدرب</option>
                                            </select>
                                            <span>{{  Auth::guard('web')->user()->role }}</span>
                                        </div>
                                    </div>
                                    <!-- /.home_data-item -->

                                    <div class="home_data-item all-set col-md-6 col-sm-6  col-xs-12 pull-right">
                                        <div>
                                            <i class="fa fa-graduation-cap"></i>
                                            <h1> المؤهل</h1>
                                            <input type="text"
                                                    name="qualification"
                                                    value="{{ Auth::guard('web')->user()->qualification }}" 
                                                    id="edit-area" placeholder="المؤهل">

                                            @if(Auth::guard('web')->user()->qualification != null)
                                            <span>{{ Auth::guard('web')->user()->qualification }}</span>
                                            @else
                                            <span>-------</span>
                                            @endif

                                        </div>
                                    </div>
                                    <!-- /.home_data-item -->

                                    <div class="home_data-item all-set col-md-6 col-sm-6  col-xs-12 pull-right">
                                        <div>
                                            <i class="fa fa-briefcase"></i>
                                            <h1>التخصص</h1>
                                            <input type="text" 
                                                   name="specialization"  
                                                   value="{{ Auth::guard('web')->user()->specialization }}" 
                                                   id="edit-area" placeholder="التخصص">

                                            @if(Auth::guard('web')->user()->specialization != null)
                                            <span>{{ Auth::guard('web')->user()->specialization }}</span>
                                            @else
                                            <span>-------</span>
                                            @endif

                                        </div>
                                    </div>
                                    <!-- /.home_data-item -->

                                    <div class="home_data-item all-set col-md-6 col-sm-6  col-xs-12 pull-right">
                                        <div>
                                            <i class="fa fa-cogs"></i>
                                            <h1>مجال العمل</h1>
                                            <select id="edit-area" name="work_field">
                                                <option value="هندسة">هندسة</option>
                                                <option value="حاسبات">حاسبات</option>
                                                <option value="تعليم">تعليم</option>
                                                <option value="أستاذ جامعى">أستاذ جامعى</option>
                                            </select>
                                            
                                            @if(Auth::guard('web')->user()->work_field != null)
                                            <span>{{ Auth::guard('web')->user()->work_field }}</span>
                                            @else
                                            <span>-------</span>
                                            @endif

                                        </div>
                                    </div>
                                    <!-- /.home_data-item -->

                                    <div class="home_data-item all-set col-md-12 col-sm-12  col-xs-12 pull-right">
                                        <input type="submit" class="confirm-set" value="حفظ التعديلات">
                                    </div>
                                    <!-- /.home_data-item -->
                                </form>
                            </div>
                            <!-- ./home_data -->
                        </div>
                        <!-- /.home-content -->
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="password">
                        <div class="home-head">
                            <h1>
                                <i class="fa fa-lock"></i>
                                كلمة المرور
                            </h1>
                            {{-- <a class="edit-personal">
                                <i class="fa fa-cog"></i> تعديل البيانات
                            </a> --}}
                            <button class="cancel-personal" type="reset">
                                <i class="fa fa-times"></i> إلغاء التعديل
                            </button>
                        </div>
                        <!-- /.home-head -->
                        <div class="home-content pass-content col-xs-12">
                            <div class="home_data col-xs-12 pull-right text-right">
                                <form action="{{ url('/resetpassword') }}" method="post">
                                    {{ csrf_field() }}
                                <div class="home_data-item all-pass col-md-12  col-xs-12 pull-right">
                                    <div>
                                        <i class="fa fa-lock"></i>
                                        <h1>كلمة المرور القديمة</h1>
                                        <input type="password" name="oldpass" >
                                    </div>
                                </div>
                                <!-- /.home_data-item -->

                                <div class="home_data-item all-pass col-md-12  col-xs-12 pull-right">
                                    <div>
                                        <i class="fa fa-unlock"></i>
                                        <h1>كلمة المرور الجديدة</h1>
                                        <input type="password" name="password">
                                        
                                    </div>
                                </div>
                                <!-- /.home_data-item -->

                                <div class="home_data-item all-pass col-md-12  col-xs-12 pull-right">
                                    <div>
                                        <i class="fa fa-lock"></i>
                                        <h1>إعادة كتابة كلمة المرور الجديدة</h1>
                                        <input type="password" name="confirm_pass">
                                        
                                    </div>
                                </div>
                                <!-- /.home_data-item -->
                                <div class="home_data-item all-pass col-md-12 col-sm-12  col-xs-12 pull-right">
                                    <input type="submit" value="حفظ التعديلات" class="pull-left">
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
                                <!-- /.home_data-item -->
                            </div>
                            <!-- ./home_data -->
                        </div>
                        <!-- /.home-content -->
                    </div>


                    <div role="tabpanel" class="tab-pane fade" id="courses">
                        <div class="home-head">
                            <h1>
                                <i class="fa fa-database"></i>
                                الدورات
                            </h1>
                            <a class="add1_course" href="/addcourse">
                                <i class="fa fa-plus"></i>إضافة دورة
                            </a>
                        </div>
                        <!-- /.home-head -->
                        <div class="home-content  pass-content col-xs-12">
                            <div class="home_data col-md-12 pull-right text-right">
                                <div class="shop-wrapper col-xs-12">

                                	
                                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                    	@foreach(Auth::guard('web')->user()->course()->get()  as $course )
                                        <div class="panel panel-default">
                                            <div class="panel-heading" role="button" role="tab" id="headingOne" role="button" data-toggle="collapse" data-parent="#accordion"
                                             href="#collapse{{$course->id }}" aria-expanded="false" 
                                             aria-controls="collapseOne">
                                                <h4 class="panel-title">
					                                <a>
					                                    <h5>
					                                        <i class="fa fa-group"></i> {{ $course->users()->count() }}
					                                    </h5>
					                                 {{ $course->course_name }}
					                                </a>
					                            </h4>
                                            </div>
                                            <div id="collapse{{$course->id}}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                                                <div class="panel-body">
                                                    <div class="instructor-control text-center">

                                                        <a href="/{{$course->id}}/delete" class="delete-course">
                                                            <i class="fa fa-trash"></i> حذف الدورة
                                                        </a>
                                                        <a href="#" class="add-course">
                                                            <i class="fa fa-plus"></i> إضافة محاضرة
                                                        </a>
                                                        <a href="#" class="message-course">
                                                            <i class="fa fa-envelope"></i> إرسال للجميع
                                                        </a>
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
                                                        </div>
                                                        <!-- /.modal -->

                                                        <!-- =========================================================================================================================================== -->
                                                        <a href="{{ url('/updatecourse/'.$course->id) }}" class="">
                                                            <i class="fa fa-pencil"></i> تعديل الدورة
                                                        </a>
                                                        <a href="#" class="add-alert-form">
                                                            <i class="fa fa-bullhorn"></i> إضافة تنويه
                                                        </a>

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
                                                        <div class="add_lecture">
                                                            <form action="/addlecture/{{$course->id}}" method="post" enctype="multipart/form-data">
                                                                {{ csrf_field() }}
                                                                <div class="lecture-item">
                                                                    <h1>اسم الدرس</h1>
                                                                    <input type="text" 
                                                                            name="lesson_name" 
                                                                            placeholder="اضف اسم المحاضرة">
                                                                </div>
                                                                <!-- /.lecture-item -->
                                                                <div class="lecture-item">
                                                                    <h1>اضف رابط خارجي للفيديو</h1>
                                                                    <div class="add_cont text-right">
                                                                        <label class="text-right">
                                                                            <input type="checkbox" id="up-video">
                                                                            <span>اذا أردت رفع فيديو من جهازك الشخصي</span>
                                                                        </label>

                                                                        <div class="videoUploaded col-xs-12 text-right">
                                                                            <span><i class="fa fa-video-camera"></i> ارفع فيديو من جهازك</span>
                                                                            <input type="file" name="lesson_video" class="uploaded">
                                                                        </div>
                                                                        <!--
                                                                        <label class="text-right">
                                                                            <input type="radio" id="add-link">
                                                                            <span>يوتيوب</span>
                                                                        </label>
-->
                                                                    </div>
                                                                    <input type="text" placeholder="ادخل رابط فيديو" class="linked">
                                                                </div>
                                                                <!-- /.lecture-item -->
                                                                <div class="lecture-item">
                                                                    <h1>وصف الدرس</h1>
                                                                    <textarea name="description" placeholder="اضف وصف المحاضرة"></textarea>
                                                                </div>
                                                                <!-- /.lecture-item -->
                                                                <div class="lecture-item text-right">
                                                                    <div class="fileUpload col-xs-12 text-right">
                                                                        <span><i class="fa fa-file"></i> رابط أوراق العمل </span>
                                                                        <input type="file" name="lesson_files" class="upload">
                                                                    </div>
                                                                    <span class="hint"> Image او Word او Powerpoint او Pdf الملفات يمكن ان تكون </span>
                                                                </div>
                                                                <!-- /.lecture-item -->
                                                                <div class="lecture-item add-sorting">
                                                                    <label>
                                                                        <input type="checkbox" id="sort-lesson">
                                                                        <span>يجب تحديد ترتيب الدرس </span>
                                                                        <input type="number" min="0" name="order"
                                                                         data-toggle="tooltip" data-placement="top" title="اكتب ترتيب الدرس بالأرقام" class="add_sort-number">
                                                                    </label>
                                                                </div>
                                                                <!-- /.lecture-item -->
                                                                <div class="lecture-item confirm-lec">
                                                                    <input type="submit" value="إضافة محاضرة">
                                                                </div>
                                                                <!-- /.lecture-item -->

                                                            </form>
                                                        </div>
                                                        <!-- /.add_lecture -->
                                                    </div>
                                                    <!-- /.instructor-control -->
                                                    <ul>
                                                        <li>
                                                            <h1>
                                                                <label>الوصف</label>
                                                                <span class="par"> {{ $course->description }} </span>
                                                            </h1>
                                                        </li>
                                                        <li>
                                                            <h1>
                                                                <label>المجال</label>
                                                                <span>{{ $course->category()->find($course->category_id)->name }}</span>
                                                            </h1>
                                                        </li>

                                                        <li>
                                                            <h1>
                                                                <label>عدد المشتركين في الدورة</label>
                                                                <span>{{ $course->users()->count() }}</span>
                                                            </h1>
                                                        </li>
                                                        <li>
                                                            <h1>
                                                                <label>الحالة</label>
                                                                @if($course->end_date < now())
                                                                <span>تم الانتهاء من تسجيلها</span>
                                                                @else
                                                                <span>جارية</span>
                                                                @endif
                                                            </h1>
                                                        </li>
                                                        <li>
                                                            <h1>
                                                                <label>نشرت / لم تنشر</label>
                                                                @if($course->publish == 1)
                                                                <span>نشرت</span>
                                                                @else
                                                                <span>لم تنشر</span>
                                                                @endif
                                                            </h1>
                                                        </li>
                                                        <li>
                                                            <h1>
                                                                <label>السعر</label>
                                                                <span>{{ $course->course_price }}</span>
                                                            </h1>
                                                        </li>
                                                        <li>
                                                            <h1>
                                                                <label>التاريخ</label>
                                                                <span>{{ $course->start_date }}</span>
                                                            </h1>
                                                        </li>
                                                        <li>
                                                            <h1>
                                                                <label>الشهادة</label>
                                                                @if($course->cert_name != null)
                                                                <span>{{ $course->cert_name }}</span>
                                                                @else
                                                                <span>لا يوجد شهادة </span>
                                                                @endif
                                                            </h1>
                                                        </li>
                                                        @if($course->cert_name != null)
                                                        <li>
                                                            <h1>
                                                                <label>سعر الشهادة</label>
                                                                <span>{{ $course->cert_price }}</span>
                                                            </h1>
                                                        </li>
                                                        @endif
                                                        <li>
                                                            <h1>
                                                                <label>إسم المدرب</label>
                                                                <span>{{$course->user()->find($course->user_id)->name}}</span>
                                                            </h1>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <!-- /.panel-body -->

                                            </div>
                                            <!-- /#collapseOne -->
                                        </div>
                                        <!-- /.panel-default -->

                                        @endforeach
                                       
                                        
                                    </div>
                                    <!-- /.panel-group -->

                                </div>
                                <!-- end shop-wrapper -->
                            </div>
                            <!-- ./home_data -->
                        </div>
                        <!-- /.home-content -->
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="cv">
                        <div class="home-head">
                            <h1>
                                <i class="fa fa-file"></i>
                                أضف ملف سيرتك الذاتية
                            </h1>
                        </div>
                        <!-- /.home-head -->
                        <div class="home-content pass-content col-xs-12">
                            <div class="home_data col-xs-12 pull-right text-right">
                                <div class="home_data-item col-md-12  col-xs-12 pull-right">
                                    <div>
                                        <form action="/addcv/{{Auth::guard('web')->user()->id}}"

                                         class="cv-file" method="post">

                                         {{ csrf_field() }}

                                            <h1>أضف رابط خارجي لملف السيرة الذاتية</h1>
                                            <input type="url" placeholder="رابط خارجي">
                                            <h1>او يمكنك كتابتها بنفسك من خلال</h1>
                                            <textarea 
                                            name="bio" 
                                            @if(Auth::guard('web')->user()->bio != null)
                                             value="{{ Auth::guard('web')->user()->bio }}"
                                            @endif
                                            placeholder="اكتب سيرتك الذاتية"></textarea>
                                            <input type="submit" value="حفظ">
                                            <a class="show-cv">عرض ملف السيرة الذاتية</a>
                                        </form>
                                    </div>
                                    <div class="cv-container text-center">
                                        @if(Auth::guard('web')->user()->bio != null)
                                            <p>{{Auth::guard('web')->user()->bio}}</p>
                                        @else
                                            <p>لم يتم إدخال السيرة الذاتية بعد</p>
                                        @endif
                                        <a href="#">
                                            <i class="fa fa-cloud-download"></i> تحميل ملف السيرة الذاتية
                                        </a>
                                    </div>
                                    <!-- /.cv-container -->
                                </div>
                                <!-- /.home_data-item -->
                            </div>
                            <!-- ./home_data -->
                        </div>
                        <!-- /.home-content -->
                    </div>

                    <!-- Blance -->
                    <div role="tabpanel" class="tab-pane fade" id="blance">
                        <div class="home-head">
                            <h1>
                                <i class="fa fa-file"></i>
                               الرصيد
                            </h1>
                        </div>
                        <!-- /.home-head -->
                         <div class="home-content pass-content col-xs-12">
                            <div class="home_data col-xs-12 pull-right text-right">
                                <div class="home_data-item col-md-12  col-xs-12 pull-right">
                                    <span>{{ Auth::guard('web')->user()->blance }}</span>
                                    <br><br>
                                </div>
                            </div>
                            <div>
                                <a href="{{ url('/withdraw/'. Auth::guard('web')->user()->id) }}" class="btn btn-primary">سحب المبلغ</a>
                            </div>
                        </div>
                        <!-- /.home-content -->
                    </div>


                    <!-- end Blance -->


                    <div role="tabpanel" class="tab-pane fade" id="interests">
                        <div class="home-head">
                            <h1>
                                <i class="fa fa-diamond"></i>
                                الاهتمامات
                            </h1>
                        </div>
                        <!-- /.home-head -->
                        <div class="home-content pass-content col-xs-12">
                            <div class="home_data col-xs-12 pull-right text-right">
                                <div class="interest-show">
                                    <ul>
                                        @if(Auth::guard('web')->user()->interests != null)
                                            @foreach(explode(' , ', Auth::guard('web')->user()->interests) as $interest)
                                            <li>
                                                <span class="inter-item">{{ $interest }}
                                                    <a
                                                     href="/deleteinterest/{{Auth::guard('web')->user()->id}}/{{$interest}}">
                                                     <i class="fa fa-times" id="del-item"></i></a>
                                                </span>
                                            </li>
                                            @endforeach
                                        @endif
                                    </ul>
                                </div>
                                <!-- /.interest-show -->
                               
                                <div class="add-interest">
                                    <a>
                                        <i class="fa fa-plus"></i> أضف اهتمامات أخري
                                    </a>
                                </div>
                                <!-- /.add-interest -->
                                <div class="home_data-item col-md-12  col-xs-12 pull-right">

                                    <div class="interest-cont col-xs-12">
                                        
                                        <!-- /.interest-item -->
                                       <form action="/newinterests/{{ Auth::guard('web')->user()->id }}" method="post">  {{ csrf_field() }}

                                        @foreach($categories as $category)
                                        
                                                    
                                                    @if(! in_array($category->name, explode(' , ', Auth::guard('web')->user()->interests)))
                                                    <div class="interest-item col-md-4 col-sm-4 col-xs-6">
                                                        <label>
                                                            <input type="checkbox" name="interests[]" value="{{ $category->name }}">
                                                            <span>{{ $category->name }}</span>
                                                        </label>
                                                    </div>
                                                    @endif
                                       
                                        @endforeach
                                        <!-- /.interest-item -->
                                    
                                    </div>
                                    <!-- /.interest-cont -->
                                    <div class="interst-gender col-xs-12">
                                        <h1>نوع الدورات التي تفضل متابعتها </h1>
                                        <div class="add_cont text-right">
                                            <label class="text-right">
                                                <input name="prefered[]" value="ذكر" type="checkbox">
                                                <span>ذكور</span>
                                            </label>
                                            <label class="text-right">
                                                <input name="prefered[]" value="انثي" type="checkbox">
                                                <span>إناث</span>
                                            </label>
                                        </div>
                                        <div class="cv-file text-left">
                                            <input type="submit" value="حفظ">
                                        </div>
                                    </div>
                                </form>
                                    <!-- /.interest-gender -->
                                </div>
                                <!-- /.home_data-item -->
                            </div>
                            <!-- ./home_data -->
                        </div>
                        <!-- /.home-content -->
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="all-courses">
                        <div class="home-head">
                            <h1>
                                <i class="fa fa-eye"></i>
                                جميع الدورات
                            </h1>
                        </div>
                        <!-- /.home-head -->
                        <div class="home-content pass-content col-xs-12">
                            <div class="home_data col-xs-12 pull-right text-right">
                                <div class="my_courses-container">
                                    <div>

                                        <!-- Nav tabs -->
                                        <ul class="nav nav-tabs" role="tablist">
                                            <li role="presentation" class="active"><a href="#current" aria-controls="current" role="tab" data-toggle="tab">الدورات الحالية</a></li>
                                            <li role="presentation"><a href="#comming" aria-controls="comming" role="tab" data-toggle="tab">الدورات القادمة</a></li>

                                        </ul>

                                        <!-- Tab panes -->
                                        <div class="tab-content">
                                            <div role="tabpanel" class="tab-pane fade in active" id="current">
                                                @if(Auth::guard('web')->user()->interests != '')
                                                    @foreach(explode(' , ', Auth::guard('web')->user()->interests) as $interest)
                                                    <div class="type col-xs-12">
                                                       
                                                        <div class="filtered-head text-right">
                                                            <h1>
                                                            <i class="fa fa-tags"></i>
                                                            {{ $interest }}
                                                        </h1>
                                                        </div>

                                                    <!-- /.filtered-head -->

                                                @foreach($courses as $course)

                                               @if($course->users()
                                                            ->where('user_id',Auth::guard('web')->user()->id)->count() == 0)

                                                @if($interest == $course->category()->find($course->category_id)->name )
                                                        @if($course->start_date < now() 

                                                            && in_array($course->user()->find($course->user_id)->gender, explode(' , ', Auth::guard('web')->user()->prefered_courses)) 

                                                            && in_array(Auth::guard('web')->user()->gender, 
                                                                explode(',', $course->exp_gender)))


                                                    <div class="card col-md-6 col-xs-12 pull-right">
                                                        <div class="card-inner">
                                                            <span class="corse-type">{{ $course->course_name }}</span>
                                                            <div class="card-img">

                                                               @if($course->image == null) 
                                                                     <img src="{{ url('ui') }}/images/3lom.jpg" alt="..." class="img-responsive" >
                                                                    @else
                                                                     <img src="/courses/course/{{ $course->image }} " alt="..." class="img-responsive">
                                                                    @endif
                                                                <div class="lessons-number text-center">
                                                                    <h1>
                                                                    <i class="fa fa-play-circle"></i>
                                                                    {{ $course->lesson()->count() }}
                                                                </h1>
                                                                </div>
                                                                <!-- /.lessons-number -->
                                                            </div>
                                                            <!-- /.card-img -->
                                                            <div class="card-data">
                                                                <div class="course_name text-right">
                                                                    <h1>
                                                                        <a href="/course/{{ $course->id }}">
                                                                            {{ $course->course_name }}
                                                                        </a>
                                                                    </h1>
                                                                </div>
                                                                <!-- /.course-name -->
                                                                <div class="course_setting text-right">
                                                                    <span class="course_date">
                                                                        <i class="fa fa-calendar"></i>
                                                                        من {{ $course->start_date }} إلى {{ $course->end_date }}
                                                                    </span>
                                                                </div>
                                                                <!-- /.course_setting -->
                                                                <div class="course_instructor-data">
                                                                    <span>
                                                                        <img src="{{url('ui')}}/images/s.png" width="70" height="70" class="img-responsive">
                                                                    </span>
                                                                    <a href="#">
                                                                        <i class="fa fa-user"></i>
                                                                        {{ $course->user()->find($course->user_id)->name }}
                                                                    </a>
                                                                </div>
                                                                <!-- /.course_instructor-data -->
                                                            </div>
                                                            <!-- /.card-data -->

                                                        </div>
                                                        <!-- /.card-inner -->
                                                    </div>
                                                    <!-- /.card -->
                                                       
                                                        @endif
                                                    @endif
                                                     @endif 
                                                    @endforeach

                                                    
                                                </div>
                                                <!-- /.type -->
                                                
                                                @endforeach
                                                 @endif
                                            </div>

                                <!-- Coming -->

                                            
                                            <div role="tabpanel" class="tab-pane fade" id="comming">

                                                @foreach(explode(' , ', Auth::guard('web')->user()->interests) as $interest)
                                                <div class="type col-xs-12">
                                                   
                                                    <div class="filtered-head text-right">
                                                        <h1>
                                                        <i class="fa fa-tags"></i>
                                                        {{ $interest }}
                                                    </h1>
                                                    </div>
                                                    <!-- /.filtered-head -->

                                                @foreach($courses as $course)

                                                @if($course->users()
                                                            ->where('user_id',Auth::guard('web')->user()->id)->count() == 0)

                                                @if($interest == $course->category()->find($course->category_id)->name )
                                                    @if($course->start_date > now()

                                                        && in_array($course->user()->find($course->user_id)->gender, explode(' , ', Auth::guard('web')->user()->prefered_courses)) 

                                                        && in_array(Auth::guard('web')->user()->gender, 
                                                            explode(',', $course->exp_gender)))

                                                    <div class="card col-md-6 col-xs-12 pull-right">
                                                        <div class="card-inner">
                                                            <span class="corse-type">{{ $course->course_name }}</span>
                                                            <div class="card-img">

                                                                <img src="{{url('ui')}}/images/b3.jpg" alt="" class="img-responsive">
                                                                <div class="lessons-number text-center">
                                                                    <h1>
                                                                    <i class="fa fa-play-circle"></i>
                                                                    {{ $course->lesson()->count() }}
                                                                </h1>
                                                                </div>
                                                                <!-- /.lessons-number -->
                                                            </div>
                                                            <!-- /.card-img -->
                                                            <div class="card-data">
                                                                <div class="course_name text-right">
                                                                    <h1>
                                                                        <a href="/course/{{ $course->id }}">
                                                                            {{ $course->course_name }}
                                                                        </a>
                                                                    </h1>
                                                                </div>
                                                                <!-- /.course-name -->
                                                                <div class="course_setting text-right">
                                                                    <span class="course_date">
                                                                        <i class="fa fa-calendar"></i>
                                                                        من {{ $course->start_date }} إلى {{ $course->end_date }}
                                                                    </span>
                                                                </div>
                                                                <!-- /.course_setting -->
                                                                <div class="course_instructor-data">
                                                                    <span>
                                                                        <img 
                                                                        src="upload/usersProfile/{{$course->user()->find($course->user_id)->image}}" 
                                                                        width="70" height="70"
                                                                        class="img-responsive">
                                                                    </span>
                                                                    <a href="#">
                                                                        <i class="fa fa-user"></i>
                                                                        {{ $course->user()->find($course->user_id)->name }}
                                                                    </a>
                                                                </div>
                                                                <!-- /.course_instructor-data -->
                                                            </div>
                                                            <!-- /.card-data -->

                                                        </div>
                                                        <!-- /.card-inner -->
                                                    </div>
                                                    <!-- /.card -->
                                                        @endif
                                                    @endif
                                                    @endif
                                                    @endforeach
                                                    
                                                </div>
                                                <!-- /.type -->
                                                
                                                @endforeach
                                            </div>

                                <!-- End Coming -->

                                        </div>

                                    </div>
                                </div>
                                <!-- /.my_courses-container -->
                            </div>
                            <!-- ./home_data -->
                        </div>
                        <!-- /.home-content -->
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="my_courses">
                        <div class="home-head">
                            <h1>
                                <i class="fa fa-folder-open-o"></i>
                                دوراتي
                            </h1>
                        </div>
                        <!-- /.home-head -->
                        <div class="home-content pass-content col-xs-12">
                            <div class="home_data col-xs-12 pull-right text-right">
                                <div class="my_courses-container">
                                    <div>

                                        <!-- Nav tabs -->
                                        <ul class="nav nav-tabs" role="tablist">
                                            <li role="presentation" class="active"><a href="#currentmy" aria-controls="current" role="tab" data-toggle="tab">الدورات الحالية</a></li>
                                            <li role="presentation"><a href="#commingmy" aria-controls="comming" role="tab" data-toggle="tab">الدورات القادمة</a></li>
                                            <li role="presentation"><a href="#finishedmy" aria-controls="comming" role="tab" data-toggle="tab">الدورات المنتهية</a></li>
                                        </ul>

                                        <!-- Tab panes -->
                                        <div class="tab-content">
                                            <div role="tabpanel" class="tab-pane fade in active" id="currentmy">

                                                @if(Auth::guard('web')->user()->interests != null)
                                                @foreach(explode(' , ', Auth::guard('web')->user()->interests) as $interest)

                                                <div class="type col-xs-12">
                                                    <div class="filtered-head text-right">
                                                        <h1>
                                                        <i class="fa fa-tags"></i>
                                                        {{ $interest }}
                                                        </h1>
                                                    </div>
                                                    <!-- /.filtered-head -->

                                                    @foreach($courses as $course)

                                                    @foreach($course->users()->pluck('user_id') as $userid)

                                                    @if($userid == Auth::guard('web')->user()->id

                                                        && $interest == $course->category()->find($course->category_id)->name 
                                                        && $course->start_date < now()

                                                        )


                                                    <div class="card col-md-6 col-xs-12 pull-right">
                                                        <div class="card-inner">
                                                            <span class="corse-type">{{ $course->course_name }}</span>
                                                            <div class="card-img">

                                                                <img src="{{url('ui')}}/images/bg-4.jpg" alt="" class="img-responsive">
                                                                <div class="lessons-number text-center">
                                                                    <h1>
                                                                    <i class="fa fa-play-circle"></i>
                                                                    {{ $course->lesson()->count() }}
                                                                </h1>
                                                                </div>
                                                                <!-- /.lessons-number -->
                                                            </div>
                                                            <!-- /.card-img -->
                                                            <div class="card-data">
                                                                <div class="course_name text-right">
                                                                    <h1>
                                                                        <a href="{{ url('/coursepage/'.$course->id) }}">{{ $course->course_name }}</a>
                                                                    </h1>
                                                                </div>
                                                                <!-- /.course-name -->
                                                                <div class="course_setting text-right">
                                                                    <span class="course_date">
                                                                        <i class="fa fa-calendar"></i>
                                                                        من {{ $course->start_date }} إلى {{ $course->end_date }}
                                                                    </span>
                                                                </div>
                                                                <!-- /.course_setting -->
                                                                <div class="course_instructor-data">
                                                                    <span>
                                                                        <img src="{{url('ui')}}/images/s.png" width="70" height="70" class="img-responsive">
                                                                    </span>
                                                                    <a href="#">
                                                                        <i class="fa fa-user"></i> 
                                                                        {{$course->user()->find($course->user_id)->name}}
                                                                    </a>
                                                                </div>
                                                                <!-- /.course_instructor-data -->
                                                                <div class="corse-action">
                                                                    <a href="{{ url('/coursepage/'.$course->id) }}" class="gonna-corse">
                                                                        <i class="fa fa-paper-plane"></i> إذهب الي الدورة
                                                                    </a>
                                                                    <a href="{{ url('/courseout/'.$course->id) }}" class="out-corse">
                                                                        <i class="fa fa-sign-out"></i> إنسحاب من الدورة
                                                                    </a>
                                                                </div>
                                                                <!-- /.corse-action -->
                                                            </div>
                                                            <!-- /.card-data -->

                                                        </div>
                                                        <!-- /.card-inner -->
                                                    </div>
                                                    <!-- /.card -->
                                                    @endif
                                                    @endforeach
                                                    @endforeach

                                                </div>

                                                @endforeach
                                                @endif
                                                <!-- /.type -->
                                            </div>
                                            <!-- /#currentmy -->
                                            <div role="tabpanel" class="tab-pane fade" id="commingmy">
                                                @if(Auth::guard('web')->user()->interests != null)
                                                @foreach(explode(' , ', Auth::guard('web')->user()->interests) as $interest)

                                                <div class="type col-xs-12">
                                                    <div class="filtered-head text-right">
                                                        <h1>
                                                        <i class="fa fa-tags"></i>
                                                        {{ $interest }}
                                                        </h1>
                                                    </div>
                                                    <!-- /.filtered-head -->

                                                    @foreach($courses as $course)

                                                    @foreach($course->users()->pluck('user_id') as $userid)

                                                    @if($userid == Auth::guard('web')->user()->id

                                                        && $interest == $course->category()->find($course->category_id)->name 
                                                        && $course->start_date > now()

                                                        )


                                                    <div class="card col-md-6 col-xs-12 pull-right">
                                                        <div class="card-inner">
                                                            <span class="corse-type">{{ $course->course_name }}</span>
                                                            <div class="card-img">

                                                                <img src="{{url('ui')}}/images/bg-4.jpg" alt="" class="img-responsive">
                                                                <div class="lessons-number text-center">
                                                                    <h1>
                                                                    <i class="fa fa-play-circle"></i>
                                                                    {{ $course->lesson()->count() }}
                                                                </h1>
                                                                </div>
                                                                <!-- /.lessons-number -->
                                                            </div>
                                                            <!-- /.card-img -->
                                                            <div class="card-data">
                                                                <div class="course_name text-right">
                                                                    <h1>
                                                                        <a href="{{ url('/coursepage/'.$course->id) }}">{{ $course->course_name }}</a>
                                                                    </h1>
                                                                </div>
                                                                <!-- /.course-name -->
                                                                <div class="course_setting text-right">
                                                                    <span class="course_date">
                                                                        <i class="fa fa-calendar"></i>
                                                                        من {{ $course->start_date }} إلى {{ $course->end_date }}
                                                                    </span>
                                                                </div>
                                                                <!-- /.course_setting -->
                                                                <div class="course_instructor-data">
                                                                    <span>
                                                                        <img src="{{url('ui')}}/images/s.png" width="70" height="70" class="img-responsive">
                                                                    </span>
                                                                    <a href="#">
                                                                        <i class="fa fa-user"></i> 
                                                                        {{$course->user()->find($course->user_id)->name}}
                                                                    </a>
                                                                </div>
                                                                <!-- /.course_instructor-data -->
                                                                <div class="corse-action">
                                                                    <a href="{{ url('/coursepage/'.$course->id) }}" class="gonna-corse">
                                                                        <i class="fa fa-paper-plane"></i> إذهب الي الدورة
                                                                    </a>
                                                                    <a href="{{url('/courseout/'.$course->id)}}" class="out-corse">
                                                                        <i class="fa fa-sign-out"></i> إنسحاب من الدورة
                                                                    </a>
                                                                </div>
                                                                <!-- /.corse-action -->
                                                            </div>
                                                            <!-- /.card-data -->

                                                        </div>
                                                        <!-- /.card-inner -->
                                                    </div>
                                                    <!-- /.card -->
                                                    @endif
                                                    @endforeach
                                                    @endforeach

                                                </div>

                                                @endforeach
                                                @endif
                                                <!-- /.flash_empty -->
                                            </div>
                                            <!-- /#commingmy -->
                                            <div role="tabpanel" class="tab-pane fade" id="finishedmy">
                                                @if($fincourses->count() <= 0)
                                                <div class="flash_empty text-center">
                                                    <h1 class="animated shake">
                                                        <i class="fa fa-frown-o"></i>
                                                        عفواً لا يوجد لديك دورات في هذا القسم
                                                    </h1>
                                                </div>
                                                <!-- /.flash_empty -->
                                                @else
                                                    @foreach($fincourses as $fincourse)
                                                        <div class="card col-md-6 col-xs-12 pull-right">
                                                        <div class="card-inner">
                                                            <span class="corse-type">
                                                            {{ $fincourse->course->course_name }}</span>
                                                            <div class="card-img">

                                                                <img src="{{url('ui')}}/images/bg-4.jpg" alt="" class="img-responsive">
                                                                <div class="lessons-number text-center">
                                                                    <h1>
                                                                    <i class="fa fa-play-circle"></i>
                                                                    {{ $fincourse->course->lesson()->count() }}
                                                                </h1>
                                                                </div>
                                                                <!-- /.lessons-number -->
                                                            </div>
                                                            <!-- /.card-img -->
                                                            <div class="card-data">
                                                                <div class="course_name text-right">
                                                                    <h1>
                                                                        <a href="{{ url('/coursepage/'.$fincourse->course()->find($fincourse->course_id)->id) }}">
                                                                            {{ $fincourse->course()->find($fincourse->course_id)->course_name }}</a>
                                                                    </h1>
                                                                </div>
                                                                <!-- /.course-name -->
                                                                <div class="course_setting text-right">
                                                                    <span class="course_date">
                                                                        <i class="fa fa-calendar"></i>
                                                                        من {{ $fincourse->course->start_date }} إلى {{ $fincourse->course->end_date }}
                                                                    </span>
                                                                </div>
                                                                <!-- /.course_setting -->
                                                                <div class="course_instructor-data">
                                                                    <span>
                                                                        <img src="{{url('ui')}}/images/s.png" width="70" height="70" class="img-responsive">
                                                                    </span>
                                                                    <a href="#">
                                                                        <i class="fa fa-user"></i> 
                                                                        {{$fincourse->course->user->name}}
                                                                    </a>
                                                                </div>
                                                                <!-- /.course_instructor-data -->
                                                                <div class="corse-action">
                                                                    <a href="{{ url('/coursepage/'.$fincourse->course->id) }}" class="gonna-corse">
                                                                        <i class="fa fa-paper-plane"></i> إذهب الي الدورة
                                                                    </a>
                                                                    {{-- <a href="" class="out-corse">
                                                                        <i class="fa fa-sign-out"></i> إنسحاب من الدورة
                                                                    </a> --}}
                                                                </div>
                                                                <!-- /.corse-action -->
                                                            </div>
                                                            <!-- /.card-data -->

                                                        </div>
                                                        <!-- /.card-inner -->
                                                    </div>
                                                    <!-- /.card -->
                                                    @endforeach
                                                @endif
                                            </div>
                                            <!-- /#finishedmy -->
                                        </div>

                                    </div>
                                </div>
                                <!-- /.my_courses-container -->
                            </div>
                            <!-- ./home_data -->
                        </div>
                        <!-- /.home-content -->
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="my_certf">
                        <div class="home-head">
                            <h1>
                                <i class="fa fa-file"></i>
                                الشهادات التي حصلت عليها من انهاء الدورات
                            </h1>
                        </div>
                        <!-- /.home-head -->
                        <div class="home-content pass-content col-xs-12">
                            <div class="home_data col-xs-12 pull-right text-right">
                                <div class="home_data-item col-md-12  col-xs-12 pull-right">
                                    <div class="my-sertf">
                                        @if($certs->count() <= 0)
                                            <div class="flash_empty text-center">
                                                <h1 class="animated shake">
                                                    <i class="fa fa-frown-o"></i>
                                                    عفواً لا يوجد لديك شهادات في هذا القسم
                                                </h1>
                                            </div>
                                            <!-- /.flash_empty -->
                                        @else
                                        <ul>
                                            @foreach($certs as $cert)
                                            <li>
                                                <h1>
                                                    <i class="fa fa-file"></i>
                                                    شهادة اتمام {{ $cert->course()->find($cert->course_id)->course_name }}
                                                </h1>
                                                <a href="{{ url('/downloadcert/'.$cert->course()->find($cert->course_id)->id) }}">
                                                    <i class="fa fa-cloud-download"></i> تحميل الشهادة
                                                </a>
                                            </li>
                                            @endforeach
                                        </ul>
                                        @endif
                                    </div>
                                    <!-- end my-certf -->
                                </div>
                                <!-- /.home_data-item -->
                            </div>
                            <!-- ./home_data -->
                        </div>
                        <!-- /.home-content -->
                    </div>
                </div>
                <!-- /.tap-content -->
            </div>
            <!-- /.left_tap-box -->
        </div>
        <!-- /.left_tap-box -->
    </div>
    <!-- /.container -->
</div>
<!-- /.profile-content -->
        @if(Auth::guard('web')->user()->role == 'مدرب' || Auth::guard('web')->user()->role == 'مدرب,متدرب' )
        <div class="courses">
            <div class="container">
                <div class="courses-head text-center">
                    <h1>دوراتي للطالب</h1>
                </div>
                <!-- /.testominal-head -->
                <div class="row block-container">

                    @foreach(Auth::guard('web')->user()->course()->get()  as $course )
                    <div class="block col-md-4">
                        <figure>
                            <div>
                                @if($course->image == null) 
                                 <img src="{{ url('ui') }}/images/3lom.jpg" alt="..." >
                                @else
                                 <img src="/courses/course/{{ $course->image }} " alt="...">
                                @endif
                            </div>
                            <figcaption class="text-right">
                                <h1>
                                    <label>اسم الكورس</label>
                                    <span>{{ $course->course_name }}</span>
                                </h1>
                                <h1>
                                    <label>اسم القسم</label>
                                    <span>{{ $course->category()->find($course->category_id)->name }}</span>
                                    
                                </h1>
                                <h1>
                                     <label>عدد الطلبة المشتركة</label>
                                    <span>{{ $course->users()->count() }}</span>
                                    
                                </h1>
                                <h1>
                                    <label>تاريخ بداية الكورس</label>
                                    <span>{{ $course->start_date }}</span>
                                    
                                </h1>
                                <h1>
                                    <label>تقييم الكورس</label>
                                    <span>{{ round($course->rating()->avg('rating'),1) }}</span>
                                    
                                </h1>
                                <a href="{{ url('/coursepage/'.$course->id) }}">
                                    <i class="fa fa-eye"></i> مشاهدة الكورس
                                </a>
                            </figcaption>
                        </figure>
                    </div>
                    @endforeach
                </div>
                <!-- /.row -->

                <div class="all-courses text-center">
                    <a href="all-courses.html">عرض جميع الكورسات</a>

                </div>
                <!-- /.all-courses -->

            </div>
            <!-- /.conainer -->
        </div>
        <!-- /.courses -->
        @endif

@stop