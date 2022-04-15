<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Input; 

use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\AdminController;

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

//Homepage
Route::get('/', function () { return view('welcome'); });

//Dashboard
Route::get('dashboard', [AuthController::class, 'dashboard']); 

//profile
Route::get('profile', [AuthController::class, 'profile']);
Route::post('profileUpdate', [AuthController::class, 'profileUpdate']);

//Account Management
Route::get('account', [AuthController::class, 'account']);

//Shops
Route::get('shops', [AuthController::class, 'shops']);
Route::get('shops/{shopName}/', [AuthController::class, 'shopList']);
Route::get('shops/{shopName}/{shopID}', [AuthController::class, 'shopInfo']);
Route::get('shops/{shopName}/{shopID}/wachtrij', [AuthController::class, 'shopWachtrij']);
Route::get('shops/{shopName}/{shopID}/wachtrij/leave', [AuthController::class, 'LeaveWachtrij']);

//Tag Management
Route::get('tag/newTag', [AuthController::class, 'newTag']);
Route::post('post-newTag', [AuthController::class, 'postNewTag']);
Route::post('post-changeTag', [AuthController::class, 'postChangeTag']);

Route::get('tag/{tagID}', [AuthController::class, 'tag']);
Route::get('tag/{tagID}/changeTag', [AuthController::class, 'changeTag']);
Route::get('tag/{tagID}/ontkoppel', [AuthController::class, 'OntkoppelTag']);
Route::get('tag/{tagID}/ontkoppel/confirm', [AuthController::class, 'removeTag']);
Route::get('tag/{tagID}/ontkoppel/deny', function () { return redirect("/taglist"); }); 
Route::get('taglist', [AuthController::class, 'taglist']);

//Login Page
Route::get('login', [AuthController::class, 'login']);
Route::post('post-login', [AuthController::class, 'postLogin']); 

//Registration Page
Route::get('registration', [AuthController::class, 'registration']);
Route::post('post-registration', [AuthController::class, 'postRegistration']); 

//Logout
Route::get('logout', [AuthController::class, 'logout']);

//Admin Routes
Route::get('/tag/{id}/owner', [TagController::class, 'owner']);
Route::get('/wachtrij/{id}/owner', [TagController::class, 'owner']);
Route::get('/user/{id}/tags', [UserController::class, 'tags']);

//Admin Management
Route::get('/admin', [AdminController::class, 'admin']);

//User
Route::get('/admin/user', [AdminController::class, 'user']);
Route::get('/admin/user/{userID}', [AdminController::class, 'tag']);

//Tag
Route::get('/admin/tag', [AdminController::class, 'tag']);
Route::get('/admin/tag/{tagID}', [AdminController::class, 'tagInfo']);
Route::get('/admin/tag/{tagID}/changeTag', [AdminController::class, 'changeTag']);
Route::get('/admin/tag/{tagID}/ontkoppel', [AdminController::class, 'OntkoppelTag']);
Route::get('/admin/tag/{tagID}/ontkoppel/confirm', [AdminController::class, 'removeTag']);
Route::get('/admin/tag/{tagID}/ontkoppel/deny', function () { return redirect("/taglist"); }); 

//Shop
Route::get('/admin/shop/remove/{shopID}', [AdminController::class, 'removeShopView']);
Route::get('/admin/shop/remove/{shopID}/confirm', [AdminController::class, 'removeShop']);
Route::get('/admin/shop/remove/{shopID}/deny', function () { return redirect("/admin/shop"); });
Route::get('/admin/shop', [AdminController::class, 'shop']);
Route::get('/admin/shop/add', [AdminController::class, 'addShopView']);
Route::get('/admin/shop/{shopName}/add', [AdminController::class, 'addDistributionView']);
Route::post('post-shop-add', [AdminController::class, 'postShopAdd']); 
Route::post('post-distribution-add', [AdminController::class, 'postDistributionAdd']); 
Route::get('/admin/shop/{shopName}', [AdminController::class, 'distributions']);
Route::get('/admin/shop/{shopName}/{shopID}', [AdminController::class, 'store']);
Route::post('post-shop-update', [AdminController::class, 'postShopUpdate']); 