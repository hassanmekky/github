@extends(app('design').'.master')


@section('content')
<div class="up-container">
    <div class="up-header text-center">
        <div class="container">
            <h1>نتيجة اختبار مادة {{ $course->course_name }}</h1>
        </div>
        <!-- /.container -->
    </div>
    <!-- /.up-header -->
    <div class="up-box">
        <div class="container">
            <div class="corse-comments col-xs-12">
                <div class="disqus-comments">
                    <div class="empty-msg text-center animated shake">
                        <h1>
                            
                            نتيجتك هى :  {{ $score }}/{{ $course->questions()->count() }} 
                            <i class="fa fa-commenting-o"></i>
                            <br>
                             بنسبة مئوية : % {{ round( $score/ $course->questions()->count(), 1) * 100 }}
                            <i class="fa fa-commenting-o"></i>
                        </h1>
                        
                    </div>
                </div>
                <!-- end disqus-comments -->
            </div>
        </div>

        <div class="container text-right" style="margin-bottom: 20px;"> 
            @if(round( $score/ $course->questions()->count(), 1) * 100 < 50)
                <div class="text-center" >
                    <div class="alert alert-danger" role="alert">
                      <h1>... يجب مراجعة الدورة إعادة الاختبار لتحسين النتيجة</h1>
                    </div>
                    <a class="btn btn-primary" href="{{ url('/coursepage/'.$course->id) }}">العودة للدورة</a>
                    <br>
                </div>
                @else
                <div class="text-center">
                    <div class="alert alert-success" role="alert">
                      <h1>لقد تخطيت الاختبار بنجاح شكرا جزيلا لإنهاءك هذا الدورة ...</h1>
                    </div>
                    @if( $course->cert_name != '' )
                        @if($course->cert_price == 'مجاني')
                            <a class="btn btn-primary" href="{{ url('/course-cert/'.$course->id) }}">الحصول على الشهادة</a>
                        @else
                            <a class="show-credit btn btn-primary" href="#">الحصول على الشهادة</a>
                        @endif
                    @else
                        <a class="btn btn-primary" href="{{ url('/') }}">العودة للرئيسية</a>
                    @endif
                </div>
            @endif
        </div>

    </div>
    <!-- /.up-box -->
</div>
<!-- /.up-container -->

 <div class="panel-pop modal" id="payment">
        <div>
            <h1>
                <i class="fa fa-shopping-cart"></i>
                تأكيد الحصول على شهادة الكورس
            </h1>
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active">
                    <a href="#credit-card" aria-controls="credit-card" role="tab" data-toggle="tab">
                        <i class="fa fa-credit-card"></i>Credit Card
                    </a>
                </li>
                <li role="presentation">
                    <a href="#paypal" aria-controls="paypal" role="tab" data-toggle="tab">
                        <i class="fa fa-paypal"></i> Paypal
                    </a>
                </li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade active" id="credit-card">...</div>
                <div role="tabpanel" class="tab-pane fade" id="paypal">
                    <div class="paypal-box text-center">
                        {{-- <a href="/paynow/{{ $course->id }}">تأكيد الدفع من خلال البايبال</a> --}}
                        @if(Auth::guard('web')->check())
                            {{-- <a href="../{{$course->id}}/subscribe/{{ Auth::guard('web')->user()->id }}">تأكيد الدفع من خلال البايبال
                            </a> --}}
                            <a href="/buycert/{{ $course->id }}">تأكيد الدفع من خلال البايبال</a>
                        @endif
                    </div>
                    <!-- end paypal-box -->
                </div>
            </div>

        </div>
    </div>
    <!-- /.modal -->


@stop