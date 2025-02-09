<?php

namespace App\Livewire\Forms;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Validate;
use Livewire\Form;

class LoginForm extends Form
{
    #[Validate('required|string')]
    public string $password = '';

    /**
     * Attempt to authenticate the request's credentials.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function authenticate(): void
    {
        // Carregar o único usuário admin
        $admin = Auth::getProvider()->retrieveByCredentials(['email' => 'priodcentrotecnicoprofissional@gmail.com']); // Substitua pelo e-mail fixo do admin

        if (! $admin || ! Hash::check($this->password, $admin->getAuthPassword())) {
            throw ValidationException::withMessages([
                'form.password' => trans('auth.failed'),
            ]);
        }

        // Logar o admin
        Auth::login($admin);
    }
}
