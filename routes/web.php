<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PenawaranController;

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

Route::resource('penawaran', PenawaranController::class, ['except' => [
    'destroy'
]]);
Route::post('/penawaran/delete/{penawaran}', [PenawaranController::class, 'destroy'])->name('penawaran.destroy');
Route::post('/import', [PenawaranController::class, 'import'])->name('penawaran.import');
Route::get('/export', [PenawaranController::class, 'export'])->name('penawaran.export');
