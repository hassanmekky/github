@extends(app('adthem').'.panel')

@section('content')
<div class="content-wrapper">
	<section class="content">

		<div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- general form elements -->
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">الاقسام</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>المسلسل</th>
                        <th>القسم</th>
                        <th>عدد الدورات</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($categories as $category)
                      <tr>
                        <td>{{$category->id}}</td>
                        <td>{{$category->name}}</td>
                        <td>{{ $category->course->count() }}</td>
                      </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>المسلسل</th>
                        <th>القسم</th>
                        <th>عدد الدورات</th>
                      </tr>
                    </tfoot>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.c

                  
              </div>
            </div>
          </div>


		 <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">اضافة قسم</h3>
                </div>

                  <div class="form-group">
                    <form action="{{url('admin/newcategory')}}" method="post">
                      {{ csrf_field() }}
                      <div class="form-group">
                        <label>أسم القسم : </label><br>
                        <input type="text"  name="name" class="form-control">
                      </div>
                      <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-flat">إضافة قسم</button>
                      </div>
                      
                    </form>
                  </div>
              </div>
            </div>
          </div>
	</section>
</div>
@stop