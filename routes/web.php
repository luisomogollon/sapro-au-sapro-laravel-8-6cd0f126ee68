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
    return view('welcome');
});
Route::post('users/{id?}', function ($id) {
    return 'yeahp';
});


Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('admin-users')->name('admin-users/')->group(static function() {
            Route::get('/',                                             'AdminUsersController@index')->name('index');
            Route::get('/create',                                       'AdminUsersController@create')->name('create');
            Route::post('/',                                            'AdminUsersController@store')->name('store');
            Route::get('/{adminUser}/impersonal-login',                 'AdminUsersController@impersonalLogin')->name('impersonal-login');
            Route::get('/{adminUser}/edit',                             'AdminUsersController@edit')->name('edit');
            Route::post('/{adminUser}',                                 'AdminUsersController@update')->name('update');
            Route::delete('/{adminUser}',                               'AdminUsersController@destroy')->name('destroy');
            Route::get('/{adminUser}/resend-activation',                'AdminUsersController@resendActivationEmail')->name('resendActivationEmail');
        });
    });
});


Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::get('/profile',                                      'ProfileController@editProfile')->name('edit-profile');
        Route::post('/profile',                                     'ProfileController@updateProfile')->name('update-profile');
        Route::get('/password',                                     'ProfileController@editPassword')->name('edit-password');
        Route::post('/password',                                    'ProfileController@updatePassword')->name('update-password');
    });
});


Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('colectores')->name('colectores/')->group(static function() {
            Route::get('/',                                             'ColectoresController@index')->name('index');
            Route::get('/create',                                       'ColectoresController@create')->name('create');
            Route::post('/',                                            'ColectoresController@store')->name('store');
            Route::get('/{colectore}/edit',                             'ColectoresController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'ColectoresController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{colectore}',                                 'ColectoresController@update')->name('update');
            Route::delete('/{colectore}',                               'ColectoresController@destroy')->name('destroy');
        });
    });
});

Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('salida-estados')->name('salida-estados/')->group(static function() {
            Route::get('/',                                             'SalidaEstadoController@index')->name('index');
            Route::get('/create',                                       'SalidaEstadoController@create')->name('create');
            Route::post('/',                                            'SalidaEstadoController@store')->name('store');
            Route::get('/{salidaEstado}/edit',                          'SalidaEstadoController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'SalidaEstadoController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{salidaEstado}',                              'SalidaEstadoController@update')->name('update');
            Route::delete('/{salidaEstado}',                            'SalidaEstadoController@destroy')->name('destroy');
        });
    });
});

Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('presentaciones')->name('presentaciones/')->group(static function() {
            Route::get('/',                                             'PresentacionesController@index')->name('index');
            Route::get('/create',                                       'PresentacionesController@create')->name('create');
            Route::post('/',                                            'PresentacionesController@store')->name('store');
            Route::get('/{presentacione}/edit',                         'PresentacionesController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'PresentacionesController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{presentacione}',                             'PresentacionesController@update')->name('update');
            Route::delete('/{presentacione}',                           'PresentacionesController@destroy')->name('destroy');
        });
    });
});


Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('lingote-estados')->name('lingote-estados/')->group(static function() {
            Route::get('/',                                             'LingoteEstadoController@index')->name('index');
            Route::get('/create',                                       'LingoteEstadoController@create')->name('create');
            Route::post('/',                                            'LingoteEstadoController@store')->name('store');
            Route::get('/{lingoteEstado}/edit',                         'LingoteEstadoController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'LingoteEstadoController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{lingoteEstado}',                             'LingoteEstadoController@update')->name('update');
            Route::delete('/{lingoteEstado}',                           'LingoteEstadoController@destroy')->name('destroy');
        });
    });
});


Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('lingotes')->name('lingotes/')->group(static function() {
            Route::get('/',                                             'LingotesController@index')->name('index');
            Route::get('/create',                                       'LingotesController@create')->name('create');
            Route::post('/',                                            'LingotesController@store')->name('store');
            Route::get('/{lingote}/edit',                               'LingotesController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'LingotesController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{lingote}',                                   'LingotesController@update')->name('update');
            Route::delete('/{lingote}',                                 'LingotesController@destroy')->name('destroy');
        });
    });
});


Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('salidas')->name('salidas/')->group(static function() {
            Route::get('/',                                             'SalidasController@index')->name('index');
            Route::get('/create/{cliente?}',                                       'SalidasController@create')->name('create');
            Route::post('/',                                            'SalidasController@store')->name('store');
            Route::get('/{salida}/edit',                                'SalidasController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'SalidasController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{salida}',                                    'SalidasController@update')->name('update');
            Route::delete('/{salida}',                                  'SalidasController@destroy')->name('destroy');
        });
    });
});


Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('bancos')->name('bancos/')->group(static function() {
            Route::get('/',                                             'BancosController@index')->name('index');
            Route::get('/create',                                       'BancosController@create')->name('create');
            Route::post('/',                                            'BancosController@store')->name('store');
            Route::get('/{banco}/edit',                                 'BancosController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'BancosController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{banco}',                                     'BancosController@update')->name('update');
            Route::delete('/{banco}',                                   'BancosController@destroy')->name('destroy');
        });
    });
});


Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('ordenes')->name('ordenes/')->group(static function() {
            Route::get('/',                                             'OrdenesController@index')->name('index');
            Route::get('/create',                                       'OrdenesController@create')->name('create');
            Route::post('/',                                            'OrdenesController@store')->name('store');
            Route::get('/{ordene}/edit',                                'OrdenesController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'OrdenesController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{ordene}',                                    'OrdenesController@update')->name('update');
            Route::delete('/{ordene}',                                  'OrdenesController@destroy')->name('destroy');
        });
    });
});



Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('barras')->name('barras/')->group(static function() {
            Route::get('/',                                             'BarrasController@index')->name('index');
            Route::get('/create',                                       'BarrasController@create')->name('create');
            Route::post('/',                                            'BarrasController@store')->name('store');
            Route::get('/{barra}/edit',                                 'BarrasController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'BarrasController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{barra}',                                     'BarrasController@update')->name('update');
            Route::delete('/{barra}',                                   'BarrasController@destroy')->name('destroy');
        });
    });
});



Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('comisiones')->name('comisiones/')->group(static function() {
            Route::get('/',                                             'ComisionesController@index')->name('index');
            Route::get('/create',                                       'ComisionesController@create')->name('create');
            Route::post('/',                                            'ComisionesController@store')->name('store');
            Route::get('/{comisione}/edit',                             'ComisionesController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'ComisionesController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{comisione}',                                 'ComisionesController@update')->name('update');
            Route::delete('/{comisione}',                               'ComisionesController@destroy')->name('destroy');
        });
    });
});


Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('leyes')->name('leyes/')->group(static function() {
            Route::get('/',                                             'LeyesController@index')->name('index');
            Route::get('/create',                                       'LeyesController@create')->name('create');
            Route::post('/',                                            'LeyesController@store')->name('store');
            Route::get('/{leye}/edit',                                  'LeyesController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'LeyesController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{leye}',                                      'LeyesController@update')->name('update');
            Route::delete('/{leye}',                                    'LeyesController@destroy')->name('destroy');
        });
    });
});


Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('virutas')->name('virutas/')->group(static function() {
            Route::get('/',                                             'VirutasController@index')->name('index');
            Route::get('/create',                                       'VirutasController@create')->name('create');
            Route::post('/',                                            'VirutasController@store')->name('store');
            Route::get('/{virutum}/edit',                               'VirutasController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'VirutasController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{virutum}',                                   'VirutasController@update')->name('update');
            Route::delete('/{virutum}',                                 'VirutasController@destroy')->name('destroy');
        });
    });
});


Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('metales')->name('metales/')->group(static function() {
            Route::get('/',                                             'MetalesController@index')->name('index');
            Route::get('/create',                                       'MetalesController@create')->name('create');
            Route::post('/',                                            'MetalesController@store')->name('store');
            Route::get('/{metale}/edit',                                'MetalesController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'MetalesController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{metale}',                                    'MetalesController@update')->name('update');
            Route::delete('/{metale}',                                  'MetalesController@destroy')->name('destroy');
        });
    });
});


Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('movimientos')->name('movimientos/')->group(static function() {
            Route::get('/',                                             'MovimientosController@index')->name('index');
            Route::get('/create',                                       'MovimientosController@create')->name('create');
            Route::post('/',                                            'MovimientosController@store')->name('store');
            Route::get('/{movimiento}/edit',                            'MovimientosController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'MovimientosController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{movimiento}',                                'MovimientosController@update')->name('update');
            Route::delete('/{movimiento}',                              'MovimientosController@destroy')->name('destroy');
        });
    });
});


Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('clientes')->name('clientes/')->group(static function() {
            Route::get('/',                                             'ClientesController@index')->name('index');
            Route::get('/create',                                       'ClientesController@create')->name('create');
            Route::post('/',                                            'ClientesController@store')->name('store');
            Route::get('/{cliente}/edit',                               'ClientesController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'ClientesController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{cliente}',                                   'ClientesController@update')->name('update');
            Route::delete('/{cliente}',                                 'ClientesController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('bloques')->name('bloques/')->group(static function() {
            Route::get('/',                                             'BloquesController@index')->name('index');
            Route::get('/create',                                       'BloquesController@create')->name('create');
            Route::post('/',                                            'BloquesController@store')->name('store');
            Route::get('/{bloque}/edit',                                'BloquesController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'BloquesController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{bloque}',                                    'BloquesController@update')->name('update');
            Route::delete('/{bloque}',                                  'BloquesController@destroy')->name('destroy');
        });
    });
});