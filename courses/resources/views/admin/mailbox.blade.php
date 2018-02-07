@extends(app('adthem').'.panel')

@section('content')
<div class="content-wrapper">
        <section class="content">
        	<div class="row">
        		<div class="col-md-11">
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">الوارد</h3>
                </div><!-- /.box-header -->
                <div class="box-body no-padding">
                  <div class="mailbox-controls">
                    <!-- Check all button -->
                    <div class="btn-group">
                      <button class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i></button>
                      <button class="btn btn-default btn-sm"><i class="fa fa-reply"></i></button>
                      <button class="btn btn-default btn-sm"><i class="fa fa-share"></i></button>
                    </div><!-- /.btn-group -->
                    <div class="pull-right">
                      
                    </div>
                      <div class="btn-group">
                        <button class="btn btn-default btn-sm"><i class="fa fa-chevron-right"></i></button>
                        <button class="btn btn-default btn-sm"><i class="fa fa-chevron-left"></i></button>
                      </div><!-- /.btn-group -->
                    </div><!-- /.pull-right -->
                  </div>
                  <div class="table-responsive mailbox-messages">
                    <table class="table table-hover table-striped">
                      <tbody>
                      	@foreach($mails as $mail)
                        <tr>
                          <td><input type="checkbox"></td>
                          <td class="mailbox-name">{{ $mail->name }}</td>
                          <td class="mailbox-subject"><b>{{ $mail->message }}</b></td>
                          <td class="mailbox-attachment">{{ $mail->mail }}</td>
                          <td class="mailbox-attachment"><a href="{{ url('admin/compose/'.$mail->id) }}" class="btn btn-primary"> ارسال رد </a></td>
                          <td class="mailbox-date">{{ $mail->created_at }}</td>
                        </tr>
                       @endforeach
                      </tbody>
                    </table><!-- /.table -->
                  </div><!-- /.mail-box-messages -->
                </div><!-- /.box-body -->
              </div><!-- /. box -->
            </div><!-- /.col -->
        </div>

     </section>
</div>
@stop