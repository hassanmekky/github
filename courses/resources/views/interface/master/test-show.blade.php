@extends(app('design').'.master')


@section('content')
<div class="up-container">
    <div class="up-header text-center">
        <div class="container">
            <h1>{{ $course->course_name }}</h1>
        </div>
        <!-- /.container -->
    </div>
    <!-- /.up-header -->
    <div class="up-box">
        <div class="container">
            <div class="up-form">
                <div id="tabsleft" class="tabbable tabs-left">
                    <ul>
                    	@for($i = 1; $i <= $questions->count() ;$i++)
                        <li><a href="#tabsleft-tab{{ $i }}" data-toggle="tab">الخطوة {{ $i }}</a></li>
                        @endfor
                        
                    </ul>
                    <div id="bar" class="progress progress-info progress-striped">
                        <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>
                    </div>
                    <form action="{{ url('/testresult/'.$course->id) }}" method="post">
                        {{ csrf_field() }}
                    <div class="tab-content">
                    	<?php $r = 1; ?>
                    	@foreach($questions as $ques)
	                        <div class="tab-pane" id="tabsleft-tab{{ $r++ }}">
	                            <div class="quest text-right">
	                                <div class="quest-head">
	                                    <h1>{{ $ques->question }}</h1>
	                                </div>
	                                <!-- end quest-head -->
	                                <div class="quest-answers">
	                                	@foreach($ques->answers()->get() as $ans)
	                                    <div class="answer">
	                                        <label>
	                                            <input type="radio" name="questions[{{$ques->id}}]" value="{{$ans->id}}" id="make-answer">
	                                            <span>{{ $ans->answer }}</span>
	                                        </label>
	                                    </div>
	                                    @endforeach
	                                    <!-- end answer -->
	                                </div>
	                                <!-- end quest-answers -->
	                            </div>
	                            <!-- end quest -->
                       	    </div>
                         @endforeach
                        </div>

                        <ul class="pager wizard">
                            <!--                        <li class="previous first"><a href="javascript:;">First</a></li>-->
                            <li class="previous"><a href="javascript:;">الخطوة السابقة</a></li>
                            <!--                        <li class="next last"><a href="javascript:;">Last</a></li>-->
                            <li class="next"><a href="javascript:;">الخطوة التالية</a></li>
                            <li class="next finish" style="display:none;"><a href="javascript:;"><button type="submit">انهاء</button></a></li>
                        </ul>
                    </div>
                    </form>
                </div>
            </div>
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
            <!-- /.up-form -->
        </div>
        <!-- /.container -->
    </div>
    <!-- /.up-box -->
</div>
<!-- /.up-container -->


@stop