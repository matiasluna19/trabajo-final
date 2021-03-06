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

Route::get('/', 'HomeController@index');
Route::match(['get', 'post'], 'HomeController@buscador');


Route::get('/categories', 'CategoryController@show');

Route::get('/preguntasfrecuentes', function () {
    return view("faq");
});

Route::match(['get', 'post'],'/contacto', 'contactoController@contacto');

Route::get('/nosotros',function (){return view("nosotros");});

Route::match(['get', 'post'], 'perfil', 'UsersController@perfil');
// Route::get('/categories/{categorySlug}', 'CategoryController@index')->name('category');
Route::get('/categories/{categorySlug}', 'CategoryController@index')->name('category');
Route::get('/categories/{categorySlug}/{productSlug}', 'ProductsController@mostrar')->name('product');
Route::get('categories/{categorySlug}', 'CategoryController@index')->name('category');

//Carrito y checkout
Route::post('/cart/{productId}', 'CartController@addProduct')->name('addProductToCart');
Route::delete('/cart/{productId}', 'CartController@removeProduct')->name('removeProductFromCart');
Route::post('/orders', 'OrdersController@addOrder')->name('order');
Route::get('/carrito', 'CartController@index')->name('cart')->middleware('auth');
Route::view('/ordenes', 'orders')->name('orders')->middleware('auth');

//Rutas auth
Auth::routes();


// Admin //
// Route::get('/admin','AdminController@login'); //
Route::match(['get', 'post'], '/admin', 'AdminController@login');

    Route::group(['middleware' => ['auth']], function () {
    Route::get('/admin/dashboard', 'AdminController@dashboard');
    Route::get('/admin/settings', 'AdminController@settings');
    Route::get('/admin/check-pwd', 'AdminController@chkPassword');
    Route::match(['get', 'post'], '/admin/update-pwd', 'AdminController@updatePassword');
    Route::get('admin/change-password', 'ChangePasswordController@index');
    Route::post('admin/change-password', 'ChangePasswordController@store')->name('change.password');

    // Admin Categorias
    Route::match(['get', 'post'], '/admin/add-category', 'CategoryController@addCategory');
    Route::match(['get', 'post'], '/admin/edit-category/{id}', 'CategoryController@editCategory');
    Route::match(['get', 'post'], '/admin/delete-category/{id}', 'CategoryController@deleteCategory');
    Route::get('/admin/view-categories', 'CategoryController@viewCategories');
    // Admin Productos
    Route::match(['get', 'post'], '/admin/add-product', 'ProductsController@addProduct');
    Route::match(['get', 'post'], '/admin/edit-product/{id}', 'ProductsController@editProduct');
    Route::get('/admin/delete-product/{id}', 'ProductsController@deleteProduct');
    Route::get('/admin/view-products', 'ProductsController@viewProducts');
    Route::get('/admin/delete-product-image/{id}', 'ProductsController@deleteProductImage');
});



Route::get('/logout', 'AdminController@logout');
