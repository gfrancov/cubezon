<?php

namespace App\Actions\Fortify;

use Illuminate\Support\Facades\Auth;
use Laravel\Fortify\Contracts\LoginResponse;
use Laravel\Fortify\LoginRequest;

class AuthenticateUsingName
{
    /**
     * Attempt to authenticate a user using their username.
     *
     * @param  \Laravel\Fortify\LoginRequest  $request
     * @return mixed
     */
    public function __invoke(LoginRequest $request)
    {
        // Validar que los campos 'name' y 'password' estén presentes
        $request->validate([
            'name' => 'required|string',
            'password' => 'required|string',
        ]);

        // Intentar autenticar al usuario usando 'name' y 'password'
        if (Auth::attempt(['name' => $request->name, 'password' => $request->password], $request->boolean('remember'))) {
            // Regenerar la sesión para evitar ataques de fijación de sesión
            $request->session()->regenerate();

            // Retornar una respuesta de login exitosa
            return app(LoginResponse::class);
        }

        // Si la autenticación falla, retornar con un error
        return back()->withErrors([
            'name' => __('auth.failed'),
        ]);
    }
}
