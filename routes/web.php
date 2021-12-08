<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\UserAuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});




Route::group(['middleware' => ['auth:user']], function () {
    Route::get('user/dashboard', [UserController::class, 'dashboard'])->name('user.dashboard');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');





//User Routes
Route::post('/user/login', [UserAuthController::class, 'login'])->name('user.login');
Route::post('/user/logout', [UserAuthController::class, 'logout'])->name('user.logout');
Route::get('/user/login', [UserAuthController::class, 'showLoginForm'])->name('user.login');
Route::get('/get/user', [UserAuthController::class, 'readu'])->name('getuserview');
Route::get('/searchuser',[UserAuthController::class, 'readu'])->name('searchuser');
Route::post('/useradd', [UserAuthController::class, 'add'])->name('useradd');
Route::get('/add/user', [UserAuthController::class, 'addview'])->name('adduser.dashboard');
Route::delete('/delete/user/{id}',[UserAuthController::class, 'delete'])->name('deleteuser');
Route::post('/edituser/{id}', [UserAuthController::class, 'upgrade'])->name('useredit');
Route::get('/editu/user/{id}', [UserAuthController::class, 'editview'])->name('edituser.dashboard');





//Category Routes
Route::post('/categoryadd', [CategoryController::class, 'add'])->name('categoryadd');
Route::get('/add/category', [CategoryController::class, 'addview'])->name('addview.dashboard');
Route::post('/categoryedit/{id}', [CategoryController::class, 'upgrade'])->name('categoryedit');
Route::get('/edit/category/{id}', [CategoryController::class, 'editview'])->name('editview.dashboard');
Route::get('/get/category', [CategoryController::class, 'read'])->name('getview');
Route::delete('/delete/category/{id}',[CategoryController::class, 'delete'])->name('deletecategory');
Route::get('/search',[CategoryController::class, 'read'])->name('search');





// Product Routes
Route::post('/productadd', [ProductController::class, 'add'])->name('productadd');
Route::get('/add/product', [ProductController::class, 'addview'])->name('addproduct.dashboard');
Route::post('/productedit/{id}', [ProductController::class, 'upgrade'])->name('productedit');
Route::get('/edit/product/{id}', [ProductController::class, 'editview'])->name('editproduct.dashboard');
Route::get('/getp/product', [ProductController::class, 'readp'])->name('getproduct');
Route::delete('/delete/product/{id}',[ProductController::class, 'delete'])->name('deleteproduct');
Route::get('/searchproduct',[ProductController::class, 'readp'])->name('searchproduct');





require __DIR__.'/auth.php';