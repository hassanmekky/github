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
                  <h3 class="box-title">الاختبارات</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>اسم الطالب</th>
                        <th>اسم الكورس</th>
                        <th>النتيجة</th>
                        <th>النسبة</th>
                        <th>تاريخ الاختبار</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($exams as $exam)
                      <tr>
                        <td>{{ $exam->user->all_name }}</td>
                        <td>{{ $exam->course->course_name }}</td>
                        <td>{{ $exam->score }}</td>
                        <td>% {{ round($exam->score/$exam->course->questions->count() , 1) * 100 }}</td>
                        <td>{{ $exam->created_at }}</td>                     
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