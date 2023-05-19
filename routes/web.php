<?php
// Admin
use App\Http\Controllers\AdminUserTableController;
use App\Http\Controllers\AdminRolesTableController;
use App\Http\Controllers\AdminUserRoleTableController;
use App\Http\Controllers\AdminShopTableController;
use App\Http\Controllers\AdminCategoryDadTableController;
use App\Http\Controllers\AdminCategoryChildTableController;
use App\Http\Controllers\AdminProductController;
// End Admin
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Middleware\Login;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CategorychildController;
use App\Http\Controllers\CategorydadController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShoppingCartController;
use App\Http\Controllers\PaymentoutController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\HomeController;

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

route::group(['prefix' => '/admin', 'as' => 'admin.'], function () {
    // user table
    route::get('/user-table', [AdminUserTableController::class, 'index'])->name('user-table');
    route::get('/insert-product-table', [AdminProductController::class, 'create'])->name('insert-product-table');
    route::get('/product-table', [AdminProductController::class, 'index'])->name('product-table');
    route::get('/insert-user-table', function () {
        return view('admin.user-table-insert');
    })->name('insert-user-table');
    route::post('/update-user-table/{id}', [AdminUserTableController::class, 'update']);
    route::delete('/delete-user-table/{id}', [AdminUserTableController::class, 'destroy']);
    route::post('/update-product-table/{id}', [AdminProductController::class, 'update']);
    route::delete('/delete-product-table/{id}', [AdminProductController::class, 'destroy']);
    route::group(['prefix' => '', 'as' => 'store.'], function () {
        // user table
        route::post('/insert-user-table', [AdminUserTableController::class, 'store'])->name('user-table');
        // roles table
        route::post('/insert-roles-table', [AdminRolesTableController::class, 'store'])->name('roles-table');
        // user-role table
        route::post('/insert-user-role-table', [AdminUserRoleTableController::class, 'store'])->name('user-role-table');
        // shop table
        route::post('/insert-shop-table', [AdminShopTableController::class, 'store'])->name('shop-table');
        // category-dad table
        route::post('/insert-category-dad-table', [AdminCategoryDadTableController::class, 'store'])->name('category-dad-table');
        // category-child table
        route::post('/insert-category-child-table', [AdminCategoryChildTableController::class, 'store'])->name('category-child-table');
        // product table
        route::post('/insert-product-table', [AdminProductController::class, 'store'])->name('product-table');  
     
    });
});
// product table
route::get('/product/{id}', [ProductController::class, 'index'])->name('product');
route::get('/category-child/{id}', [CategoryChildController::class, 'index'])->name('category-child');
route::get('/category-dad/{id}', [CategoryDadController::class, 'index'])->name('category-dad');
route::get('/home', [HomeController::class, 'category'])->name('home');

// login/reset passwort
route::get('/login', [LoginController::class, 'login'])->name('login.list');
route::post('/login/add', [LoginController::class, 'postLogin'])->name('login.add')->middleware('auth.login');
route::get('/register', [LoginController::class, 'register'])->name('register.list');
route::post('/register/add', [LoginController::class, 'insert'])->name('register.add');
route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/reset', function () {
    return view('reset');
});
route::get('/updatepassword', [LoginController::class, 'change'])->name('password');
Route::get('/forgot/password/{token}', [LoginController::class, 'forgotPasswordValidate']);
Route::post('/forgot/password', [LoginController::class, 'resetPassword'])->name('reset.password');
Route::put('/reset/password', [LoginController::class, 'updatePassword'])->name('update.password');

// login google api
Route::get('login/google', [LoginController::class, 'redirectToGoogle']);
Route::get('login/google/callback', [LoginController::class, 'google_call']);

// ShoppingCart
Route::get('/shoppingcart',[ShoppingCartController::class,'index'])->name('cart');
Route::post('/add-to-cart', [ShoppingCartController::class,'addcart']);
Route::get('/load-cart-data',[ShoppingCartController::class,'cartload']);
Route::delete('/delete-cart',[ShoppingCartController::class,'deletecart']);
Route::get('/load-cart-data',[ProductController::class,'cartload']);

Route::get('/checkout/{id}', [AddressController::class,'index'])->name('checkout');
Route::post('/add-information', [AddressController::class,'add'])->name('add-address');
Route::get('/payment/{id}',[PaymentoutController::class,'index'])->name('cart');


Route::get('/dm', function () {
    return view('dm');
});