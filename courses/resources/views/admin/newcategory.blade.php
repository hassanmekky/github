@extends(app('adthem').'.panel')

@section('content')
<div class="content-wrapper">
	<section class="content">

    <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">اضافة قسم</h3>
                </div>

                  <div class="form-group">
                    <form action="" method="post">
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