<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});

Route::namespace('Frontend')->group(function () {
    Route::get('/','DefaultController@index')->name('home.Index');

    //BLOG
    Route::get('/blog','BlogController@index')->name('blog.Index');
    Route::get('/blog/{slug}','BlogController@detail')->name('blog.Detail');

    //PAGE
    Route::get('/page/{slug}','PageController@detail')->name('page.Detail');

    //CONTACT
    Route::get('/contact','DefaultController@contact')->name('contact.Detail');
    Route::post('','DefaultController@sendPost')->name('sendPost');

//    Route::post('/contact','DefaultController@sendMail');

    Route::get('/hakkimizdabilgisi','DefaultController@about')->name('about.Fdetail');

});


Route::namespace('Backend')->group(function () {

    Route::prefix('yonetim')->group(function () {
        Route::get('/dashboard', 'DefaultController@index')->name('yonetim');
        Route::get('/', 'DefaultController@login')->name('yonetim.Login');
        Route::get('/logout', 'DefaultController@logout')->name('yonetim.Logout');
        Route::post('/login', 'DefaultController@authenticate')->name('yonetim.Authenticate');
    });


    Route::middleware(['admin'])->group(function () {
        Route::prefix('yonetim/settings')->group(function () {
            Route::get('/', 'SettingsController@index')->name('settings.Index');
            Route::post('', 'SettingsController@sortable')->name('settings.Sortable');
            Route::get('/delete/{id}', 'SettingsController@destroy');
            Route::get('/edit/{id}', 'SettingsController@edit')->name('settings.Edit');
            Route::post('/{id}', 'SettingsController@update')->name('settings.Update');
            });
        Route::prefix('yonetim')->group(function () {
            //İLETİŞİM
            Route::get('/iletisim', 'ContactController@index')->name('contact.Index');
            Route::post('/iletisim/sortable', 'ContactController@sortable')->name('contact.Sortable');

            //Hakkımızda
            Route::get('/hakkimizda', 'AboutController@index')->name('about.Detail');
            Route::post('/hakkimizda/sortable', 'AboutController@sortable')->name('about.Sortable');

            Route::get('/hakkimizda/delete/{id}', 'AboutController@destroy');

            Route::get('/hakkimizda/edit/{id}', 'AboutController@edit')->name('about.Edit');
            Route::post('/hakkimizda/{id}', 'AboutController@update')->name('about.Update');

            Route::get('/hakkimizda/ekle', 'AboutController@insert')->name('about.Insert');
            Route::post('/hakkimizda', 'AboutController@insertPost')->name('about.InsertPost');
          });
    });


});


Route::namespace('Backend')->group(function () {
    Route::prefix('yonetim')->group(function () {

       Route::middleware(['admin'])->group(function () {

            //BLOG
            Route::post('/blog/sortable', 'BlogController@sortable')->name('blog.Sortable');
            Route::resource('blog', 'BlogController');

            //PAGE
            Route::post('/page/sortable', 'PageController@sortable')->name('page.Sortable');
            Route::resource('page', 'PageController');

            //SLIDER
            Route::post('/slider/sortable', 'SliderController@sortable')->name('slider.Sortable');
            Route::resource('slider', 'SliderController');

            //ADMIN
            Route::post('/user/sortable', 'UserController@sortable')->name('user.Sortable');
            Route::resource('user', 'UserController');

            //MİSYON pasif çekildi, tamamlanmadı
            Route::post('/mission/sortable', 'MissionController@sortable')->name('mission.Sortable');
            Route::resource('mission', 'MissionController');
        });
    });

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
