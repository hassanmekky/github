@extends(app('adthem').'.panel')

@section('content')
<div class="content-wrapper">
        <section class="content">
        	<div class="row">
        		 <div class="col-md-11">
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">إرسال رسالة جديدة</h3>
                </div><!-- /.box-header -->
                <form action="{{ url('admin/send') }}" method="post">
                	{{ csrf_field() }}
                <div class="box-body">
                  <div class="form-group">
                    <input class="form-control" name="email" value="{{ $contact->mail }}" placeholder="إلى:">
                  </div>
                  <div class="form-group">
                    <input class="form-control" name="subject" placeholder="الموضوع:">
                  </div>
                  <div class="form-group"> 
                    <textarea id="compose-textarea" name="content" class="form-control" style="height: 300px">
                      
                    </textarea>
                  </div>
                </div><!-- /.box-body -->
                <div class="box-footer">
                  <div class="pull-right">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-envelope-o"></i> ارسال</button>
                  </div>
                  <button class="btn btn-default"><i class="fa fa-times"></i> Discard</button>
                </div><!-- /.box-footer -->
              </div><!-- /. box -->
          	</form>
            </div><!-- /.col -->
        </div>
     </div>

     </section>
</div>
@stop