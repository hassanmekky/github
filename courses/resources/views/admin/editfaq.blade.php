@extends(app('adthem').'.panel')

@section('content')

	<div class="content-wrapper">
		<section class="content">

			<div class="row">
			<div class="col-md-12">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">تعديل سؤال</h3>
                </div>

                <div class="form-group">
                  <form action="{{url('admin/updatefaq/'.$question->id)}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                      <label>السؤال :</label><br>
                      <input type="text"  name="question" value="{{ $question->question }}" class="form-control" required>
                      <label>الاجابة :</label><br>
                      <textarea  name="answer"  class="form-control" required>{{ $question->answer }}</textarea>
                    </div>
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary btn-flat">تعديل</button>
                    </div>
                    
                  </form>
                </div>
              </div>

            </div>
         </div>


		</section>
	</div>
	
@stop