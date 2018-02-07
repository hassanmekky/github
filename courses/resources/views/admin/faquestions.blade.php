@extends(app('adthem').'.panel')

@section('content')

	<div class="content-wrapper">
		<section class="content">

			<div class="row">
			<div class="col-md-12">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">إضافة سؤال</h3>
                </div>

                <div class="form-group">
                  <form action="{{url('admin/faquestions')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                      <label>السؤال :</label><br>
                      <input type="text"  name="question" class="form-control" required>
                      <label>الاجابة :</label><br>
                      <textarea  name="answer" class="form-control" required></textarea>
                    </div>
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary btn-flat">إضافة</button>
                    </div>
                    
                  </form>
                </div>
              </div>
              <div class="container">
              <div class="text-center">
               <div class="row">
                  <div class="col-md-10">
                    <div class="box box-solid">
                      <div class="box-header with-border">
                        <h3 class="box-title">الاسئلة الشائعة</h3>
                      </div><!-- /.box-header -->
                      <div class="box-body">
                        @foreach($questions as $question)
                        <div class="box-group" id="accordion">
                          <div class="panel box box-success">
                            <div class="box-header with-border">
                              <h4 class="box-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse_{{ $question->id }}" style="color: #000;">
                                  {{ $question->question }}
                                </a>
                              </h4>
                            </div>
                            <div id="collapse_{{ $question->id }}" class="panel-collapse collapse">
                              <div class="box-body">
                                {{ $question->answer }}
                                <hr>
                                <a href="{{url('admin/faquestions/'.$question->id.'/edit')}}" class="btn btn-warning">تعديل</a>
                                <a href="{{url('admin/deletefaq/'.$question->id)}}" class="btn btn-danger">حذف</a>
                              </div>
                            </div>
                          </div>
                        </div>
                        @endforeach
                      </div><!-- /.box-body -->
                    </div><!-- /.box -->
                  </div><!-- /.col -->
                  </div>
                </div>

            </div>
         </div>


		</section>
	</div>
	
@stop