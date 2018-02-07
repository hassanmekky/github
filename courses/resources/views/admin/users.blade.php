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
                  <h3 class="box-title">المستخدمين</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>م</th>
                        <th>الاسم</th>
                        <th>الايميل</th>
                        <th>رقم الهاتف</th>
                        <th>الدولة</th>
                        <th>النوع</th>
                        <th>الاهتمامات</th>
                        <th>المسئولية</th>
                        <th>التعديلات</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                      @if($user->role == 'متدرب' || $user->role == 'مدرب,متدرب')
                      <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->all_name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->phonenumber }}</td>
                        <td>{{ $user->country }}</td>
                        <td>{{ $user->gender }}</td>
                        <td>{{ $user->interests }}</td>
                        <td>{{ $user->role }}</td>
                        <td>
                        	<a href="{{ url('/admin/deleteuser/'.$user->id) }}" class="btn btn-danger">حذف</a>
                        	<a href="{{ url('/admin/userupdate/'.$user->id) }}" class="btn btn-warning">تعديل</a>
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
                        <th>رقم الهاتف</th>
                        <th>الدولة</th>
                        <th>النوع</th>
                        <th>الاهتمامات</th>
                        <th>المسئولية</th>
                        <th>التعديلات</th>
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