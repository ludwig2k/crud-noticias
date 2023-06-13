<?php

use App\Http\Controllers\NoticiaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController; 
use App\Http\Controllers\AdminController; 
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/





Route::middleware('auth')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/noticia/index', [NoticiaController::class, 'index'])->name('noticia.index');
    Route::get('/noticia/{id}', [NoticiaController::class, 'verNoticia'])->name('noticia.ver');
    Route::get('/noticia/editar/{id}', [NoticiaController::class, 'editarIndex'])->name('noticia.editar');
    Route::put('/noticia/update', [NoticiaController::class, 'update'])->name('noticia.update');
    Route::get('/minhasNoticias', [NoticiaController::class, 'minhasNoticias'])->name('noticia.user');
    Route::delete('/noticia/delete/{id}', [NoticiaController::class, 'destroy'])->name('noticia.destroy');
    Route::post('/noticia/store', [NoticiaController::class, 'store'])->name('noticia.store');


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('admin')->group(function () {
    Route::get('/admin/usuarios', [AdminController::class, 'tabelaUsuarios'])->name('admin.usuarios');
    Route::get('/admin/editarUsuario/{id}', [AdminController::class, 'editarUser'])->name('admin.editarUser');
    Route::delete('/admin/delete/usuario/{id}', [AdminController::class, 'destroyUser'])->name('admin.destroyUser');
    Route::put('/admin/usuario/update', [AdminController::class, 'updateUser'])->name('admin.updateUser');

    Route::get('/admin/noticias', [AdminController::class, 'tabelaNoticias'])->name('admin.noticias');
    Route::get('/admin/editarNoticia/{id}', [AdminController::class, 'editarNoticia'])->name('admin.editarNoticia');
    Route::delete('/admin/delete/noticia/{id}', [AdminController::class, 'destroyNoticia'])->name('admin.destroyNoticia');
    Route::put('/admin/noticia/update', [AdminController::class, 'updateNoticia'])->name('admin.updateNoticia');
});
require __DIR__.'/auth.php';
