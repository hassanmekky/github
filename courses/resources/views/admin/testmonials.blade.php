@extends(app('adthem').'.panel')

@section('content')

	<div class="content-wrapper">
		<section class="content">

			<div class="row">
			<div class="col-md-12">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">إضافة مقولة</h3>
                </div>

                <div class="form-group">
                  <form action="{{url('admin/testmon')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                      <label>إسم : </label><br>
                      <input type="text"  name="name" class="form-control">
                      <label>الصورة : </label><br>
                      <input type="file"  name="image" class="form-control">
                      <label>المقولة : </label><br>
                      <textarea  name="text" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary btn-flat">إضافة</button>
                    </div>
                    
                  </form>
                </div>
              </div>
              <div class="container">
              <div class="text-center">
                @foreach($testmons as $test)

                <div class="testo-item text-center col-xs-11">
                    <p>{{ $test->text }}</p>
                    <div class="testo-img">
                        <img src="\basics\testmonials\{{ $test->image }}" alt="" class="img-responsive">
                    </div>
                    <!-- /.testo-img -->
                    <h1>{{ $test->name }}</h1><br>
                    <a href="{{ url('admin/update/'.$test->id) }}" class="btn btn-warning">تعديل</a>
                    <a href="{{ url('admin/delete/'.$test->id) }}" class="btn btn-danger">حذف</a>
                    <hr>
                    <!-- /.testo-img -->
                </div>
                <!-- /.testo-item -->
                <hr>

              @endforeach
            </div>
          </div>

            </div>
         </div>


		</section>
	</div>
	
@stop