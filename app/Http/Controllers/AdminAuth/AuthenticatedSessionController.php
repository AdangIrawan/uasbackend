<?php

namespace App\Http\Controllers\AdminAuth;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminAuth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Providers\RouteServiceProvider;

class AuthenticatedSessionController extends Controller
{
    public function create(): View
    {
        return view('admin.auth.login');
    }

    public function store(LoginRequest $request): RedirectResponse
    {
        $credentials = $request->only('email', 'password');

        $admin = \App\Models\Admin::where('email', $credentials['email'])->first();

        if (!$admin) {
            return redirect()->route('admin.login')
                ->withErrors(['email' => 'Email tidak terdaftar'])
                ->withInput($request->only('email'));
        }

        if (!Auth::guard('admin')->attempt($credentials, $request->filled('remember'))) {
            return redirect()->route('admin.login')
                ->withErrors(['password' => 'Password salah'])
                ->withInput($request->only('email'));
        }

        $request->session()->regenerate();
        return redirect()->intended('/admin/dashboard');
    }

    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('admin')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login');
    }
}
