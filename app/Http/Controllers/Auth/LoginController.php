<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    /**
     * Mostrar el formulario de login
     */
    public function index()
    {
        return view('auth.login');
    }

    /**
     * Procesar el login
     */
    public function store(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ], [
            'email.required' => 'El email es obligatorio',
            'email.email' => 'Ingresa un email válido',
            'password.required' => 'La contraseña es obligatoria',
        ]);

        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();
            
            // Redirigir al feed después del login
            return redirect()->intended(route('feed'));
        }

        throw ValidationException::withMessages([
            'email' => 'Las credenciales no coinciden con nuestros registros.',
        ]);
    }

    /**
     * Cerrar sesión
     */
    public function destroy(Request $request)
    {
        Auth::logout();
        
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect()->route('home');
    }
}