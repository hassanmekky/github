@extends(app('design').'.master')


@section('content')
<div class="allcourses-box">
    <div class="allcourses-head text-center">
        <div class="container">
            <h1>نتيجة البحث</h1>

        </div>
        <!-- /.container -->
    </div>

	 <div class="allcourses-body">
	    <div class="container">
	                    <div class="row">
	                        <div class="row block-container">

	                           @if($courses->count() > 0)

	                           @foreach($courses as $course)

					            <div class="block col-md-4 col-sm-6">
					                <figure>
					                    <div>
					                        @if($course->image == null) 
					                         <img src="{{ url('ui') }}/images/3lom.jpg" alt="..." >
					                        @else
					                         <img src="/courses/course/{{ $course->image }} " alt="...">
					                        @endif
					                    </div>
					                    <figcaption class="text-right">
					                    <h1>
							                <label>اسم الكورس</label>
							                <span>{{ $course->course_name }}</span>
					               		</h1>
					                    <h1>
						                    <label>اسم المدرس</label>
						                    <span>{{ $course->user()->find($course->user_id)->name }}</span>
					               		</h1>
					                    <h1>
						                    <label>عدد الطلبة المشتركة</label>
						                    <span>{{ $course->users()->count() }}</span>
					                    
					                	</h1>
					                    <h1>
						                    <label>تاريخ بداية الكورس</label>
						                    <span>{{ $course->start_date }}</span>
					                    
					                	</h1>
					                    <h1>
						                    <label>تقييم الكورس</label>
						                    <span>جيد</span>
					                    
					                    </h1>
					                        <a href="{{ url('/course/'. $course->id) }}">
					                            <i class="fa fa-eye"></i> مشاهدة الكورس
					                        </a>
					                    </figcaption>
					                </figure>
					            </div>
					            <!-- /.block -->

            					@endforeach

            					@else

            					<div class="lesson-box text-right">
                    				<div class="container">
		            					 <div class="comments-disqus">
				                            <div class="empty-msg text-center animated shake">
				                                <h1>
				                                    <i class="fa fa-frown-o"></i>
				                                    لا يوجد نتائج بحث بهذا الاسم حاول مرة أخرى 
				                                </h1>
				                            </div>
				                            <!-- end empty-msg -->
				                        </div>
				                    </div>
				                </div>

				                @endif
	                       
	                        </div>
	                        <!-- /.row -->
	                    </div>
	                    <!-- /.row -->

	                    <div class="inner col-xs-12 text-center">
	                        <ul class="pagination">
	                           {{ $courses->links() }}
	                        </ul>
	                    </div> 
	                    <!-- end inner -->

        </div>
        <!-- /.container -->
    </div>
    <!-- /.allcourses-body -->
</div>
<!-- /.allcourses-box -->
@stop