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
                  <h3 class="box-title">المدربين</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>م</th>
                        <th>الاسم</th>
                        <th>الايميل</th>
                        <th>الاهتمامات</th>
                        <th>الاجراءات</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($teachers as $user)
                      @if($user->role == 'مدرب' || $user->role == 'مدرب,متدرب' )
                      <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->interests }}</td>
                        <td>
                          <center>
                        	<a href="{{ url('/admin/profile/'. $user->id) }}" class="btn btn-primary">الملف الشخصي</a>
                          @if($user->pause == 0) 
                        	   <a href="{{ url('/admin/user-pause/'.$user->id) }}" class="btn btn-warning">ايقاف مؤقت</a>
                          @else
                            <a href="{{ url('/admin/user-cancelpause/'.$user->id) }}" class="btn btn-warning">موقوف</a>
                          @endif
                          <a href="{{ url('admin/'.$user->id) }}" class="btn btn-success">الدورات</a>
                          <a href="{{ url('/admin/deleteuser/'.$user->id) }}" class="btn btn-danger">حذف</a>
                          </center>
                        </td>
                      @endif
                      </tr>

                    @endforeach
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>م</th>
                        <th>الاسم</th>
                        <th>الايميل</th>
                        <th>الاهتمامات</th>
                        <th>الاجراءات</th>
                      </tr>
                    </tfoot>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->

            </div>
            <a href=" {{ url('admin/newuser') }}" class="btn btn-lg btn-primary">إضافة عضو جديد</a>
	</section>
</div>
@stop