@extends(app('adthem').'.panel')

@section('content')
<div class="content-wrapper">
	<section class="content">

		<div class="row">
            <!-- left column -->
            <div class="col-md-8">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">اضافة دورة</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form">
                  <div class="box-body">
                    <div class="form-group">
                      <label >اسم الدورة</label>
                      <input type="text" class="form-control"  placeholder="اضف عنوان الدورة">
                    </div>
                    <div class="form-group">
                      <label >متطلب سابق</label>
                      <input type="text" class="form-control"  placeholder="متطلب سابق">
                    </div>
                    <div class="form-group">
                      <label >المجال</label>
                      <select class="form-control">
                        <option>علوم حاسب</option>
                        <option>علوم حاسب</option>
                        <option>علوم حاسب</option>
                        <option>علوم حاسب</option>
                      </select>
                    </div>

                    <div class="up_form-item">
                        <label>رابط فيديو</label>
                        <div class="form-group">
                            <div class="form-group">
                                <div class="form-group" style="margin-right: 15px;">
                                    <label class="checkbox">
                                        <input type="checkbox" id="up-video" >
                                        <span>اذا أردت رفع فيديو من جهازك الشخصي</span>
                                    </label>

                                    <div class="form-group">
                                        <span> ارفع فيديو من جهازك  <i class="fa fa-video-camera"></i></span>
                                        <input type="file" class="form-control">
                                    </div>
                                    <input type="text" placeholder="ادخل رابط فيديو" class="form-control">
                                </div>

                            </div>     <!-- /.lecture-item -->
                        </div>
                    </div>

                  
                  <div class="form-group">
                     <label >وصف الدورة </label>
                     <textarea  class="form-control"  placeholder="وصف الدورة "></textarea>
                   </div>

                   <div class="form-group" style="margin-right: 15px;">
	                    <label>الجنس المتوقع</label>
	                    <div class="form-group">
	                        <label class="checkbox">
	                            <input type="checkbox" >
	                            <span>ذكور</span>
	                        </label>
	                        <label class="checkbox">
	                            <input type="checkbox">
	                            <span>إناث</span>
	                        </label>
	                    </div>
	                </div>

	                <div class="up_form-item">
	                    <label>نوع الدورة</label>
	                    <div class="add_cont text-right">
	                        <label class="text-right">
	                            <input type="radio" name="f">
	                            <span>مجاني</span>
	                        </label>
	                        <label class="text-right">
	                            <input type="radio" name="f">
	                            <span>مدفوع</span>
	                        </label>
	                        <input type="number" data-toggle="tooltip" data-placement="top" title="اضف سعر الدورة">
	                    </div>
	                </div>

	                <div class="form-group">
                                <a class="btn btn-success">اضافة شهادة للدورة</a>
                                <div class="form-group">
                                    <div class="form-group">
                                        <label>إسم الشهادة</label>
                                        <input type="text" class="form-control" placeholder="اضف اسم الشهادة">
                                    </div>
                                    <!-- /.up_form-item -->
                                    <div class="form-group">
                                        <label>الجهة المانحة</label>
                                        <input type="text" class="form-control" placeholder="اضف الجهة المانحة">
                                    </div>
                                    <!-- /.up_form-item -->
                                    <div class="form-group">
                                        <label>تكلفة الشهادة</label>
                                        <div class="form-group">
                                            <label >
                                                <input type="radio" name="f">
                                                <span>مجاني</span>
                                            </label>
                                            <label >
                                                <input type="radio" name="f">
                                                <span>مدفوع</span>
                                            </label>
                                            <input type="number" data-toggle="tooltip" data-placement="top" title="اضف سعر الشهادة" </div>
                                        </div>
                                        <!-- /.up_form-item -->
                                    </div>
                                    <!-- /.course-cert -->
                                </div>
                                <!-- /.up_form-item -->

                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>





                </form>
              </div><!-- /.box -->
          </div>
      </div>
	</section>
</div>
@stop