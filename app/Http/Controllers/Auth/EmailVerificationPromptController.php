<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EmailVerificationPromptController extends Controller
{
    /**
     * Display the email verification prompt.
     */
    public function __invoke(Request $request): RedirectResponse|View
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

        $routee = null;

        foreach ($dashboardRoutes as $role => $route) {
            if ($request->user()->hasRole($role)) {
                $routee = route($route);
                break;
            }
        }


        $routee ??= route('home');

        return $request->user()->hasVerifiedEmail()
            ? redirect()->intended($routee)
            : view('auth.verify-email');
    }
}
