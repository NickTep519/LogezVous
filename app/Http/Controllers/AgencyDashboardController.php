<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;

class AgencyDashboardController extends Controller
{
    public function index()
    {

        return view('dashboard.agencies.index');
    }

    public function agents()
    {


        $agents = Auth::user()->agency->agents()->latest()->where('id', '!=', Auth::user()->id)->paginate(8);

        // dd($agents) ;

        return view('dashboard.agencies.agents', [
            'agents' => $agents
        ]);
    }

    public function agentShow(User $agent)
    {

        $properties = $agent->properties()->paginate(10);
        $reviews = $agent->receivedReviews()->latest()->take(5)->get();

        return view('dashboard.agencies.agent-show', [
            'agent' => $agent,
            'properties' => $properties,
            'reviews' => $reviews
        ]);
    }

    public function addAgent()
    {

        $agent = new User();

        return view('dashboard.agencies.add-agent-form', [
            'agent' => $agent
        ]);
    }

    public function addAgentStore(Request $request)
    {

        $request->validate([
            'fname' => ['required', 'string', 'max:255'],
            'lname' => ['required', 'string', 'max:255'],
            'pseudo_or_agency' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'phone' => ['required', 'unique:users,phone'],
            'city' => ['required', 'string', 'max:255'],
            'password' => ['required', 'confirmed', 'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/'],

        ]);

        // $ip = $request->ip();
        $ip = "41.79.217.123";

        $response = Http::get("https://ipinfo.io/{$ip}?token=ee0d63017fcc15");
        $data = $response->json();


        $agent = User::create([
            'fname' => $request->fname,
            'lname' => $request->lname,
            'pseudo_or_agency' => $request->pseudo_or_agency,
            'email' => $request->email,
            'phone' => $request->dial_code . $request->phone,
            'password' => Hash::make($request->password),
        ]);

        $agent->ip_address = $ip;
        $agent->region = $data['region'] ?? null;
        $agent->country = $data['country'] ?? null;
        $agent->loc = $data['loc'] ?? null;
        $agent->city =  $request->city;
        $agent->save();

        $agent->assignRole('agent');

        $agent->agency()->associate(Auth::user()->agency);

        $agent->save();


        return redirect()->route('dashboard.agents');
    }

    public function infosAgent(User $agent) : array
    {

        $metrics = [
            ['label' => 'Objectif ventes', 'value' => 70],
            ['label' => 'Biens vendus', 'value' => 50],
            ['label' => 'Satisfaction clients', 'value' => 90],
        ];

        return $metrics ;
    }
}
