@extends(app('design').'.master')


@section('content')

<div class="up-container">
            <div class="up-header text-center">
                <div class="container">
                    <h1>يرجي تسجيل حساب جديد</h1>
                </div>
                <!-- /.container -->
            </div>
            <!-- /.up-header -->
            <div class="up-box">
                <div class="container">
                    <div class="up-form">

                        <form action="/signup" method="POST">
                            {{ csrf_field() }}
                            <div class="up_form-item">
                                <span id="error-form">من فضلك ادخل البيانات الصحيحة</span>
                                <input type="text" name="all_name" placeholder="الإسم بالكامل">
                            </div>
                            <!-- /.up_form-item -->
                            <div class="up_form-item">
                                <input type="text" name="username" placeholder="إسم المستخدم">
                            </div>
                            <!-- /.up_form-item -->
                            <div class="up_form-item">
                                <input type="email" name="email" placeholder="البريد الإلكتروني">
                            </div>
                            <!-- /.up_form-item -->
                            <div class="up_form-item">
                                <input type="password" name="password" placeholder="كلمة المرور">
                            </div>
                            <!-- /.up_form-item -->
                            <div class="up_form-item">
                                <input type="password" name="password2" placeholder="إعادة كلمة المرور">
                            </div>
                            <!-- /.up_form-item -->
                            <div class="up_form-item">
                                <input type="text" name="phonenumber" placeholder="رقم الهاتف">
                            </div>
                            <!-- /.up_form-item -->
                            <div class="up_form-item">
                                <select name="country">
                                    <option value="مصر">الدولة ...</option>
                                    <option value="العراق">ام الدنيا</option>
                                    <option value="لبنان">لبنان</option>
                                    <option value="المغرب">المغرب</option>
                                </select>
                            </div>
                            <!-- /.up_form-item -->
                            <div class="up_form-item">
                                <select name="gender">
                                    <option>الجنس ...</option>
                                    <option value="ذكر">مذكر</option>
                                    <option value="انثي">مؤنث</option>
                                </select>
                            </div>
                            <!-- /.up_form-item -->
                            <div class="up_form-item text-right">
                                <label>
                                    <input type="checkbox" name="role[]" value="مدرب">
                                    <span>مدرب</span>
                                    <a href="trainer-privacy.html" class="show-privacy">تعرف علي سياسة الخصوصية كمدرب</a>
                                </label>
                                <label>
                                    <input type="checkbox" name="role[]" value="متدرب">
                                    <span>متدرب</span>
                                    <a href="trainer-privacy.html" class="show-privacy">تعرف علي سياسة الخصوصية كمتدرب</a>
                                </label>
                            </div>
                            <!-- /.up_form-item -->



                            <div class="policy text-right">
                                <label class="text-right policy">
                                    <input type="checkbox">
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


@stop