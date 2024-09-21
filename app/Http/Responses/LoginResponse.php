<?php

namespace App\Http\Responses;

use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;

class LoginResponse implements LoginResponseContract
{
    public function toResponse($request)
    {
        $user = $request->user();

        // Redirect based on user type
        if ($user->userType == 'ADM') {
            return redirect()->route('admin.home');
        } elseif ($user->userType == 'USR') {
            return redirect()->route('user.home');
        }

        // Default fallback
        return redirect()->route('dashboard');
    }
}
