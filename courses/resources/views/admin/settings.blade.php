@extends(app('adthem').'.panel')

@section('content')
<div class="content-wrapper">
    <section class="content">

    	<div class="up-container">
			<div class="up-header text-center">
			    <div class="container">
			        <h1>الضبط</h1>
			    </div>
			    <!-- /.container -->
			</div>
			<!-- /.up-header -->
			@foreach($settings as $setting)
			<div class="up-box about-box" style="margin-bottom: 0;">
			    <div class="container">
			        <div class="about-img col-md-12 col-xs-12 pull-right">
			        	<h1 style="margin: 10px;">لوجو الموقع</h1>
			            <img src="{{ url('/basics/logo/'.$setting->logo) }}" class="img-responsive" width="150px" height="150px" alt="">
			            <br><br>
			             <form action="{{ url('admin/changelogo') }}" method="post" enctype="multipart/form-data">
			             	{{ csrf_field() }}
			            	<input name="logo" type="file">
			            	<br>
			            	<input type="submit" class="btn btn-primary" value="تغيير">
			            </form>
			        </div>
			        <!-- end about-img -->
			        <div class="about-data col-md-12 col-xs-12 pull-right text-right" style="margin-top: 20px;">
			        	<h1 style="margin: 5px;">إسم الموقع</h1>
			            <h2 style="margin: 5px;">
			              {{ $setting->site_name }}
			            </h2>
			            <div class="container">
						  <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo">تغيير النص</button><br>
						  <div id="demo" class="collapse">
						  	<div class="col-md-8">
						    	<form action="{{ url('admin/sitename') }}" method="post">
						    		{{ csrf_field() }}
						    		<input type="text" name="site_name" class="form-control" style="margin: 5px;" required>
						    		<input type="submit" class="btn btn-primary" value="حفظ">
						    	</form>
							</div>
						  </div>
						</div>
			        </div>
			        <!-- end about-data -->
			    </div>
			    <!-- /.container -->
			</div>
			@endforeach
			<!-- /.up-box -->
			
		</div>
			<!-- /.up-container -->


    </section>
</div>

@stop