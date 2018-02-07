 @if(session()->has('success'))
 	<div class="alert alert-success">
 		<h3>{{session()->get('success')}}</h3>
 	</div>
 @endif

 @if(session()->has('error'))
 	<div class="alert alert-danger">
 		<h3>{{session()->get('error')}}</h3>
 	</div>
 @endif