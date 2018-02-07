@extends(app('design').'.master')


@section('content')

 <div class="search-box">
    <div class="container">
        <div class="search-inner">
            <h1 class="text-center">تستطيع من خلال موقعنا البحث  عن كل ما تريد من كورسات </h1>
            <form action="{{ url('/search') }}" method="get">
                {{ csrf_field() }}
                <div class="form-item col-xs-12">
                    <div class="input-container col-md-10 col-xs-12 input-lft pull-right">
                        <input type="text" name="searchtext" value="" placeholder="ابحث عن جميع الكورسات من هنا">
                    </div>
                    <!-- /.input-container -->
                    <div class="btn-container col-md-1 btn-right">
                        <a class="show-advanced">
                    بحث متقدم
                </a>
                    </div>
                    <!-- end btn-container -->
                    <div class="btn-container col-md-1">
                        <button type="submit">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                    <!-- end btn-container -->
                </div>
            </form>
                <!-- /.form-item -->
                <div class="form-advanced col-xs-12 adv-left">
                    <div class="advanced-item col-md-3 col-xs-12 pull-right">
                        <h2>ابحث بإسم الكورس</h2>
                        <input type="text" name="coursename" 'placeholder="ابحث بإسم الكورس"'>
                    </div>
                    <!-- /.advanced-item -->
                    <div class="advanced-item col-md-3 col-xs-12 pull-right">
                        <h2>ابحث بأسم المدرس</h2>
                        <input type="text" name="courseteacher" 'placeholder="ابحث بإسم المدرس"'>
                    </div>
                    <!-- /.advanced-item -->
                    <div class="advanced-item col-md-3 col-xs-12 pull-right">
                        <h2>ابحث بنوع  الكورس</h2>
                        <input type="text" name="coursetype" 'placeholder="ابحث بنوع الكورس (مدفوع أو مجانى)"'>
                    </div>
                    <!-- /.advanced-item -->
                    <div class="advanced-item col-md-3 col-xs-12 adv-right pull-right">
                        <h2>ابحث بسعر الكورس</h2>

                        <input placeholder="من" type="number" name="from" class="pull-right price-from" data-toggle="tooltip" data-placement="top" title="مـن">
                        <input placeholder="إلي" type="number" name="to" class="price-to" data-toggle="tooltip" data-placement="top" title="إلـي">
                       {{--  <div class="text-right price-spec">
                            <label id="ko">
                                <input type="checkbox" class="price-free"> مجاني
                            </lasbel>
                        </div> --}}
                    </div>
                    <!-- /.advanced-item -->
                </div>
                <!-- /.form-advanced -->
        </div>
        <!-- /.search-inner -->
    </div>
    <!-- /.container -->
</div>
<!-- /.search-box -->

<div class="courses">
    <div class="container">
        <div class="courses-head text-center">
            <h1>أحدث الكورسات</h1>
        </div>
        <!-- /.testominal-head -->
        <div class="row block-container">

            @foreach($courses as $course)

            <div class="block col-md-4 col-sm-6">
                <figure>
                    <div>
                        @if($course->image == null) 
                         <img src="{{ url('ui') }}/images/3lom.jpg" alt="..." >
                        @else
                         <img src="/courses/course/{{ $course->image }} " alt="...">
                        @endif
                    </div>
                    <figcaption class="text-right">
                        <h1>
                    <label>اسم الكورس</label>
                    <span>{{ $course->course_name }}</span>
                </h1>
                        <h1>
                    <label>اسم المدرس</label>
                    <span>{{ $course->user()->find($course->user_id)->name }}</span>
                    
                </h1>
                        <h1>
                     <label>عدد الطلبة المشتركة</label>
                    <span>{{ $course->users()->count() }}</span>
                    
                </h1>
                        <h1>
                    <label>تاريخ بداية الكورس</label>
                    <span>{{ $course->start_date }}</span>
                    
                </h1>
                        <h1>
                    <label>تقييم الكورس</label>
                    <span>{{ round($course->rating()->avg('rating'),1) }}</span>
                    
                </h1>
                        <a href="/course/{{ $course->id }}">
                            <i class="fa fa-eye"></i> مشاهدة الكورس
                        </a>
                    </figcaption>
                </figure>
            </div>
            <!-- /.block -->

            @endforeach

            
        </div>
        <!-- /.row -->

        <div class="all-courses text-center">
            <a href="{{ url('/allcourses') }}">عرض جميع الكورسات</a>
        </div>
        <!-- /.all-courses -->
        
    </div>
    <!-- /.conainer -->
</div>
<!-- /.courses -->

<div class="testominal">
    <div class="overlay"></div>
    <div class="container">
        <div class="testo-head text-center">
            <h1>قالوا عنا</h1>
        </div>
        <!-- /.testominal-head -->
        <div class="testo-slider text-center">

            @foreach($testmons as $test)

            <div class="testo-item col-xs-12">
                <p>{{ $test->text }}</p>
                <div class="testo-img">
                    <img src="\basics\testmonials\{{ $test->image }}" alt="" class="img-responsive">
                </div>
                <!-- /.testo-img -->
                <h1>{{ $test->name }}</h1>
                <!-- /.testo-img -->
            </div>
            <!-- /.testo-item -->

            @endforeach
        </div>
        <!-- /. testo-slider -->
    </div>
    <!-- /.container -->
</div>
<!-- /.testominal -->

@stop