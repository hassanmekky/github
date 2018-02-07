@extends(app('adthem').'.panel')

@section('content')
<div class="content-wrapper">
	<section class="content">

		<div class="row">
			<div class="col-md-12">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">يرجي تجديد أسباب الرفض</h3>
                </div>

                <div class="form-group">
                <form action="{{url('admin/courserefused/'.$course->id)}}" method="post">
                  {{ csrf_field() }}
                  <div class="form-group">
                    <label>أسباب الرفض : </label><br>
                    <textarea  name="reasons" class="form-control"></textarea>
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-flat">ارسال</button>
                  </div>
                  
                </form>
                </div>
              </div>
            </div>
         </div>
	</section>
</div>

@stop