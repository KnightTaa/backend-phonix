<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        // return redirect()->intended(route('dashboard', absolute: false));
        return $this->sendLoginResponse($request);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    protected function sendLoginResponse(Request $request): RedirectResponse
    {

        $request->session()->regenerate();

        // $this->clearLoginAttempts($request);

        // Determine the user's role and redirect accordingly
        $user = Auth::user();
        $userRole = $user->roles->first();
        if ($userRole->name === 'admin') {  // Adjust this condition to fit your role logic
            return redirect()->intended('admin/dashboard');
        } else {
            return redirect()->intended('user/dashboard');
        }
    }
}
