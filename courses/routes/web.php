<?php


app()->singleton('adthem', function(){
	return 'admin';
});
app()->singleton('design', function(){
	return 'interface.master'; 
});

Route::group(['middleware' => ['web']], function () {

	Route::get('admin/login','AdminController@login');
	Route::post('admin/login','AdminController@post_login');

	Route::group([ 'prefix' => 'admin' ], function (){
	

		    Route::group(['middleware'=>'auth_admin'],function() {
				Route::get('/logout','AdminController@logout');
				Route::get('/','AdminController@index');

				// social

				Route::get('/social','SettingsController@social');
				Route::get('/delete_social/{social}','SettingsController@delete_social');
				Route::post('/addsocial','SettingsController@addsocial');

				// settings

				Route::get('/settings','SettingsController@settings');
				Route::post('/changelogo','SettingsController@changelogo');
				Route::post('/sitename','SettingsController@change_site_name');

				// faquestions

				Route::resource('faquestions' , 'FAQuestionsController');

				Route::get('/users','AdUsersController@users');
				Route::get('/newuser','AdUsersController@newuser');
				Route::get('/deleteuser/{user}','AdUsersController@deleteuser');
				Route::get('/userupdate/{user}','AdUsersController@userupdate');
				Route::get('/user-pause/{user}','AdUsersController@userpause');
				Route::get('/user-cancelpause/{user}','AdUsersController@canceluserpause');
				Route::post('/userupdate/{user}','AdUsersController@storeupdate');
				Route::post('/newuser','AdUsersController@store');

				Route::get('/courses','AdCoursesController@courses');
				Route::get('/newcourse','AdCoursesController@newcourse');
				Route::post('/newcourse','AdCoursesController@store');
				Route::get('/addtest/{course}','AdCoursesController@addtest');
				Route::post('/addtest/{course}','AdCoursesController@storetest');
				Route::get('/testshow/{course}','AdCoursesController@showtest');
			
				Route::get('/categories','AdCategoriesController@categories');
				Route::post('/newcategory','AdCategoriesController@store');

				Route::get('/teachers','TeachersController@teachers');

				Route::get('/testmonials','TestmonialsController@show');
				Route::post('/testmon','TestmonialsController@store');
			
				Route::get('/profile/{user}','AdminController@profile');
				Route::get('/deletefaq/{question}','AdminController@delete_faq');
				Route::post('/updatefaq/{question}','AdminController@update_faq');

				Route::get('/certificates','AdminController@showcert');

				Route::get('/exams','AdminController@showexams');

				Route::get('/about','AdminController@showabout');

				Route::post('/aboutimage','AdminController@change_about_image');
				Route::post('/aboutpara','AdminController@change_about_para');

				Route::get('/contact','AdContactController@showmails');
				Route::get('/compose/{contact}','AdContactController@compose');
				Route::post('/send','AdContactController@send');

				Route::get('/{teacher}','TeachersController@teacher_courses');

				Route::get('course/{course}','AdCoursesController@course');

				Route::get('/{course}/courserefused','AdCoursesController@courserefused');
				Route::post('courserefused/{course}','AdCoursesController@refusedstore');
				Route::get('/{course}/removerefused','AdCoursesController@removerefused');

				// testmonials

				Route::get('/delete/{testmonial}','TestmonialsController@delete');
				Route::get('/update/{testmonial}','TestmonialsController@update');
				Route::post('/update/{testmonial}','TestmonialsController@postupdate');

				Route::get('addlecture/{course}','AdLecturesController@addlecture');

				Route::post('addlecture/{course}','AdLecturesController@storelecture');

				// courses

				Route::get('{course}/delete','AdCoursesController@delete');

				Route::get('{course}/update','AdCoursesController@update');

				Route::post('/editcourse/{course}','AdCoursesController@postupdate');

				Route::get('{course}/publish','AdCoursesController@publish');

				// settings


				
			});
		
	});

	// user Interface
		Route::get('/','HomeController@index');
		Route::get('/about','HomeController@about');
		Route::get('/privacy','HomeController@privacy');

		Route::get('/contact','RegisterController@contact');
		Route::post('/contact','RegisterController@storecontact');

		Route::get('/signup','RegisterController@register');
		Route::post('/signup','RegisterController@store');

		Route::get('/login','SessionsController@login_get')->name('login');

		Route::post('/login','SessionsController@login_post');

		Route::get('/logout', 'SessionsController@logout');

		Route::get('/allcourses', 'CoursesController@allcourses');

		Route::get('/search','SearchController@search');

		Route::get('/category/{category}','SearchController@catresult');

		Route::get('course/{course}','CoursesController@course_intro');

		Route::group(['middleware' => ['auth:web']], function () {

			Route::get('/profile','HomeController@profile');

			Route::get('/addcourse','CoursesController@addcourse');
			Route::post('/addcourse/{user}','CoursesController@store');
			Route::get('/updatecourse/{course}','CoursesController@updatecourse');
			Route::post('/updatecourse/{course}','CoursesController@postupdate');

			Route::post('userupdate/{user}','RegisterController@updateuser');

			Route::post('addlecture/{course}','LecturesController@storelecture');

			Route::get('{lesson}/finish/{user}','LecturesController@finish');

			Route::get('/lesson/{lesson}','LecturesController@lesson');

			Route::get('{course}/delete','CoursesController@delete');

			Route::post('/addcv/{user}','RegisterController@addcv');

			Route::post('/resetpassword','RegisterController@resetpass');

			Route::post('/newinterests/{user}','RegisterController@newinterests');

			Route::get('/deleteinterest/{user}/{interest}','RegisterController@deleteinterest');

			Route::get('{course}/subscribe/{user}','CoursesController@subscribe');
			Route::get('paynow/{course}','CoursesController@payNow');
			Route::get('/getdone/{course}','CoursesController@getDone');
			Route::get('/getcancel','CoursesController@getCancel');

			Route::get('/withdraw/{user}','RegisterController@withdraw');

			Route::get('courseout/{course}','CoursesController@courseout');

			Route::get('/coursepage/{course}','CoursesController@coursepage');

			Route::get('/course-alerts/{course}','CoursesController@coursealerts');

			Route::get('/course-comments/{course}','CoursesController@coursecomments');

			Route::post('{course}/rating/{user}','CoursesController@rate');

			Route::get('/course-comments/{course}','CoursesController@coursecomments');

			Route::post('/addcomment/{course}','CommentsController@addcomment');


			Route::get('/addquiz/{course}','CoursesController@addquiz');

			Route::post('/addques/{course}','Quizzes@addques');

			Route::get('/testshow/{course}','Quizzes@testshow');
			Route::get('/teachtest/{course}','Quizzes@teach_test');

			Route::post('/testresult/{course}','Quizzes@testresult');

			Route::post('addalert/course/{course}','NotificationsController@addalert');

			Route::post('sendall/course/{course}','NotificationsController@sendall');

			Route::get('/markAllSeen','NotificationsController@seenAll');

			Route::get('/course-cert/{course}','CertificatesController@certificate');

			Route::get('buycert/{course}','CertificatesController@buycert');
			Route::get('/certgetdone/{course}','CertificatesController@certgetdone');
			Route::get('/certgetcancel','CertificatesController@certgetcancel');

			Route::get('downloadcert/{course}','CertificatesController@downloadcert');

	 });


});