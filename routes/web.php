<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home',["title" => "Home"]);
});

Route::get('/home', function () {
    return view('home',["title" => "Home"]);
});

Route::get('/login', 'Auth\AuthController@indexLogin')->name('login');
Route::post('/login', 'Auth\AuthController@login');

Route::get('/register', 'Auth\AuthController@indexRegister');
Route::post('/register', 'Auth\AuthController@register');

/** Google Login **/
Route::get('/google-login', 'Auth\Providers\GoogleProviderController@login');
Route::get('/auth-callback', 'Auth\Providers\GoogleProviderController@handleCallback');

Route::post('/logout', 'Auth\AuthController@logout');

/* Profile */
Route::get('/profil', 'ProfileController@index');
Route::put('/profil', 'ProfileController@update');
Route::put('/profil/small-update', 'ProfileController@updateSmall');

/* Admin Route */
Route::prefix('/admin')->group(function(){

    /* Vocab Route */
    Route::get('/main', 'Admin\Dashboard\DashboardController@index');
    Route::resource('/vocabulary', 'Admin\Vocabulary\VocabularyController')->except(['show']);
    Route::resource('/vocabulary/category', 'Admin\Vocabulary\VocabularyCategoryController')->except(['show']);
    Route::resource('/vocabulary/field', 'Admin\Vocabulary\VocabularyFieldController')->except(['show']);

    /* Course Route */
    Route::resource('/course', 'Admin\Course\CourseController')->except(['show']);
    Route::put('/course/{id}/update/image', 'Admin\Course\CourseController@updateImage');

    /* Chapter Route */
    Route::resource('/chapter', 'Admin\Course\ChapterController')->except(['show']);

    /* Blog Route */
    Route::resource('/blog', 'Admin\Blog\BlogController')->except(['show']);
    Route::put('/blog/{id}/update/image', 'Admin\Blog\BlogController@updateImage');
    Route::resource('/blog/category', 'Admin\Blog\BlogCategoryController')->except(['show']);

    /* Event Route */
    Route::resource('/event', 'Admin\Event\EventController')->except(['show']);
    Route::put('/event/{id}/update/image', 'Admin\Event\EventController@updateImage');

    /* Absensi Route */
    Route::resource('/absensi', 'Admin\Absensi\AbsensiController')->except(['show']);
});

/* User Route */
Route::prefix('/dashboard')->group(function(){
    Route::get('/main', 'User\Dashboard\DashboardController@index');

    Route::resource('/absensi', 'User\Absensi\AbsensiController');

    /* Get Course & Chapter */
    Route::prefix('/course')->group(function(){
        Route::get('/', 'User\Course\CourseController@indexDashboard');
        Route::get('/progress', 'User\Course\CourseController@progress');
        Route::get('/finished', 'User\Course\CourseController@finished');

        Route::get('/{courseId}/chapter/{id}', 'User\Course\CourseController@showChapter');
    });

    /* Resource Course */
    Route::resource('/course', 'User\Course\CourseController')->except(['index']);

    Route::get('/vocabulary', function () {
        return view('dashboard/user/vocabulary',["title" => "Vocabulary"]);
    });
    
    Route::get('/exam', function () {
        return view('dashboard/user/exam',["title" => "Exam"]);
    });
    
    Route::get('/exam1', function () {
        return view('dashboard/user/exam1',["title" => "Exam"]);
    });
    
    Route::get('/exam2', function () {
        return view('dashboard/user/exam2',["title" => "Exam"]);
    });
    
    
    Route::get('/checkout', function () {
        return view('dashboard/user/checkout',["title" => "Checkout"]);
    });
});

/* Public Route */
Route::resource('/blog', 'User\Blog\BlogController');

Route::resource('/event', 'User\Event\EventController');
Route::put('event/{id}/join', 'User\Event\EventController@join');

Route::get('/course', 'User\Course\CourseController@indexHome');

Route::get('/quiz', function () {
    return view('quiz',["title" => "Quiz"]);
});
Route::get('/quiz-start', function () {
    return view('quiz-start',["title" => "Quiz"]);
});
Route::get('/quiz-end', function () {
    return view('quiz-end',["title" => "Quiz"]);
});
