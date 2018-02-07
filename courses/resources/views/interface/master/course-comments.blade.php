@extends(app('design').'.master')


@section('content')

<div class="intro-container col-xs-12">
            <div class="intro-head text-center">
                <div class="container">
                    <h1>{{ $course->course_name }}</h1>
                </div>
                <!-- /.container -->
            </div>
            <!-- /.intro-head -->

            <div class="corse-box col-xs-12">
                <div class="corse-nav text-center">
                    <div class="container">
                        <ul>
                            <li>
                                <a href="{{ url('/coursepage/'.$course->id) }}">
                                    <i class="fa fa-tasks"></i> الدروس
                                </a>
                            </li>

                            <li>
                                <a href="{{ url('/course-comments/'.$course->id) }}" class="active">
                                    <i class="fa fa-commenting-o"></i> النقاشات
                                </a>
                            </li>

                            <li>
                                <a href="{{ url( '/course-alerts/' .$course->id ) }}.html">
                                    <i class="fa fa-bell"></i> التنويهات
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- end container -->
                </div>
                <!-- end corse-nav -->
                <div class="lesson-box text-right">
                    <div class="container">
                        <div class="comments-disqus">
                            @if($course->comment()->count() == null)
                            <div class="empty-msg text-center animated shake">
                                <h1>
                                    <i class="fa fa-frown-o"></i>
                                    لا يوجد تعليقات الان ولكن يمكنك إضافة تعليق
                                </h1>
                            </div>
                            @endif
                            <!-- end empty-msg -->
                            <div class="result">
                            
                            	@foreach($course->comment()->get() as $comment)
	                            <div class="comments text-right pull-right">
								    <div class="container">
										<div class="row">
								    		
											<div class="col-sm-11">
												<div class="panel panel-default">
													<div class="panel-heading">
													<span class="text-muted pull-left">{{ $comment->created_at }}</span><strong class="text-right">{{ $comment->user->name }}</strong> 
													</div>
														<div class="panel-body">
														{{ $comment->comment }}
														</div><!-- /panel-body -->
												</div><!-- /panel panel-default -->
											</div><!-- /col-sm-5 -->

											<div class="col-sm-1">
												<div class="thumbnail">
													<img class="img-responsive user-photo" src="https://ssl.gstatic.com/accounts/ui/avatar_2x.png">
												</div><!-- /thumbnail -->
											</div><!-- /col-sm-1 -->

										</div><!-- /row-->
									</div>
								</div>
								@endforeach
						</div>

							<!-- add Comment -->
							<div class="addcomment">
								<div class="row">
								<form class="comment-form" action="{{url('/addcomment/'. $course->id) }}" method="post">
 								{{ csrf_field() }}
								  <div class="col-lg-10 pull-right">
								    <div class="input-group">
								      <span class="input-group-btn">
								        <button class="btn btn-secondary" type="button">إضافة تعليق</button>
								      </span>
								      <input type="text" name="comtext" class="form-control comtext" placeholder=" إضافة تعليق على هذه الدورة">
								     
								    </div>
								    <div class="pull-left" style="display: inline-block; ">
								     <span>
								      <button class="btn btn-primary sendcomment"  type="submit" >تعليق</button>
								  	 </span>
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
						    </div>
                        </div>
                        <!-- end comments-disqus -->
                    </div>
                    <!-- end container -->
                </div>
                <!-- end lesson-box -->
            </div>
            <!-- end corse-box -->

        </div>
        <!-- /.intro-container -->

@stop