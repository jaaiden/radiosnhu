<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

/* Main page ----------------------------------------------------- */
Route::get('/', function(){ return View::make('index'); });

//Route::get('beta', function(){ return View::make('beta.index'); });
//Route::get('fsbeta', function(){ return View::make('beta.fullscreen'); });
//Route::get('cover', function(){ return View::make('beta.cover'); });
//Route::get('request', function(){ return View::make('requests'); });
Route::get('m', function(){ return View::make('mobile'); });
/* Main page ----------------------------------------------------- */





/* Archives ------------------------------------------------------ */
Route::group(array('prefix' => 'archive'), function()
{
  Route::get('', function(){ return View::make('archive.index'); });
  Route::get('profile/{name}', function($name){ return View::make('archive.profile')->with('name', $name); });
  Route::get('listen/{archiveid}', function($archiveid){ return View::make('archive.listen')->with('id', $archiveid); });
  Route::get('upload', function(){ return View::make('archive.upload'); });
  Route::post('upload', array('uses' => 'ArchiveController@doUpload'));
});




/* Admin group --------------------------------------------------- */
Route::get('admin/login', function(){ return View::make('admin.login'); });
Route::post('admin/login', array('uses' => 'AuthController@doAdminLogin'));
Route::get('admin/logout', array('uses' => 'AuthController@doLogout'));
Route::group(array('prefix' => 'admin', 'before' => 'auth'), function()
{
  Route::get('/', function(){ return View::make('admin.index'); });

  Route::group(array('prefix' => 'edit'), function()
  {
    Route::get('/', function(){ return Redirect::to('admin/edit/about'); });
    Route::get('about', function(){ return View::make('admin.edit.about'); });
    Route::post('about/update', array('uses' => 'AdminController@updateAboutPage'));
    Route::get('news', function(){ return View::make('admin.edit.news'); });
    Route::post('news/update', array('uses' => 'AdminController@updateNewsPage'));
    Route::get('events', function(){ return View::make('admin.edit.events'); });
    Route::post('events/add', array('uses' => 'AdminController@addEvent'));
    Route::post('events/update', array('uses' => 'AdminController@updateEventsPage'));
    Route::get('events/delete/{id}', array('uses' => 'AdminController@deleteEvent'));
    Route::get('alumni', function(){ return View::make('admin.edit.alumni'); });
    Route::post('alumni/add', array('uses' => 'AdminController@addAlumni'));
    Route::post('alumni/update', array('uses' => 'AdminController@updateAlumni'));
    Route::get('alumni/delete/{id}', array('uses' => 'AdminController@deleteAlumni'));
    Route::get('contact', function(){ return View::make('admin.edit.contact'); });
    Route::post('contact/add', array('uses' => 'AdminController@addContact'));
    Route::get('contact/delete/{id}', array('uses' => 'AdminController@deleteContact'));
    Route::post('contact/update', array('uses' => 'AdminController@updateContact'));
  });

  Route::group(array('prefix' => 'accounts'), function()
  {
    Route::get('/', function(){ return Redirect::to('admin/accounts/view'); });
    Route::get('view', function(){ return View::make('admin.accounts.index'); });
    Route::get('add', function(){ return View::make('admin.accounts.add'); });
    Route::post('add', array('uses' => 'AdminController@createAdminAccount'));
    Route::post('update', array('uses' => 'AdminController@updateAccount'));
    Route::get('edit/{email}', function($email){ return View::make('admin.accounts.edit')->with('email', $email); });
    Route::get('delete/{email}', function($email){ return View::make('admin.accounts.delete')->with('email', $email); });
    Route::get('delete/{email}/confirm', array('uses' => 'AdminController@deleteAccount'));
  });

  Route::group(array('prefix' => 'shows'), function()
  {
    Route::get('/', function(){ return View::make('admin.shows.index'); });
    Route::post('add', array('uses' => 'AdminController@addShow'));
    Route::post('update', array('uses' => 'AdminController@updateShow'));
    Route::get('delete/{id}', array('uses' => 'AdminController@deleteShow'));
  });
});
/* Admin group --------------------------------------------------- */


/* Miscellaneous ------------------------------------------------- */
Route::get('getshowinfo', array('uses' => 'HomeController@getShowInfo'));
Route::post('getshowinfo', array('uses' => 'HomeController@getShowInfo'));
Route::post('getsonginfo', array('uses' => 'HomeController@getSongInfo'));

Route::get('getnextshow', array('uses' => 'HomeController@getNextShow'));
Route::post('getnextshow', array('uses' => 'HomeController@getNextShow'));

Route::post('getlistenercount', array('uses' => 'HomeController@getListenerCount'));
/* Miscellaneous ------------------------------------------------- */
