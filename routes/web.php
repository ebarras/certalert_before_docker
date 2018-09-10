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

use App\Cert;

Route::get('/', 'CertController@index');
Route::resource('certs','CertController')->only([
    'index', 'store'
]);

Route::resource('agreements','AgreementController')->only([
    'index', 'store'
]);

Route::resource('agencies','AgencyController')->only([
    'store'
]);

Route::get('/validate/{cert_id}',function($cert_id) {
    $cert = Cert::find($cert_id);

    // Do Validation Stuff Here
    //dd($cert);
    return response($cert);
});