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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

// Route::get('/home', 'HomeController@home')->name('home');
Route::get('/', 'HomeController@index')->name('index');

Route::get('cars', 'HomeController@carList')->name('car.list');

Route::get('contact', 'ContactController@index')->name('contact');
Route::post('contact', 'ContactController@sendMail')->name('send.mail');

Route::post('cars/{car}/contact', 'ContactController@sendMailForSpecificCar')->name('send.mail.for.car');

Route::get('/cars/{car}', 'CarsController@details')->name('details');

Route::post('/cars/search', 'HomeController@search')->name('search');

Route::post('/cars/model','HomeController@models')->name('model.search');

Route::post('/subscribe', 'SubscribersController@subscribe')->name('subscribe');

Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
    Route::get('/changePassword', 'DashboardController@changePasswordView')->name('changePassword');
    Route::post('/change', 'DashboardController@changePassword')->name('change');

    Route::get('/manufacturers', 'ManufacturersController@index')->name('manufacturers');
    Route::get('getManufacturers', 'ManufacturersController@getData')->name('get.manufacturers');
    Route::post('/manufacturers', 'ManufacturersController@store')->name('store.manufacturer');
    Route::put('/manufacturers/{manufacturer}/update', 'ManufacturersController@edit')->name('edit.manufacturer');
    Route::delete('/manufacturers/{manufacturer}', 'ManufacturersController@destroy')->name('delete.manufacturer');

    Route::get('/models', 'ModelsController@index')->name('models');
    Route::get('getModels', 'ModelsController@getData')->name('get.models');
    Route::post('/models', 'ModelsController@store')->name('store.model');
    Route::put('/models/{model}/update', 'ModelsController@edit')->name('edit.model');
    Route::delete('/models/{model}', 'ModelsController@destroy')->name('delete.model');

    Route::get('/body_types', 'BodyTypesController@index')->name('body_types');
    Route::get('getBodyTypes', 'BodyTypesController@getData')->name('get.body_types');
    Route::post('/body_types', 'BodyTypesController@store')->name('store.body_type');
    Route::put('/body_types/{body_type}/update', 'BodyTypesController@edit')->name('edit.body_type');
    Route::delete('/body_types/{body_type}', 'BodyTypesController@destroy')->name('delete.body_type');

    Route::get('/fuel_types', 'FuelTypesController@index')->name('fuel_types');
    Route::get('getFuelTypes', 'FuelTypesController@getData')->name('get.fuel_types');
    Route::post('/fuel_types', 'FuelTypesController@store')->name('store.fuel_type');
    Route::put('/fuel_types/{fuel_type}/update', 'FuelTypesController@edit')->name('edit.fuel_type');
    Route::delete('/fuel_types/{fuel_type}', 'FuelTypesController@destroy')->name('delete.fuel_type');

    Route::get('/transmissions', 'TransmissionsController@index')->name('transmissions');
    Route::get('getTransmissions', 'TransmissionsController@getData')->name('get.transmissions');
    Route::post('/transmissions', 'TransmissionsController@store')->name('store.transmission');
    Route::put('/transmissions/{transmission}/update', 'TransmissionsController@edit')->name('edit.transmission');
    Route::delete('/transmissions/{transmission}', 'TransmissionsController@destroy')->name('delete.transmission');

    Route::get('/doors', 'DoorsController@index')->name('doors');
    Route::get('getDoors', 'DoorsController@getData')->name('get.doors');
    Route::post('/doors', 'DoorsController@store')->name('store.door');
    Route::put('/doors/{door}/update', 'DoorsController@edit')->name('edit.door');
    Route::delete('/doors/{door}', 'DoorsController@destroy')->name('delete.door');

    Route::get('/equipments', 'EquipmentsController@index')->name('equipments');
    Route::get('getEquipments', 'EquipmentsController@getData')->name('get.equipments');
    Route::post('/equipments', 'EquipmentsController@store')->name('store.equipment');
    Route::put('/equipments/{equipment}/update', 'EquipmentsController@edit')->name('edit.equipment');
    Route::delete('/equipments/{equipment}', 'EquipmentsController@destroy')->name('delete.equipment');

    Route::get('/cylinders', 'CylindersController@index')->name('cylinders');
    Route::get('getCylinders', 'CylindersController@getData')->name('get.cylinders');
    Route::post('/cylinders', 'CylindersController@store')->name('store.cylinder');
    Route::put('/cylinders/{cylinder}/update', 'CylindersController@edit')->name('edit.cylinder');
    Route::delete('/cylinders/{cylinder}', 'CylindersController@destroy')->name('delete.cylinder');

    Route::get('/horsepowers', 'HpsController@index')->name('horsepowers');
    Route::get('gethorsepowers', 'HpsController@getData')->name('get.horsepowers');
    Route::post('/horsepowers', 'HpsController@store')->name('store.horsepower');
    Route::put('/horsepowers/{horsepower}/update', 'HpsController@edit')->name('edit.horsepower');
    Route::delete('/horsepowers/{horsepower}', 'HpsController@destroy')->name('delete.horsepower');

    Route::get('/colors', 'ColorsController@index')->name('colors');
    Route::get('getColors', 'ColorsController@getData')->name('get.colors');
    Route::post('/colors', 'ColorsController@store')->name('store.color');
    Route::put('/colors/{color}/update', 'ColorsController@edit')->name('edit.color');
    Route::delete('/colors/{color}', 'ColorsController@destroy')->name('delete.color');

    Route::get('/origins', 'OriginsController@index')->name('origins');
    Route::get('getOrigins', 'OriginsController@getData')->name('get.origins');
    Route::post('/origins', 'OriginsController@store')->name('store.origin');
    Route::put('/origins/{origin}/update', 'OriginsController@edit')->name('edit.origin');
    Route::delete('/origins/{origin}', 'OriginsController@destroy')->name('delete.origin');

    Route::get('/registrations', 'RegistrationsController@index')->name('registrations');
    Route::get('getRegistrations', 'RegistrationsController@getData')->name('get.registrations');
    Route::post('/registrations', 'RegistrationsController@store')->name('store.registration');
    Route::put('/registrations/{registration}/update', 'RegistrationsController@edit')->name('edit.registration');
    Route::delete('/registrations/{registration}', 'RegistrationsController@destroy')->name('delete.registration');

    Route::get('/conditions', 'ConditionsController@index')->name('conditions');
    Route::get('getConditions', 'ConditionsController@getData')->name('get.conditions');
    Route::post('/conditions', 'ConditionsController@store')->name('store.condition');
    Route::put('/conditions/{condition}/update', 'ConditionsController@edit')->name('edit.condition');
    Route::delete('/conditions/{condition}', 'ConditionsController@destroy')->name('delete.condition');

    Route::get('/cars', 'CarsController@index')->name('cars');
    Route::get('getcars', 'CarsController@getData')->name('get.cars');
    Route::get('/addCar', 'CarsController@addCar')->name('add.car');
    Route::post('/addCar', 'CarsController@store')->name('store.car');
    Route::get('/cars/{car}/edit', 'CarsController@edit')->name('edit.car');
    Route::post('cars/{car}', 'CarsController@update')->name('update.car');
    Route::delete('/cars/{car}', 'CarsController@destroy')->name('delete.car');
    Route::post('/cars/{car}/delete/{image}', 'CarsController@deleteImage')->name('delete.image');
    Route::post('/car/{car}/upload','CarsController@uploadImage')->name('upload.image');
    Route::post('/addCar/model','CarsController@models')->name('car.model');
});

