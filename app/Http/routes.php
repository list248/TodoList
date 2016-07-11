<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
use App\Task;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');
Route::post('/task', 'HomeController@new_task');


Route::delete('/delete', [
    'uses' => 'HomeController@delete_task',
    'as' => 'delete'
]);



Route::post('/edit', [
    'uses' => 'HomeController@edit',
    'as' => 'edit'
]);

Route::post('/status', [
    'uses' => 'HomeController@status',
    'as' => 'status'
]);

/*Route::post('/edit', function (\Illuminate\Http\Request $request) {
    $task = Task::find($request['taskId']);
        $task -> name = $request['name'];
    $task -> description = $request['desc'];
    $task -> status = $request['status'];
    $task->update();
    return response()->json(['message' => $request['desc']]);
})->name('edit');*/
//Route::post('/edit', 'HomeController@edit')->name('edit');;



