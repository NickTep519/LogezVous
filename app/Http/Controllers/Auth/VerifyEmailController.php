<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\RedirectResponse;

class VerifyEmailController extends Controller
{
    /**
     * Mark the authenticated user's email address as verified.
     */
    public function __invoke(EmailVerificationRequest $request): RedirectResponse
    {

         $dashboardRoutes = [
            'super-admin' => 'dashboard.admin',
            'admin' => 'dashboard.admin',
            'agency_manager' => 'dashboard.agency',
            'agent' => 'dashboard.agency',
            'demarcheur' => 'dashboard.demarcheur',
            'proprietaire' => 'dashboard.proprietaire',
            'locataire' => 'dashboard.tenant',
        ];

        $user = $request->user() ;

        if ($user->hasVerifiedEmail()) {

            foreach ($dashboardRoutes as $role => $route) {
                if ($user->hasRole($role)) {
                    return redirect()->intended(route($route, absolute: false). '?verified=1');
                }
            }
            // return redirect()->intended(route('dashboard', absolute: false).'?verified=1');
        }

        if ($user->markEmailAsVerified()) {
            event(new Verified($user));
        }

        foreach ($dashboardRoutes as $role => $route) {
            if ($user->hasRole($role)) {
                return redirect()->intended(route($route, absolute: false). '?verified=1');
            }
        }

        return redirect()->intended(route('home', absolute: false));

        // return redirect()->intended(route('dashboard', absolute: false).'?verified=1');
    }
}
