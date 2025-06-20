<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::view('/', 'livewire.admin-panel')->name('admin');
    Route::view('/cursos', 'livewire.add-curso')->name('admin-cursos');
    //Route::view('/servicos', 'livewire.add-servico')->name('admin-servicos');
    Route::view('/servicos/categorias', 'livewire.capsules.categorias-capsule')->name('admin-servicos-categorias');
    Route::view('/priod-info', 'livewire.priod-info')->name('admin-priod-info');

    // Nova rota de teste - usando get ao invés de view
    Route::get('/servicos', function () {
        return view('adminserviconews');
    })->name('admin-serviconews');

    // Rotas para mensagens
    Route::get('/mensagens', [\App\Http\Controllers\Admin\MensagemController::class, 'index'])
        ->name('admin-mensagens');
    Route::get('/mensagens/{id}', [\App\Http\Controllers\Admin\MensagemController::class, 'show'])
        ->name('admin-mensagem-show');
    Route::delete('/mensagens/{id}', [\App\Http\Controllers\Admin\MensagemController::class, 'destroy'])
        ->name('admin-mensagem-destroy');
});

Route::prefix('cursos')->group(function () {
    Route::view('/', 'livewire.capsules.cursos-capsule')->name('cursos');
    Route::view('/detalhes/{id}', 'livewire.curso-detalhes')->name('curso-detalhe');
    Route::view('/detalhes', 'livewire.curso-detalhes')->name('curso-detalhes');
});

Route::view('/', 'livewire.inicio')->name('inicio');
//Route::view('/servicos', 'Servicos')->name('servicos');

// Nova rota de teste pública - usando get ao invés de view
Route::get('/servicos', function () {
    return view('serviconewpublic');
})->name('serviconews-public');

Route::view('/sobre o priod', 'livewire.sobre')->name('sobre');
Route::view('/contacto', 'livewire.contacto')->name('contacto');

Route::post('/enviar-mensagem', [\App\Http\Controllers\ContactoController::class, 'enviarMensagem'])
    ->name('enviar-mensagem');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::post('/logout', function (Request $request) {
    Auth::guard('web')->logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/');
})->name('logout');

require __DIR__.'/auth.php';
