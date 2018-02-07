@extends(app('design').'.master')


@section('content')

<div class="up-container">
                    <div class="up-header text-center">
                        <div class="container">
                            <h1>اتصل بنا </h1>
                        </div>
                        <!-- /.container -->
                    </div>
                    <!-- /.up-header -->
                    <div class="up-box contact-box text-right">
                        <div class="container">
                            <div class="contact-form col-md-6 col-xs-12 pull-right">
                                <div class="inner">
                                    <h1>اتصل بنا </h1>
                                    <form action="/contact" method="post">
                                    	{{ csrf_field() }}
                                        <div class="contact-item">
                                            <i class="fa fa-user"></i>
                                            <input type="text" name="name" placeholder="الاسم بالكامل">
                                        </div>
                                        <!-- end contact-item -->
                                        <div class="contact-item">
                                            <i class="fa fa-envelope"></i>
                                            <input type="email" name="email" placeholder="ادخل ايميلك">
                                        </div>
                                        <!-- end contact-item -->
                                        <div class="contact-item">
                                            <i class="fa fa-comment-o"></i>
                                            <textarea name="message" placeholder="اكتب رسالتك "></textarea>
                                        </div>
                                        <!-- end contact-item -->
                                        <div class="contact-item">
                                            <input type="submit" value="إرســال">
                                        </div>
                                        <!-- end contact-item -->
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
                                <!-- end inner -->
                            </div>
                            <!-- end contact-form -->
                            <div class="FAQ col-md-6 col-xs-12 pull-left">
                                <div class="inner">
                                    <h1>الاسئلة الشائعة</h1>
                                    <div class="faq-item">
                                        @if($questions == '')
                                        <div class="empty-msg text-center animated shake">
                                            <h1><i class="fa fa-frown-o"></i>لا توجد اسئلة الان</h1>
                                        </div>
                                        <!-- end empty-msg -->
                                        @else
                                        @foreach($questions as $ques)
                                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                            <div class="panel panel-default">
                                                <div class="panel-heading" role="button" role="tab" id="headingOne" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse_{{ $ques->id }}" aria-expanded="true" aria-controls="collapseOne">
                                                    <h4 class="panel-title">
                                                    <a>
                                                        <h5>
                                                            <i class="fa fa-question-circle"></i>
                                                        </h5>
                                                      {{ $ques->question }}
                                                    </a>
                                                </h4>
                                                </div>
                                                <div id="collapse_{{ $ques->id }}" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                                    <div class="panel-body">
                                                        <p>{{ $ques->answer }}</p>
                                                    </div>
                                                    <!-- /.panel-body -->
                                                </div>
                                                <!-- /#collapseOne -->
                                            </div>
                                            <!-- /.panel-default -->
                                        @endforeach
                                        @endif
                                        </div>
                                        <!-- /.panel-group -->
                                    </div>
                                    <!-- end faq-item -->
                                </div>
                                <!-- end inner -->
                            </div>
                            <!-- end FAQ -->
                        </div>
                        <!-- /.container -->
                    </div>
                    <!-- /.up-box -->
                </div>
                <!-- /.up-container -->



@stop