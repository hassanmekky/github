@extends(app('adthem').'.panel')

@section('content')
<div class="content-wrapper">
    <section class="content">

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
                    <div class="">
                    	@foreach($questions as $ques)
	                        <div class="">
	                            <div class="quest text-right">
	                                <div class="quest-head">
	                                    <h1>{{ $ques->question }}</h1>
	                                    <br>
	                                </div>
	                                <!-- end quest-head -->
	                                <div class="quest-answers">
	                                	@foreach($ques->answers()->get() as $ans)
	                                    <div class="answer">
	                                        <label style="margin-bottom: 5px;">
	                                            <input type="radio" name="questions[{{$ques->id}}]" value="{{$ans->id}}" id="make-answer">
	                                            <span>{{ $ans->answer }}</span>
	                                        </label><br>
	                                    </div>
	                                    @endforeach

	                                    <!-- end answer -->
	                                </div>
	                                <!-- end quest-answers -->
	                                <div class="pull-left">
	                                <a href="{{ url('admin/addtest/'.$course->id) }}" class="btn btn-warning ">تعديل</a>
	                                <a href="{{ url('admin/addtest/'.$course->id) }}" class="btn btn-danger ">حذف</a>
	                            	</div>
	                                <br><br>
	                            </div>
	                            <!-- end quest -->
                       	    </div>
                         @endforeach
                        </div>

                     </form>
                </div>
                <a href="{{ url('admin/addtest/'.$course->id) }}" class="btn btn-primary">إضافة سؤال جديد</a>
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
    </section>
</div>

@stop