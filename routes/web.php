<?php

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
    return redirect('/member');
});

Route::prefix('member')->group(function () {
    Route::get('/login', function () {
        return view('pages.user.login');
    });
    Route::post('/login', 'UserController@userLogin');
    Route::get('/register', function () {
        return view('pages.user.register');
    });
    Route::post('/register', 'UserController@userRegister');

    Route::group(['middleware' => ['member-auth']], function () {
        Route::get('/logout', 'UserController@userLogout');
        Route::get('/', 'UserController@showDashboardPage');
        Route::prefix('car')->group(function () {
            Route::get('/list', 'UserController@showCars');
            Route::prefix('car')->group(function () {
            });
        });
        Route::prefix('order')->group(function () {
            Route::get('/list', 'UserController@showOrders');
        });
    });
});

Route::get('/theme', 'PagesController@index');

Route::prefix('admin')->group(function () {
    Route::get('/login', 'AdminController@showLogin');
    Route::post('/login', 'AdminController@adminLogin');
    Route::middleware(['admin-auth'])->group(function () {
        Route::get('logout', 'AdminController@adminLogout');
        Route::get('/', 'AdminController@showDashboard');
        Route::prefix('manager')->group(function () {
            Route::get('/list', 'AdminController@showManagers');
            Route::get('/new', 'AdminController@showNewManager');
            Route::post('/new', 'AdminController@newManager');
        });
        Route::prefix('car')->group(function () {
            Route::get('/list', 'AdminController@showCars');
            Route::get('/new', 'AdminController@showNewCar');
            Route::post('/new', 'AdminController@newCar');
            Route::get('/{carId}', 'AdminController@showEditCar');
            Route::post('/{carId}', 'AdminController@editCar');
        });
    });
});

Route::prefix('manager')->group(function () {
    Route::get('/login', 'ManagerController@showLogin');
    Route::post('/login', 'ManagerController@managerLogin');
    Route::middleware(['manager-auth'])->group(function () {
        Route::get('logout', 'ManagerController@managerLogout');
        Route::get('/', 'ManagerController@showDashboard');
        Route::prefix('member')->group(function () {
            Route::get('/list', 'ManagerController@showUsers');
            Route::get('/new', 'ManagerController@showNewUser');
            Route::post('/new', 'ManagerController@newUser');
        });
    });
});

// Demo routes
Route::prefix('theme')->group(function () {
    Route::get('/', 'PagesController@index');
    Route::get('/datatables', 'PagesController@datatables');
    Route::get('/ktdatatables', 'PagesController@ktDatatables');
    Route::get('/select2', 'PagesController@select2');
    Route::get('/jquerymask', 'PagesController@jQueryMask');
    Route::get('/icons/custom-icons', 'PagesController@customIcons');
    Route::get('/icons/flaticon', 'PagesController@flaticon');
    Route::get('/icons/fontawesome', 'PagesController@fontawesome');
    Route::get('/icons/lineawesome', 'PagesController@lineawesome');
    Route::get('/icons/socicons', 'PagesController@socicons');
    Route::get('/icons/svg', 'PagesController@svg');
    // Quick search dummy route to display html elements in search dropdown (header search)
    Route::get('/quick-search', 'PagesController@quickSearch')->name('quick-search');
});