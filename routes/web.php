<?php

use App\Http\Controllers\AjaxController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IntroduceController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\LineController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\UserController;
use App\Models\Line;
use App\Models\Media;
use App\Models\Order;
use App\Models\Product;
use App\Models\Promotion;
use PHPUnit\Framework\Attributes\PostCondition;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes(['verify' => true]);

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/admin', [HomeController::class, 'home'])->name('admin.home');

Route::get('/product', [ProductController::class, 'showProduct'])->name('product');

Route::get('/post', [PostController::class, 'showPost'])->name('post');

Route::get('/introduce/open', [introduceController::class, 'showIntroduce'])->name('introduce.open');

Route::get('/product/hot', [ProductController::class, 'ProductHot'])->name('product.hot');

Route::get('/product/sell', [ProductController::class, 'ProductSell'])->name('product.sell');

Route::get('/introduce', [IntroduceController::class, 'index'])->name('introduce');
Route::get('/detail_product', [ProductController::class, 'product_detail'])->name('product.detail');

Route::get('/login', [HomeController::class, 'login'])->name('login');

Route::group(['prefix' => 'laravel-filemanager', 'middleware' ], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});


route::resource('admin/post',PostController::class);

Route::resource('admin/user',UserController::class);

Route::resource('admin/category', CategoryController::class);

Route::resource('admin/comment', CommentController::class);

route::resource('admin/contact',ContactController::class);

route::resource('admin/introduce',IntroduceController::class);

route::resource('admin/like',LikeController::class);

route::resource('admin/line',LineController::class);

route::resource('admin/media',MediaController::class);

route::resource('admin/order',OrderController::class);

route::resource('admin/product',ProductController::class);

route::resource('admin/role',RoleController::class);

route::resource('admin/slider',SliderController::class);

route::resource('admin/promotion',Promotion::class);

route::post('/ajax/showListLine',[AjaxController::class,'showListLine'])->name('ajax.showListLine');
route::post('/ajax/showProductCode',[AjaxController::class,'showProductCode'])->name('ajax.showProductCode');
route::post('/ajax/addProductHot',[AjaxController::class,'addProductHot'])->name('ajax.addProductHot');
route::post('/ajax/removeProductImage',[AjaxController::class,'removeProductImage'])->name('ajax.removeProductImage');

Route::match(['get', 'post'],'/product/update/{id}',[ProductController::class,'update'])->name('product.update');

Route::match(['get', 'post'],'/post/update/{post}',[postController::class,'update'])->name('post.update');

Route::match(['get', 'post'],'/line/update/{line}',[lineController::class,'update'])->name('line.update');

Route::match(['get', 'post'],'/category/update/{category}',[categoryController::class,'update'])->name('category.update');

Route::get('/post/destroy/{post}', [PostController::class, 'destroy'])->name('post.destroy');

Route::get('/line/destroy/{line}', [lineController::class, 'destroy'])->name('line.destroy');

Route::get('/line/edit/{line}', [lineController::class, 'edit'])->name('line.edit');

Route::get('/category/destroy/{category}', [categoryController::class, 'destroy'])->name('category.destroy');

Route::get('/category/edit/{category}', [categoryController::class, 'edit'])->name('category.edit');

Route::get('/post/status', [postController::class, 'status'])->name('post.status');

Route::get('/product/status', [ProductController::class, 'status'])->name('product.status');
Route::get('/product/destroy/{product}', [ProductController::class, 'destroy'])->name('product.destroy');

Route::get('/product/destroy_trash/{product}', [ProductController::class, 'destroy_trash'])->name('product.destroy_trash');

Route::get('/product/restore/{product}', [ProductController::class, 'restore'])->name('product.restore');

Route::get('/post/restore/{post}', [postController::class, 'restore'])->name('post.restore');

route::post('product/search',[productController::class, 'ProductSearch'])->name('product.search');
route::get('product/category/{id}',[productController::class, 'ProductCategory'])->name('product.category');
route::get('product/line/{id}',[productController::class, 'ProductLine'])->name('product.line');