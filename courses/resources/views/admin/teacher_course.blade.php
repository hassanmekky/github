@extends(app('adthem').'.panel')

@section('content')
<div class="content-wrapper">
	<section class="content">
		
		<div class="row">

		@foreach($courses as $course)
		
        
		  <div class="col-sm-6 col-md-4">
		    <div class="thumbnail">
		    	@if($course->image == null)	
		     	 <img src="{{ url('ui') }}/images/3lom.jpg" alt="..." style="width:400px; height:150px;">
		      	@else
		      	 <img src="/courses/course/{{ $course->image }} " alt="..." style="width:400px; height:150px;">
		      	@endif
		      <div class="caption" style="height: 160px;">
		        <h4><center>دورة {{ $course->course_name }}</center></h4><br>
		        <p><label><strong>القسم : </strong>{{ $course->category()->find($course->category_id)->name }}</label></p>
		        <p><label><strong>بواسطة : </strong>{{ $course->user()->find($course->user_id)->name }}</label></p>
		        <p>{{ $course->course_price }}</p>
		        <p class="text-left"><a href="/admin/course/{{ $course->id }}" class="btn btn-primary" role="button">المزيد</a></p>
		      </div>
		      <hr>
		      <div><center>
		      	<a href="/admin/{{ $course->id }}/publish" class="btn btn-success" role="button">الموافقة على النشر</a>
		      	<a href="/admin/{{ $course->id }}/delete" class="btn btn-danger" role="button">حذف</a>
		      	<a href="/admin/{{ $course->id }}/pause" class="btn btn-warning" role="button">ايقاف مؤقت</a>
		      </center>
		      </div>
		    </div>
		  </div>
		

        @endforeach
        </div>
	</section>
</div>
@stop