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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');


/////////////////////////////////////////////


    Route::get('/admin/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/admin/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/admin', 'AdminController@index')->name('admin.dashboard');
    Route::post('/admin/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
    Route::post('/users/logout', 'Auth\LoginController@userLogout')->name('users.logout');
/////////////////////////////////////////
Route::group(['middleware'=>'auth:admin'],function ()
{
    Route::resource('admin/users', 'AdminsController',['names'=>[


        'index'=>'admin.users.index',
        'create'=>'admin.users.create',
        'store'=>'admin.users.store']
    ]);



    Route::resource('admin/restaurants', 'AdminRestaurantsController',['names'=>[


    'index'=>'admin.restaurants.index',
    'create'=>'admin.restaurants.create',
    'store'=>'admin.restaurants.store',
    'edit'=>'admin.restaurants.edit'
]]);

    Route::resource('admin/menus', 'AdminMenusController',['names'=>[

        'index'=>'admin.menus.index',
        'create'=>'admin.menus.create',
        'store'=>'admin.menus.store',
        'edit'=>'admin.menus.edit'
    ]]);


});

Route::resource('user/reservations', 'UsersController',['names'=>[

    'index'=>'user.reservations.index',
    'create'=>'user.reservations.create',
    'store'=>'user.reservations.store',
    'edit'=>'user.reservations.edit'
]]);

Route::resource('user/profiless', 'EditProfileController',['names'=>[

    'index'=>'user.profiles.index',
    'edit'=>'user.profiles.edit'
]]);

Route::resource('user/menus', 'UserMenusController',['names'=>[

    'index'=>'user.menus.index'
]]);

Route::resource('user/reservationss', 'UserReservationssController',['names'=>[

    'index'=>'user.reservationss.index'
]]);







