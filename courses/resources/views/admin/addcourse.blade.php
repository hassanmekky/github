@extends(app('adthem').'.panel')

@section('content')
<div class="content-wrapper">
	<section class="content">

      <div class="up-container">
            <div class="up-header text-center">
                <div class="container">
                    <h1>إضافة دورة جديدة</h1>
                </div>
                <!-- /.container -->
            </div>
            <!-- /.up-header -->
            <div class="up-box">
                <div class="container">
                    <div class="up-form">

                        <form action="{{ url('admin/newcourse') }}" method="post" class="add-form" enctype="multipart/form-data">
                          {{ csrf_field() }}
                            <div class="up_form-item">
                                <h1>عنوان الدورة</h1>
                                <input type="text" name="title" placeholder="اضف عنوان الدورة">
                            </div>
                            <!-- /.up_form-item -->
                            <div class="up_form-item">
                                <h1>متطلب سابق</h1>
                                <input type="text" name="prev_know" placeholder="متطلب سابق">
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

                            <div class="up_form-item">
                                <h1>المدرس</h1>
                                
                                <select name="user_id">
                                  @foreach($users as $user)
                                    @foreach(explode(',', $user->role) as $role)
                                      @if($role == 'مدرب')
                                        <option value="{{ $user->id }}">{{ $user->all_name }}</option>
                                      @endif
                                    @endforeach
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

                                            <div class="col-xs-12">
                                               <!-- <span><i class="fa fa-video-camera"></i> ارفع فيديو من جهازك</span>-->
                                                <input type="file" name="intro_video" class="uploaded">
                                            </div>
                                            <!--
                                                                                <label class="text-right">
                                                                                    <input type="radio" id="add-link">
                                                                                    <span>يوتيوب</span>
                                                                                </label>
-->
                                        </div>

                                    </div>
                                    <!-- /.lecture-item -->
                                </div>
                                
                               <!-- <input type="text" name="intro" placeholder="ادخل رابط فيديو" class="linked">-->
                              

                            </div>
                            <!-- /.up_form-item -->
                            <div class="up_form-item">
                                <h1>وصف الدورة</h1>
                                <textarea name="description" placeholder="اضف وصف الدورة"></textarea>
                            </div>
                            <!-- /.up_form-item -->
                            <div class="up_form-item">
                                <h1>الجنس المتوقع</h1>
                                <div class="add_cont text-right">
                                    <label class="text-right">
                                        <input name="exp_gender[]" value="ذكر" type="checkbox">
                                        <span>ذكور</span>
                                    </label>
                                    <label class="text-right">
                                        <input name="exp_gender[]" value="انثي" type="checkbox">
                                        <span>إناث</span>
                                    </label>
                                </div>
                            </div>

                            <div class="up_form-item">
                                <h1>نوع الدورة</h1>
                                <div class="add_cont text-right">
                                    <label class="text-right">
                                        <input type="radio" name="price">
                                        <span>مجاني</span>
                                    </label>
                                    <label class="text-right">
                                        <input type="radio" name="price">
                                        <span>مدفوع</span>
                                    </label>
                                    <input type="number" min="1" name="course_price" data-toggle="tooltip" data-placement="top" title="اضف سعر الدورة">
                                </div>
                            </div>


                            <div class="up_form-item">
                                <h1>صورة غلاف الدورة </h1>
                                <div class="add_cont text-right">
                                    
                                    <input type="file" name="image" data-toggle="tooltip" data-placement="top" title="اضف صورة غلاف">
                                </div>
                            </div>
                            <!-- /.up_form-item -->

                            <div class="up_form-item">
                                <a class="add-cert">اضافة شهادة للدورة [اختيارى]</a>
                                <div class="">
                                    <div class="up_form-item">
                                        <h1>إسم الشهادة</h1>
                                        <input type="text" name="cert_name" placeholder="اضف اسم الشهادة">
                                    </div>
                                    <!-- /.up_form-item -->
                                    <div class="up_form-item">
                                        <h1>الجهة المانحة</h1>
                                        <input type="text" name="cert_orgnization" placeholder="اضف الجهة المانحة">
                                    </div>
                                    <!-- /.up_form-item -->
                                    <div class="up_form-item">
                                        <h1>تكلفة الشهادة</h1>
                                        <div class="add_cont text-right">
                                            <label class="text-right">
                                                <input type="radio" name="f">
                                                <span>مجاني</span>
                                            </label>
                                            <label class="text-right">
                                                <input type="radio" name="f">
                                                <span>مدفوع</span>
                                            </label>
                                            <input type="number" name="cert_price" min="1" data-toggle="tooltip" data-placement="top" title="اضف سعر الشهادة" > </div>
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

                        </div>
                        <!-- /.up-form -->
                    </div>
                    <!-- /.container -->
                </div>
                <!-- /.up-box -->
            </div>
            <!-- /.up-container -->

		
	</section>
</div>
@stop