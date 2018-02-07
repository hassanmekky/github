@extends(app('adthem').'.panel')

@section('content')
<div class="content-wrapper">
    <section class="content">

    	<div class="up-container">
			<div class="up-header text-center">
			    <div class="container">
			        <h1>معلومات عن الموقع</h1>
			    </div>
			    <!-- /.container -->
			</div>
			<!-- /.up-header -->
			@foreach($aboutinfo as $info)
			<div class="up-box about-box" style="margin-bottom: 0;">
			    <div class="container">
			        <div class="about-img col-md-4 col-xs-12 pull-left">
			            <img src="{{ url('/basics/aboutpic/'.$info->image) }}" class="img-responsive" alt="">
			            <br><br>
			             <form action="{{ url('admin/aboutimage') }}" method="post" enctype="multipart/form-data">
			             	{{ csrf_field() }}
			            	<input name="image" type="file">
			            	<br>
			            	<input type="submit" class="btn btn-primary" value="تغيير">
			            </form>
			        </div>
			        <!-- end about-img -->
			        <div class="about-data col-md-8 col-xs-12 pull-right text-right">
			            <p>
			              {{ $info->paragraph }}
			            </p>
			            <div class="container">
						  <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo">تغيير النص</button><br>
						  <div id="demo" class="collapse">
						  	<div class="col-md-8">
						    	<form action="{{ url('admin/aboutpara') }}" method="post">
						    		{{ csrf_field() }}
						    		<textarea name="paragraph"  
						    		style="width: 90%; height: 200px; margin-bottom: 10px; display: block;" required></textarea>
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