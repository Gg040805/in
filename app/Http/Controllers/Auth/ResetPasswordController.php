<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\PasswordReset;
use App\Http\Controllers\Controller;

class ResetPasswordController extends Controller
{
    /**
     * Show the form to reset the password.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string|null  $token
     * @return \Illuminate\View\View
     */
    public function showResetForm(Request $request, $token = null)
    {
        return view('reset-password', ['token' => $token, 'email' => $request->email]);
    }

    /**
     * Handle the password reset request and update the user's password.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function reset(Request $request)
    {
        // Validate the request data
        $request->validate([
            'email' => 'required|email',
            'token' => 'required',
            'password' => 'required|confirmed|min:8',
        ]);

        // Attempt to reset the password
        $response = Password::reset($request->only('email', 'password', 'token'), function ($user, $password) {
            $user->password = Hash::make($password);
            $user->save();

            // Dispatch the PasswordReset event
            event(new PasswordReset($user));
        });
        
        // Check the response and redirect accordingly
        return $response === Password::PASSWORD_RESET
                    ? redirect()->route('login')->with('status', __($response))
                    : back()->withErrors(['email' => [__($response)]]);
    }
}

