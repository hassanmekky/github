@extends(app('design').'.master')


@section('content')

<div class="up-container">
    <div class="up-header text-center">
        <div class="container">
            <h1>مبروك لقد اتممت هذه الدورة بنجاح</h1>
        </div>
        <!-- /.container -->
    </div>
    <!-- /.up-header -->
    <div class="up-box">
        <div class="container">
            <div class="up-form certf-container">
                <div class="certficat-box text-center" id="Certification">
                    <h1>شهادة اتمام دورة {{ $course->course_name }}</h1>
                    <span>تمنح الي 
                    	@if(Auth::guard('web')->user()->gender == 'ذكر')
                    	 الطالب
                    	@else
                    	 الطالبة
                    	@endif
                    </span>
                    <h2>{{ Auth::guard('web')->user()->all_name }}</h2>
                    <h4>لإجتيازه اختبار مادة </h4>
                    <p>{{ $course->course_name }}</p>

                    <div class="admin-log">
                        <div class="cer-date">
                            تاريخ
                        </div>
                        <div class="date">
                            {{ date("F j, Y") }}
                        </div>
                    </div>
                    <div class="admin-log1">
                        <div class="cer-date">
                            توقيع
                        </div>
                        <div class="date">
                           {{ $course->user()->find($course->user_id)->name }}
                        </div>
                    </div>

                </div>
                <!-- end certificate-box -->
            </div>
            <!-- /.up-form -->
            <input type="button" onclick="printDiv('Certification')" value="print a div!" />
        </div>
        <!-- /.container -->
    </div>
    <!-- /.up-box -->
</div>
<!-- /.up-container -->


@stop


