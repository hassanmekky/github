@extends(app('design').'.master')


@section('content')

<div class="allcourses-box">
            <div class="allcourses-head text-center">
                <div class="container">
                    <h1>{{ $category->name }}</h1>

                </div>
                <!-- /.container -->
            </div>
            <!-- /.allcourses-head -->
            <div class="search-categories text-center">
                <div class="container">
                    <div class="cat-item">
                        <div class="cat-inner col-md-6 col-sm-6 col-xs-6 pull-right">
	                        <a href="#" class="show-cat">إبحث بالقسم<i class="fa fa-caret-down"></i></a>
	                        <div class="hidden-cat">
	                            <ul>
	                            	@foreach(\App\Category::all() as $cat)
	                                <li>
	                                    <a href="{{ url('/category/'.$cat->id) }}">{{ $cat->name }}</a>
	                                </li>
	                                @endforeach
	                            </ul>
	                        </div>
                        </div>
                        <!-- /. cat-inner -->
                        <div class="cat-inner col-md-6 col-sm-6 col-xs-6 pull-left">
                            <form action="{{ url('/search') }}" method="get">
                				{{ csrf_field() }}

                                <input type="search" name="searchtext" placeholder="ابحث عن كورسات أخري">
                                <button type="submit">
                                    <i class="fa fa-search"></i>
                                </button>
                            </form>
                        </div>
                        <!-- /. cat-inner -->
                    </div>
                    <!-- /.cat-item -->
                </div>
                <!-- /.container -->
            </div>
            <!-- /.search-categories -->
            <div class="allcourses-body">
                <div class="container">
                    <div class="row">
                        <div class="row block-container">

                        	@if($courses->count() > 0 )

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
					                    <span>{{ round($course->rating()->avg('rating'),1) }}</span>
					                    
					                </h1>
					                        <a href="/course/{{ $course->id }}">
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
			                                    لا يوجد دورات بهذا القسم
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