<?php

// Admins conntroller
use App\Http\Controllers\admin\categoryAdmin;
use App\Http\Controllers\admin\dashboardAdmin;
use App\Http\Controllers\admin\newsAdmin;
use App\Http\Controllers\admin\productAdmin;
use App\Http\Controllers\admin\profileAdmin;
use App\Http\Controllers\admin\transactionAdmin;
use App\Http\Controllers\authAdministrator;

// Main Controller
use App\Http\Controllers\authController;
use App\Http\Controllers\cartController;
use App\Http\Controllers\checkoutController;
use App\Http\Controllers\enabler\indexEnabler;
use App\Http\Controllers\indexController;
use App\Http\Controllers\mediaAuthController;
use App\Http\Controllers\newsController;
use App\Http\Controllers\paymentController;
use App\Http\Controllers\productController;
use App\Http\Controllers\user\requestProduct;
// Users Controller
use App\Http\Controllers\user\transactionUsers;
use App\Http\Controllers\user\userController;
use App\Http\Controllers\user\wishlistUser;
use Illuminate\Support\Facades\Route;

Route::get('/index', [indexController::class, 'indexed'])->name('indexed');
Route::get('/index.html', [indexController::class, 'indexed'])->name('indexed');

Route::get('/', [indexController::class, 'index'])->name('index');
Route::get('/beranda', [indexController::class, 'index'])->name('index');
Route::get('/beranda/tentang-kami', [indexController::class, 'aboutme'])->name('index.aboutme');
Route::get('/beranda/berita', [newsController::class, 'news'])->name('index.berita');
Route::get('/beranda/berita/{slug}+{id}', [newsController::class, 'detail'])->name('index.berita.detail');
Route::get('/beranda/kebijakan-privasi', [indexController::class, 'policy'])->name('index.policy');
Route::get('/beranda/syarat-ketentuan', [indexController::class, 'trems'])->name('index.trems.conditions');
Route::get('/beranda/info/pendaftaran-produk', [indexController::class, 'infoProduct'])->name('index.info.produk');
Route::get('/beranda/info/fulfillment', [indexController::class, 'fulfillment'])->name('index.info.fulfillment');
Route::get('/beranda/info/enabler', [indexController::class, 'enambler'])->name('index.info.enabler');
Route::get('/beranda/info/captive-market', [indexController::class, 'market'])->name('index.info.market');
Route::get('/beranda/info/barang-jasa-lkpp', [indexController::class, 'productService'])->name('index.info.service.product');

Route::get('/permintaan-penawaran/data', [requestProduct::class, 'data'])->name('rfq.data');

// product routing
Route::get('/beranda/produk', [productController::class, 'product'])->name('product');
Route::get('/beranda/produk/kategori/{ctg}', [productController::class, 'productCtg'])->name('product.category');
Route::get('/beranda/produk/pencarian/', [productController::class, 'search'])->name('product.search');
Route::get('/beranda/produk/{slug}', [productController::class, 'detail'])->name('product.detail');
Route::get('/beranda/produk/tambah/list/{id}', [productController::class, 'wishlist'])->name('wishlist');
// orders routinngg
Route::get('/beranda/keranjang-belanja', [cartController::class, 'index'])->name('cart');
Route::get('/beranda/pemesanan/checkout', [checkoutController::class, 'checkout'])->name('checkout');
// nota and payment
Route::get('/beranda/pemesanan/payment/{id}', [paymentController::class, 'index'])->name('payment');


// router for users
Route::get('/login', [authController::class, 'login'])->name('login');
Route::post('/login/post', [authController::class, 'loginPost'])->name('login.post');
Route::get('/register', [authController::class, 'register'])->name('register');
Route::post('/register/post', [authController::class, 'registerPost'])->name('register.post');
Route::get('/register/validasi/key={key}', [authController::class, 'registerActived'])->name('register.validation');
Route::get('/password/reset/', [authController::class, 'password'])->name('password');
Route::post('/password/reset/akun/', [authController::class, 'passwordPost'])->name('password.post');
Route::get('/password/reset/akun/{key}', [authController::class, 'passwordReset'])->name('password.post.reset');
Route::post('/password/reset/action/', [authController::class, 'passwordResetAction'])->name('password.post.reset.action');
// auth user login with Google API
Route::get('/login/auth/google/', [mediaAuthController::class, 'redirectToGoogle'])->name('login.google');
Route::get('/login/auth/google/callback', [mediaAuthController::class, 'handleGoogleCallback']);
Route::group(['prefix' => 'user',  'middleware' => 'auth:user'], function() {
    Route::get('/', [userController::class, 'index'])->name('user.index');
    Route::get('/logout', [userController::class, 'logout'])->name('user.logout');
    // user wishlist
    Route::get('/wishlist', [wishlistUser::class, 'index'])->name('user.wishlist');
    // transaction user
    Route::get('/transaction/pembayaran', [transactionUsers::class, 'pending'])->name('user.transaction.payment');
    Route::get('/transaction', [transactionUsers::class, 'index'])->name('user.transaction');
    Route::get('/transaction/detail/{id}', [transactionUsers::class, 'detail'])->name('user.transaction.detail');
    // route for rfq
    Route::get('/form/permintaan-penawaran', [requestProduct::class, 'index'])->name('rfq');
});


// router for admins
Route::get('/admin/login', [authAdministrator::class, 'login'])->name('admin.login');
Route::post('/admin/login/store', [authAdministrator::class, 'loginPost'])->name('admin.login.store');
Route::get('/admin/register', [authAdministrator::class, 'register'])->name('admin.register');
Route::post('/admin/register/store', [authAdministrator::class, 'registerPost'])->name('admin.register.store');
Route::group(['prefix' => 'admin',  'middleware' => 'auth:admin'], function() {
    Route::get('/dashboard', [dashboardAdmin::class, 'index'])->name('admin.index');
    // transaction
    Route::get('/transaction', [transactionAdmin::class, 'index'])->name('admin.transaction');
    Route::get('/transaction/{id}', [transactionAdmin::class, 'detail'])->name('admin.transaction.detail');
    // profile routeing
    Route::get('/profile', [profileAdmin::class, 'index'])->name('admin.profile');
    // product routeing
    Route::get('/product', [productAdmin::class, 'index'])->name('admin.product');
    Route::get('/product/create', [productAdmin::class, 'create'])->name('admin.product.create');
    Route::post('/product/store', [productAdmin::class, 'store'])->name('admin.product.store');
    Route::get('/product/edit/{id}', [productAdmin::class, 'edit'])->name('admin.product.edit');
    Route::put('/product/update/{id}', [productAdmin::class, 'update'])->name('admin.product.update');
    Route::get('/product/images/create/{id}', [productAdmin::class, 'images'])->name('admin.product.images');
    Route::post('/product/images/store/{id}', [productAdmin::class, 'storeImages'])->name('admin.product.images.store');
    Route::get('/product/images/delete/{id}', [productAdmin::class, 'deleteImages'])->name('admin.product.images.delete');
    // Routing product category
    Route::get('/product/category', [categoryAdmin::class, 'index'])->name('admin.product.category.index');
    Route::get('/product/category/sub/{id}', [categoryAdmin::class, 'sub'])->name('admin.product.category.sub');

    // Routing news
    Route::get('/news', [newsAdmin::class, 'index'])->name('admin.news');
    Route::get('/news/create', [newsAdmin::class, 'create'])->name('admin.news.create');
    Route::post('/news/create/store', [newsAdmin::class, 'store'])->name('admin.news.create.store');
    Route::get('/news/edit/{id}', [newsAdmin::class, 'edit'])->name('admin.news.edit');
    Route::put('/news/update/{id}', [newsAdmin::class, 'update'])->name('admin.news.update');
    Route::get('/news/upload/editore', [newsAdmin::class, 'editor'])->name('admin.news.upload.editor');

    Route::get('/logout', [authAdministrator::class, 'logout'])->name('admin.logout');
});



Route::get('/enabler/login', [authController::class, 'loginEnabler'])->name('enabler.login');
// enabler
Route::group(['prefix' => 'enabler'], function() {
    Route::get('/dashboard', [indexEnabler::class, 'index'])->name('enabler.index');
});

