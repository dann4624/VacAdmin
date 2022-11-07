<?php

use App\Http\Controllers\ArtisanController;
use App\Http\Controllers\BoxController;
use App\Http\Controllers\BoxLogController;
use App\Http\Controllers\LogActionController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OtherController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TargetController;
use App\Http\Controllers\TokenController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ZoneController;
use App\Http\Controllers\ZoneLogController;
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
Route::get('/', [OtherController::class, 'root'])->name('root');

// Authorization Routes
Route::get('/login', [LoginController::class, 'form'])->name('login.form');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

// Artisan Routes
Route::get('/Artisan/cache', [ArtisanController::class, 'cacheAll'])->name('artisan.cache.base');
Route::get('/Artisan/cache/all', [ArtisanController::class, 'cacheAll'])->name('artisan.cache.all');
Route::get('/Artisan/cache/route', [ArtisanController::class, 'cacheRoute'])->name('artisan.cache.route');
Route::get('/Artisan/cache/config', [ArtisanController::class, 'cacheConfig'])->name('artisan.cache.config');
Route::get('/Artisan/cache/view', [ArtisanController::class, 'cacheView'])->name('artisan.cache.view');
Route::get('/Artisan/cache/clear', [ArtisanController::class, 'cacheClear'])->name('artisan.cache.clear');

Route::middleware(['loggedin'])->group(function () {

    // Non-Entity Routes
    Route::get('/home', [OtherController::class, 'home'])->name('home');

    // Targets
    Route::get('/types/deleted', [TargetController::class, 'deleted'])->name('targets.deleted');
    Route::delete('/types/{id}/force', [TargetController::class, 'delete_force'])->name('targets.delete_force');
    Route::put('/types/{id}/restore', [TargetController::class, 'restore'])->name('targets.restore');
    Route::resource('types', '\App\Http\Controllers\TypeController');

    // Targets
    Route::get('/targets/deleted', [TargetController::class, 'deleted'])->name('targets.deleted');
    Route::delete('/targets/{id}/force', [TargetController::class, 'delete_force'])->name('targets.delete_force');
    Route::put('/targets/{id}/restore', [TargetController::class, 'restore'])->name('targets.restore');
    Route::resource('targets', '\App\Http\Controllers\TargetController');

    //Roles
    Route::get('/roles/deleted', [RoleController::class, 'deleted'])->name('roles.deleted');
    Route::delete('/roles/{id}/force', [RoleController::class, 'delete_force'])->name('roles.delete_force');
    Route::put('/roles/{id}/restore', [RoleController::class, 'restore'])->name('roles.restore');
    Route::get('/roles/{id}/permissions', [RoleController::class, 'permissions_form'])->name('roles.permissions.form');
    Route::put('/roles/{id}/permissions', [RoleController::class, 'permissions_submit'])->name('roles.permissions.submit');
    Route::resource('roles', '\App\Http\Controllers\RoleController');

    //Tokens
    Route::get('/tokens/deleted', [TokenController::class, 'deleted'])->name('tokens.deleted');
    Route::delete('/tokens/{id}/force', [TokenController::class, 'delete_force'])->name('tokens.delete_force');
    Route::put('/tokens/{id}/restore', [TokenController::class, 'restore'])->name('tokens.restore');
    Route::resource('tokens', '\App\Http\Controllers\TokenController');

    // Log Actions
    Route::get('/logActions/deleted', [LogActionController::class, 'deleted'])->name('logActions.deleted');
    Route::delete('/logActions/{id}/force', [LogActionController::class, 'delete_force'])->name('logActions.delete_force');
    Route::put('/logActions/{id}/restore', [LogActionController::class, 'restore'])->name('logActions.restore');
    Route::resource('logActions', '\App\Http\Controllers\LogActionController');

    // Users
    Route::get('/users/deleted', [UserController::class, 'deleted'])->name('users.deleted');
    Route::delete('/users/{id}/force', [UserController::class, 'delete_force'])->name('users.delete_force');
    Route::put('/users/{id}/restore', [UserController::class, 'restore'])->name('users.restore');
    Route::resource('users', '\App\Http\Controllers\UserController');

    // User Logs
    Route::get('/logs/deleted', [LogController::class, 'deleted'])->name('logs.deleted');
    Route::delete('/logs/{id}/force', [LogController::class, 'delete_force'])->name('logs.delete_force');
    Route::put('/logs/{id}/restore', [LogController::class, 'restore'])->name('logs.restore');
    Route::resource('logs', '\App\Http\Controllers\LogController');

    // Types
    Route::get('/types/deleted', [TypeController::class, 'deleted'])->name('types.deleted');
    Route::delete('/types/{id}/force', [TypeController::class, 'delete_force'])->name('types.delete_force');
    Route::put('/types/{id}/restore', [TypeController::class, 'restore'])->name('types.restore');
    Route::resource('types', '\App\Http\Controllers\TypeController');

    // Zones
    Route::get('/zones/deleted', [ZoneController::class, 'deleted'])->name('zones.deleted');
    Route::delete('/zones/{id}/force', [ZoneController::class, 'delete_force'])->name('zones.delete_force');
    Route::put('/zones/{id}/restore', [ZoneController::class, 'restore'])->name('zones.restore');
    Route::get('/zones/{id}/permissions', [ZoneController::class, 'types_form'])->name('zones.types.form');
    Route::put('/zones/{id}/permissions', [ZoneController::class, 'types_submit'])->name('zones.types.submit');
    Route::resource('zones', '\App\Http\Controllers\ZoneController');

    // Zone Logs
    Route::get('/zoneLogs/deleted', [ZoneLogController::class, 'deleted'])->name('zoneLogs.deleted');
    Route::delete('/zoneLogs/{id}/force', [ZoneLogController::class, 'delete_force'])->name('zoneLogs.delete_force');
    Route::put('/zoneLogs/{id}/restore', [ZoneLogController::class, 'restore'])->name('zoneLogs.restore');
    Route::resource('zoneLogs', '\App\Http\Controllers\ZoneLogController');

    // Positions
    Route::get('/positions/deleted', [PositionController::class, 'deleted'])->name('positions.deleted');
    Route::delete('/positions/{id}/force', [PositionController::class, 'delete_force'])->name('positions.delete_force');
    Route::put('/positions/{id}/restore', [PositionController::class, 'restore'])->name('positions.restore');
    Route::resource('positions', '\App\Http\Controllers\PositionController');

    // Boxes
    Route::get('/boxes/deleted', [BoxController::class, 'deleted'])->name('boxes.deleted');
    Route::delete('/boxes/{id}/force', [BoxController::class, 'delete_force'])->name('boxes.delete_force');
    Route::put('/boxes/{id}/restore', [BoxController::class, 'restore'])->name('boxes.restore');
    Route::resource('boxes', '\App\Http\Controllers\BoxController');

    // Box Logs
    Route::get('/boxLogs/deleted', [BoxLogController::class, 'deleted'])->name('boxLogs.deleted');
    Route::delete('/boxLogs/{id}/force', [BoxLogController::class, 'delete_force'])->name('boxLogs.delete_force');
    Route::put('/boxLogs/{id}/restore', [BoxLogController::class, 'restore'])->name('boxLogs.restore');
    Route::resource('boxLogs', '\App\Http\Controllers\BoxLogController');

});
