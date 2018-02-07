@extends(app('adthem').'.panel')

@section('content')

	<div class="content-wrapper">
		<section class="content">

			  <div class="container-fluid">
			    <div class="col-md-12">
			      @foreach($links as $link)
			      <div class="col-md-8" style="margin-bottom: 7px;">
			        <span class="badge badge-primary badge-pill">{{$link->name}}</span>
			          <span class="badge badge-primary badge-pill"><i class="fa fa-{{$link->name}}"></i></span>
			          <label>{{$link->url_link}}</label>
			          <a href="{{ url('admin/delete_social/'.$link->id) }}" class="btn btn-danger pull-left">حذف</a>
			      </div>
			      @endforeach
			    </div>
			    <hr>
			    <div>
			    <h2>إضافة رابط تواصل اجتماعى جديد</h2><br/>

			        <form method="POST" action="{{ url('admin/addsocial') }}" enctype="multipart/form-data">
			        {{ csrf_field() }}

			          <div class="form-group">
			            <label style="margin-bottom: 5px;">الاسم (مطابق للاسم فى مكتبة [FontAwesome])</label>
			            <input type="text" class="form-control" name="name" placeholder="الاسم" required>
			          </div>

			          <div class="form-group">
			            <label style="margin-bottom: 5px;">الرابط (URL)</label>
			            <input type="url" class="form-control" name="url_link" placeholder="الرابط" required>
			          </div>


			          <button type="submit" class="btn btn-primary">إضافة</button>
			        </form>
			      </div>
			  </div>
		

		</section>
	</div>
	
@stop