<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rules\Password;

class PasswordController extends Controller
{
    /**
     * Update the user's password.
     */
    
    
    // Function which allows everyone to set neww password
    // public function update(Request $request): RedirectResponse
    // {
    //     $validated = $request->validateWithBag('updatePassword', [
    //         'current_password' => ['required', 'current_password'],
    //         'password' => ['required', Password::defaults(), 'confirmed'],
    //     ]);

    //     $request->user()->update([
    //         'password' => Hash::make($validated['password']),
    //     ]);

    //     return back()->with('status', 'password-updated');
    // }

    // Function which blocks everyoune to set neww password
    public function update(Request $request): RedirectResponse
    {
    if (!Gate::allows(\App\Enums\PermissionEnum::UPDATE_OWN_PROFILE->value)) {
        return back()->with('error', 'As a demo user, you cannot change your password');
    }
    $validated = $request->validateWithBag('updatePassword', [
        'current_password' => ['required', 'current_password'],
        'password' => ['required', Password::defaults(), 'confirmed'],
    ]);
        $request->user()->update([
            'password' => Hash::make($validated['password']),
        ]);
        return back()->with('status', 'password-updated');
    }

}




