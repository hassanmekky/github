@extends(app('adthem').'.panel')

@section('content')
<div class="content-wrapper">
    <section class="content">

    	<div class="up-header text-center">
                <div class="container">
                    <h1>إضافة اختبار جديد</h1>
                </div>
                <!-- /.container -->
            </div>
            <!-- /.up-header -->
            <div class="up-box">
                <div class="container">
                    <div class="up-form">

                        <div class="add_lecture in-one">
                            <form action="{{ url('admin/addtest/'.$course) }}" method="post">
                                {{ csrf_field() }}
                                <div class="lecture-item">
                                    <h1>اضف السؤال</h1>
                                    <textarea name="question" placeholder="اكتب سؤالك هنا"></textarea>
                                </div>
                                <!-- end lecture-item -->

                                <div class="lecture-item">
                                    <h1>يجب عليك اختيار اجابة صحيحة واحده</h1>
                                    <ul>
                                        <li>
                                            <input type="checkbox" value="1" name="iscorrect_1">
                                            <input type="text" name="answer_1" placeholder="اكتب الاجابة الاولي">
                                        </li>
                                        <li>
                                            <input type="checkbox"  value="1" name="iscorrect_2">
                                            <input type="text" name="answer_2" placeholder="اكتب الاجابة الثانية">
                                        </li>
                                        <li>
                                            <input type="checkbox"  value="1" name="iscorrect_3">
                                            <input type="text" name="answer_3" placeholder="اكتب الاجابة الثالثة">
                                        </li>
                                        <li>
                                            <input type="checkbox"  value="1" name="iscorrect_4">
                                            <input type="text" name="answer_4" placeholder="اكتب الاجابة الاخيرة">
                                        </li>
                                    </ul>
                                </div>
                                <!-- end lecture-item -->
                                <div class="lecture-item confirm-lec">
                                    <input type="submit" value="نشر الاختبار">
                                </div>
                                <!-- end lecture-item -->
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