<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected function redirectTo()
    {
        // Determine the user's role and redirect accordingly
        $user = Auth::user();
        if ($user->role === 'admin') {  // Adjust this condition to fit your role logic
            return '/admin/dashboard';
        } else {
            return '/user/dashboard';
        }
    }

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
