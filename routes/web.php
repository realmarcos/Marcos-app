<?php

use App\Http\Controllers\ContatoController;
use App\Http\Controllers\EmailSettingController;
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

Route::get('/teste', function () {
    return view('auth/login2');
});

Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/enviados', function () {
    return view('enviados');
})->middleware(['auth'])->name('enviados');

// Route::get('/contatos', function () {
//     return view('contatos');
// })->middleware(['auth'])->name('contatos');

// Contatos 
Route::get('/contatos', [ContatoController::class, 'Contatos'])->middleware(['auth'])->name('contatos');

Route::post('/addcontato', [ContatoController::class, 'CreatePost'])->middleware(['auth'])->name('CreatePost');

Route::get('/addcontato', [ContatoController::class, 'create'])->middleware(['auth'])->name('addcontato');

Route::delete('/contatos/{id}', [ContatoController::class, 'destroy'])->middleware(['auth'])->name('delcontato');

Route::get('/contatos/{id}', [ContatoController::class, 'edit'])->middleware(['auth'])->name('editcontato');

Route::put('/contatos/update/{id}', [ContatoController::class, 'update'])->middleware(['auth'])->name('updatecontato');

// Email settings 
Route::get('/settings', [EmailSettingController::class, 'Create'])->middleware(['auth'])->name('config');
Route::post('/settings', [EmailSettingController::class, 'CreatePost'])->middleware(['auth'])->name('configPost');
Route::post('/testerota', [EmailSettingController::class, 'teste'])->middleware(['auth'])->name('testerota');
// Route::get('/settings', function () {
//     return view('config');
// })->middleware(['auth'])->name('config');


Route::get('/profile', function () {
    return view('profile');
})->middleware(['auth'])->name('profile');



require __DIR__ . '/auth.php';
