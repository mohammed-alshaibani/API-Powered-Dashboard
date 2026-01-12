<?php
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\PayingController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\OrderGlobalController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\AuthController;
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
    return view('welcome');
});

/** */
Route::get('/register',[AuthController::class,'loadRegister']);
Route::post('/register',[AuthController::class,'register'])->name('register');
Route::get('/login',function(){
    return redirect('/');
});

Route::get('/',[AuthController::class,'loadLogin']);
Route::post('/login',[AuthController::class,'login'])->name('login');
Route::get('/logout',[AuthController::class,'logout'])->name('logout');
/** */
Route::get('/Order/Create', function () {
    return view('Customer.Order.Create');
});
Route::get('/Order/Edit/{id}', function () {
    return view('Customer.Order.Edit',compact('id'));
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/dashboard', function () {
    return view('dashboard.Admin.Index');
})->name('Dashboard');
Route::get('/user', function () {
    return view('dashboard.User.Index');
});

Route::prefix('dashboard/Product')->group(function () {
    Route::get('/',[ProductController::class, 'index'])->name('Product.Index');
    Route::get('/Create', [ProductController::class, 'create'])->name('Product.Create');
    Route::post('/Create', [ProductController::class, 'store'])->name('Product.Store');
    Route::get('/Edit/{id}/edit', [ProductController::class, 'edit'])->name('Product.Edit');
    Route::put('/Edit/{id}', [ProductController::class, 'update'])->name('Product.Update');
    Route::post('/Destroy/{id}', [ProductController::class, 'destroy'])->name('Product.Destroy');
    Route::get('/get-subcategories/{categoryId}',[ProductController::class, 'getSubcategories']);
});

Route::prefix('dashboard/Category')->group(function () {
    Route::get('/', [CategoryController::class, 'index'])->name('Category.Index');
    Route::get('/Create', [CategoryController::class, 'create'])->name('Category.Create');
    Route::post('/Create', [CategoryController::class, 'store'])->name('Category.Store');
    Route::get('/Edit/{id}/edit', [CategoryController::class, 'edit'])->name('Category.Edit');
    Route::put('/Edit/{id}', [CategoryController::class, 'update'])->name('Category.Update');
    Route::post('/Destroy/{id}', [CategoryController::class, 'destroy'])->name('Category.Destroy');
});

Route::prefix('dashboard/Order')->group(function () {
    Route::get('/',[OrderController::class, 'index'])->name('Order.Index');
    Route::get('/Create', [OrderController::class, 'create'])->name('Order.Create');
    Route::post('/Create', [OrderController::class, 'store'])->name('Order.Store');
    Route::get('/Edit/{id}/edit', [OrderController::class, 'edit'])->name('Order.Edit');
    Route::put('/Edit/{id}', [OrderController::class, 'update'])->name('Order.Update');
    Route::delete('/Destroy/{id}', [OrderController::class, 'destroy'])->name('Order.Destroy');
    Route::get('/Show', [OrderController::class, 'show'])->name('Category.Show');

});

Route::prefix('dashboard/Coupon')->group(function () {
    Route::get('/',[CouponController::class, 'index'])->name('Coupon.Index');
    Route::get('/Create', [CouponController::class, 'create'])->name('Coupon.Create');
    Route::post('/Create', [CouponController::class, 'store'])->name('Coupon.Store');
    Route::get('/Edit/{id}', [CouponController::class, 'edit'])->name('Coupon.Edit');
    Route::put('/Edit/{id}', [CouponController::class, 'update'])->name('Coupon.Update');
    Route::delete('/Destroy/{id}', [CouponController::class, 'destroy'])->name('Coupon.Destroy');
});

Route::prefix('dashboard/Paying')->group(function () {
    Route::get('/',[PayingController::class, 'index'])->name('Paying.Index');
    Route::get('/Create', [PayingController::class, 'create'])->name('Paying.Create');
    Route::post('/Create', [PayingController::class, 'store'])->name('Paying.Store');
    Route::get('/Edit/{id}', [PayingController::class, 'edit'])->name('Paying.Edit');
    Route::put('/Edit/{id}', [PayingController::class, 'update'])->name('Paying.Update');
    Route::post('/Destroy/{id}', [PayingController::class, 'destroy'])->name('Paying.Destroy');
});

Route::prefix('dashboard/Banner')->group(function () {
    Route::get('/',[BannerController::class, 'index'])->name('Banner.Index');
    Route::get('/Create', [BannerController::class, 'create'])->name('Banner.Create');
    Route::post('/Create', [BannerController::class, 'store'])->name('Banner.Store');
    Route::get('/Edit/{id}', [BannerController::class, 'edit'])->name('Banner.Edit');
    Route::put('/Edit/{id}', [BannerController::class, 'update'])->name('Banner.Update');
    Route::post('/Destroy/{id}', [BannerController::class, 'destroy'])->name('Banner.Destroy');
});
Route::prefix('dashboard/OrderGlobal')->group(function () {
    Route::get('/',[OrderGlobalController::class, 'index'])->name('OrderGlobal.Index');
    Route::get('/Create', [OrderGlobalController::class, 'create'])->name('OrderGlobal.Create');
    Route::post('/Create', [OrderGlobalController::class, 'store'])->name('OrderGlobal.Store');
    Route::get('/Edit/{id}', [OrderGlobalController::class, 'edit'])->name('OrderGlobal.Edit');
    Route::put('/Edit/{id}', [OrderGlobalController::class, 'update'])->name('OrderGlobal.Update');
    Route::post('/Destroy/{id}', [OrderGlobalController::class, 'destroy'])->name('OrderGlobal.Destroy');
});

Route::prefix('dashboard/Subcategory')->group(function () {
    Route::get('/',[SubCategoryController::class, 'index'])->name('Subcategory.Index');
    Route::get('/Create', [SubCategoryController::class, 'create'])->name('Subcategory.Create');
    Route::post('/Create', [SubCategoryController::class, 'store'])->name('Subcategory.Store');
    Route::get('/Edit/{id}', [SubCategoryController::class, 'edit'])->name('Subcategory.Edit');
    Route::put('/Edit/{id}', [SubCategoryController::class, 'update'])->name('Subcategory.Update');
    Route::post('/Destroy/{id}', [SubCategoryController::class, 'destroy'])->name('Subcategory.Destroy');
});
