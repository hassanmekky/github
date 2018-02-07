@extends(app('adthem').'.panel')

@section('content')
<div class="content-wrapper">
    <section class="content">

    	<div class="up-container">
            <div class="up-header text-center">
                <div class="container">
                    <h1>إضافة محاضرة جديدة</h1>
                </div>
                <!-- /.container -->
            </div>
            <!-- /.up-header -->
            <div class="up-box">
                <div class="container">
                    <div class="up-form">

                        <div class="add_lecture in-one">
                            <form action="{{url()->current()}}" method="post" enctype="multipart/form-data" >
                            	{{ csrf_field() }}
                                <div class="lecture-item">
                                    <h1>اسم الدرس</h1>
                                    <input type="text" name="lesson_name" placeholder="اضف اسم المحاضرة">
                                </div>
                                <!-- /.lecture-item -->
                                <div class="lecture-item">
                                    <h1>اضف رابط خارجي للفيديو</h1>
                                    <div class="add_cont text-right">
                                        <label class="text-right">
                                            <input type="checkbox" id="up-video">
                                            <span>اذا أردت رفع فيديو من جهازك الشخصي</span>
                                        </label>

                                        <div class=" col-xs-12 text-right">
                                        	<br>
                                            <input type="file" name="lesson_video" class="uploaded">
                                            <br>
                                        </div>
                                       
                                    </div>
                                    <input type="text" placeholder="ادخل رابط فيديو" class="linked">
                                </div>
                                <!-- /.lecture-item -->
                                <div class="lecture-item">
                                    <h1>اسم الدرس</h1>
                                    <textarea name="description" placeholder="اضف وصف المحاضرة"></textarea>
                                </div>
                                <!-- /.lecture-item -->
                                <div class="lecture-item text-right">
                                    <div class="fileUpload col-xs-12 text-right">
                                        <span><i class="fa fa-file"></i> رابط أوراق العمل </span>
                                        <input type="file" name="lesson_files" class="upload">
                                    </div>
                                    <span class="hint"> الملفات يمكن ان تكون Image او Word او Powerpoint او Pdf  </span>
                                </div>
                                <div class="lecture-item add-sorting">
                                    <label>
                                        <input type="checkbox" id="sort-lesson">
                                        <span style="color: black;">يجب تحديد ترتيب الدرس </span>
                                        <input type="number"  title="اكتب ترتيب الدرس بالأرقام" name="order" min="0" class="add_sort-number">
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