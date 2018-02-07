@extends(app('adthem').'.panel')

@section('content')
<div class="content-wrapper">
	<section class="content">
		<div class="up-container">
        <div class="up-header text-center">
            <div class="container">
                <h1>تعديل بيانات المستخدم</h1>
            </div>
            <!-- /.container -->
        </div>
        <!-- /.up-header -->
        <div class="up-box">
            <div class="container">
                <div class="up-form">

                    <form action=" {{ url('admin/userupdate/'.$user->id) }} " method="POST">
                        {{ csrf_field() }}
                        <div class="up_form-item">
                            <span id="error-form">من فضلك ادخل البيانات الصحيحة</span>
                            <input type="text" name="all_name" value="{{ $user->all_name }}" placeholder="الإسم بالكامل" >
                        </div>
                        <!-- /.up_form-item -->
                        <div class="up_form-item">
                            <input type="text" name="username" value="{{ $user->name }}" placeholder="إسم المستخدم">
                        </div>
                        <!-- /.up_form-item -->
                        <div class="up_form-item">
                            <input type="email" name="email" value="{{ $user->email }}" placeholder="البريد الإلكتروني">
                        </div>
                        <!-- /.up_form-item -->
                        <div class="up_form-item">
                            <input type="password" name="password" placeholder="كلمة المرور" required>
                        </div>
                        <!-- /.up_form-item -->
                        <div class="up_form-item">
                            <input type="password" name="password2" placeholder="إعادة كلمة المرور" required>
                        </div>
                        <!-- /.up_form-item -->
                        <div class="up_form-item">
                            <input type="text" name="phonenumber" value="{{ $user->phonenumber }}" placeholder="رقم الهاتف">
                        </div>
                        <!-- /.up_form-item -->
                        <div class="up_form-item">
                            <select name="country" required>
                                <option>الدولة ...</option>
                                <option value="العراق">ام الدنيا</option>
                                <option value="لبنان">لبنان</option>
                                <option value="المغرب">المغرب</option>
                            </select>
                        </div>
                        <!-- /.up_form-item -->
                        <div class="up_form-item">
                            <select name="gender" required>
                                <option>الجنس ...</option>
                                <option value="ذكر">مذكر</option>
                                <option value="أنثي">مؤنث</option>
                            </select>
                        </div>
                        <!-- /.up_form-item -->
                        <div class="up_form-item">
                        	@if($user->role == 'مدرب')
	                            <label>
	                                <input type="checkbox" name="role[]" value="مدرب" checked>
	                                 <span>مدرب</span>
	                            </label>
	                            <label>
	                                <input type="checkbox" name="role[]" value="متدرب">
	                                <span>متدرب</span>
	                            </label>
                            @elseif($user->role == 'متدرب')
                            	<label>
	                                <input type="checkbox" name="role[]" value="مدرب">
	                                <span>مدرب</span>
	                            </label>
	                            <label>
	                                <input type="checkbox" name="role[]" value="متدرب" checked>
	                                 <span>متدرب</span>
	                            </label>
                            @else
	                            <label>
	                                <input type="checkbox" name="role[]" value="مدرب">
	                                <span>مدرب</span>
	                            </label>

	                            <label>
	                                <input type="checkbox" name="role[]" value="متدرب">
	                                <span>متدرب</span>
	                            </label>
	                        @endif
                        </div>

                        <div class="up_form-item">
                            <label>الاهتمامات</label><br>
                            @foreach($categories as $interest)
                            <label>
                                <input type="checkbox" name="interests[]" value="{{ $interest->name }}">
                                <span>{{ $interest->name }}</span>
                            </label>
                            @endforeach
                        </div>
                        <!-- /.up_form-item -->

                        <div class="policy text-right">
                            <label class="text-right policy">
                                <input type="checkbox" required>
                                <span>هل انت موافق علي سياسة الخصوصية</span>
                            </label>
                        </div>
                        <!-- /.policy -->

                        <div class="up_form-item up-confirm">
                            <input type="submit" value="تسجيل">
                        </div>
                        <!-- /.up_form-item -->
                    </form>

                     <div>
                        @if (count($errors) > 0)
                        <div class="alert alert-danger">

                            <strong>Whoops!</strong> There were some problems with your input.<br><br>

                            <ul>

                                @foreach ($errors->all() as $error)

                                    <li>{{ $error }}</li>

                                @endforeach

                            </ul>

                        </div>
                        @endif
                    </div>

                </div>
                <!-- /.up-form -->
            </div>
            <!-- /.container -->
        </div>
        <!-- /.up-box -->
    </div>
    <!-- /.up-container -->
</section>
</div>
@stop