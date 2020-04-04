<?php

use Illuminate\Support\Facades\Route;

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
Route::group(['prefix' => LaravelLocalization::setLocale()], function(){ //Luca: aggiunto per le traduzioni
  // Home page
  Route::get('/', 'HomeController@index')->name('public-home');

  // pagina termini e privacy - public
  Route::get('/terms', function () {
      return view('termini-privacy');
      })->name('termini-privacy');

  //pagina dettaglio stanza
  Route::get('/room', function () {
      return view('room-details');
  });

  //public apartment
  Route::get('/apartments', 'ApartmentController@index')->name('apartments.index');
  //corretto apertments--> Route::get('/apartments/{id}', 'ApartmentController@show')->name('apertments.show');

  //deep search route(aiax)
  Route::get('/apartments/search','ApartmentController@search')->name('apartments.search');


  Route::get('/apartments/{id}', 'ApartmentController@show')->name('apartments.show');

  Route::post('/apartments/{id}', 'LeadController@store')->name('email');

  Auth::routes();

  Route::get('/logout', function(){
      Auth::logout();
      return redirect('/')->with('error', 'You were logged out successfully!');
  });


  //pagine visibile per utente registrato
  Route::middleware('auth')->prefix('admin')->namespace('Admin')->name('admin.')->group(function(){
      Route::get('/', 'HomeController@index')->name('index');

      //Queste rotte gestiscono la sponsorizzazione degli appartamenti
     Route::get('apartments/promo/{id}', 'ApartmentController@promoEdit')->name('apartments.promo'); //route provvisoria per sponsorizzazione
     //Route::post('apartments/promo/{id}', 'ApartmentController@promoEdit')->name('apartments.promo'); //route provvisoria per sponsorizzazione
      Route::post('apartments/promo/payment/process' , 'ApartmentController@process')->name('apartments.promo.payment.process');
      Route::get('apartments/status/change', 'ApartmentController@updateStatus')->name('apartments.change.status');

      //Route resource
      Route::resource('/apartments', 'ApartmentController');
      Route::resource('/leads', 'LeadController');

      Route::get('/apartment/uploadimg' , 'ApartmentController@uploadImageForm');
      Route::post('/apartments/uploadimg', 'ApartmentController@uploadimg')->name('apartments.uploadimg');

  });

});
