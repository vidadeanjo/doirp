<?php


use Illuminate\Support\Facades\Route;




    Route::prefix('admin')->middleware('auth')->group(function () {
        Route::view('/', 'livewire.admin-panel')->name('admin');
        Route::view('/cursos', 'livewire.add-curso')->name('admin-cursos');
        Route::view('/servicos', 'livewire.add-servico')->name('admin-servicos');
        Route::view('/servicos/categorias', 'livewire.capsules.categorias-capsule')->name('admin-servicos-categorias');
        Route::view('/priod-info', 'livewire.priod-info')->name('admin-priod-info');

    });

Route::middleware('guest')->group( function () {

    Route::prefix('cursos')->group(function () {
        Route::view('/', 'livewire.capsules.cursos-capsule')->name('cursos');
        Route::view('/detalhes/{id}', 'livewire.curso-detalhes')->name('curso-detalhe');
        Route::view('/detalhes', 'livewire.curso-detalhes')->name('curso-detalhes');
    });
    Route::view('/', 'livewire.inicio')->name('inicio');
    Route::view('/servicos', 'livewire.servicos')->name('servicos');
    Route::view('/sobre o priod', 'livewire.sobre')->name('sobre');
    Route::view('/contacto', 'livewire.contacto')->name('contacto');
});


Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
