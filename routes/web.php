<?php
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
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

Route::get('/', function () {
    if (Auth::check()) {
        return redirect('/projects');
    }
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/projects/{project}/tasks',[TaskController::class,'store']);
Route::patch('/projects/{project}/tasks/{task}',[TaskController::class,'update']); 
Route::delete('/projects/{project}/tasks/{task}', [TaskController::class, 'destroy'])->middleware('auth');


Route::get('/profile', [ProfileController::class, 'index'])->middleware('auth');
Route::patch('/profile', [ProfileController::class, 'update'])->middleware('auth');




Route::resource('/projects', ProjectController::class)->middleware('auth');
