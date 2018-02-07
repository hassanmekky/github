@extends(app('design').'.master')


@section('content')

<div class="up-container">
    <div class="up-header text-center">
        <div class="container">
            <h1>معلومات عن الموقع</h1>
        </div>
        <!-- /.container -->
    </div>
    <!-- /.up-header -->
    @foreach($aboutinfo as $info)
    <div class="up-box about-box">
        <div class="container">
            <div class="about-img col-md-4 col-xs-12 pull-left">
                <img src="{{ url('/basics/aboutpic/'.$info->image) }}" class="img-responsive" alt="">
            </div>
            <!-- end about-img -->
            <div class="about-data col-md-8 col-xs-12 pull-right text-right">
                <p>
                    {{ $info->paragraph }}
                </p>
            </div>
            <!-- end about-data -->
        </div>
        <!-- /.container -->
    </div>
    @endforeach
    <!-- /.up-box -->
</div>
<!-- /.up-container -->

@stop