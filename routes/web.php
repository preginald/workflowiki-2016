<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('pages.home');
});

Route::resource('workflows', 'WorkflowController');
Route::post('workflows/fill', 'WorkflowController@fill');

Route::resource('processes', 'ProcessController');

Route::get('/steps/create/{id}', 'StepController@create');
Route::resource('steps', 'StepController', ['except' => ['create']]);

Route::get('/tasks/create/{id}', 'TaskController@create');
Route::get('/tasks/move/{id}', 'TaskController@move');
Route::post('/tasks/move/{id}', 'TaskController@moveSave');
Route::resource('tasks', 'TaskController', ['except' => ['create']]);

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/processes/{id}/activities/create', 'ActivityController@create');
Route::post('/processes/{id}/activities', 'ActivityController@store');

Route::get('/processes/{id}/events/create', 'EventController@create');
Route::post('/processes/{id}/events', 'EventController@store');

Route::get('/nodes/{id}/activities/create', 'NodeActivityController@create');
Route::post('/nodes/{id}/activities', 'NodeActivityController@store');

Route::get('/nodes/{id}/activities/link', 'NodeActivityController@link');
Route::post('/nodes/{id}/activities/link', 'NodeActivityController@linkStore');

Route::get('/nodes/{id}/gateoptions/create', 'GateOptionController@create');
Route::post('/nodes/{id}/gateoptions', 'GateOptionController@store');

Route::get('/gates/{id}/activities/create', 'GateActivityController@create');
Route::post('/gates/{id}/activities', 'GateActivityController@store');

Route::get('/options/{id}/activities/create', 'OptionActivityController@create');
Route::post('/options/{id}/activities', 'OptionActivityController@store');


Route::group(['prefix' => 'api/v1'], function(){
    Route::get('processes', function(){
        return App\Process::all();
    });
    Route::get('processes/show/{id}', function($id){
        return App\Process::find($id);
    });
});
