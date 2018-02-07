@extends(app('adthem').'.panel')

@section('content')

	<div class="content-wrapper">
		<section class="content">

			<div class="row">
			<div class="col-md-12">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">تعديل مقولة</h3>
                </div>

                <div class="form-group">
                  <form action="{{url('admin/update/'.$testmonial->id)}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                      <label>إسم : </label><br>
                      <input type="text"  name="name" value="{{ $testmonial->name }}" class="form-control">
                      <label>الصورة : </label><br>
                      <input type="file"  name="image" value="{{ $testmonial->image }}" class="form-control">
                      <label>المقولة : </label><br>
                      <textarea  name="text" class="form-control">{{ $testmonial->text }}</textarea>
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