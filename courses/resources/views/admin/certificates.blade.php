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
                  <h3 class="box-title">الشهادات</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>اسم الطالب</th>
                        <th>اسم الشهادة</th>
                        <th>الجهة المانحة</th>
                        <th>السعر</th>
                        <th>الكورس</th>
                        <th>تاريخ الحصول</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($certs as $cert)
                      <tr>
                        <td>{{ $cert->user->all_name }}</td>
                        <td>{{ $cert->course->cert_name }}</td>
                        <td>{{ $cert->course->cert_orgnization }}</td>
                        <td>{{ $cert->course->cert_price . ' $' }}</td>
                        <td>{{ $cert->course->course_name}}</td>
                        <td>{{ $cert->created_at }}</td>                     
                      </tr>

                    @endforeach
                    </tbody>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->

            </div>


	</section>
</div>
@stop