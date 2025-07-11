<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'fname' => ['required', 'string', 'max:255'],
            'lname' => ['required', 'string', 'max:255'],
            'pseudo_or_agency' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'phone' => ['required', 'unique:users,phone'],
            'role' => ['string', 'required', 'in:agence,demarcheur,client'],
            'password' => ['required', 'confirmed', 'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/'],

            // 'phone' => ['required', 'phone:' . $request->dial_code],

        ]);

        // $ip = $request->ip();
        $ip = "41.79.217.123";

        $response = Http::get("https://ipinfo.io/{$ip}?token=ee0d63017fcc15");
        $data = $response->json();

        // dd($data) ;


        $user = User::create([
            'fname' => $request->fname,
            'lname' => $request->lname,
            'pseudo_or_agency' => $request->pseudo_or_agency,
            'email' => $request->email,
            'phone' => $request->dial_code . $request->phone,
            'password' => Hash::make($request->password),
        ]);

        $user->ip_address = $ip;
        $user->city = $data['city'] ?? null;
        $user->region = $data['region'] ?? null;
        $user->country = $data['country'] ?? null;
        $user->loc = $data['loc'] ?? null;
        $user->save();

        if (Role::where('name', $request->role)->exists()) {
            $user->assignRole($request->role);
        }


        event(new Registered($user));

        Auth::login($user);

        return redirect(route('dashboard', absolute: false));
    }
}
