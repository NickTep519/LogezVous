<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Property;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function home()
    {
        $users = User::all() ;

        // $i = 0 ;
        // foreach ($users as $user) {
        //     echo " {$i} {$user->email}  {$user->getRoleNames()} <br>" ;
        //     $i++;
        // }

        $properties = Property::where('status', 'disponible')->latest()->paginate(15) ;

        return view('home.main', [
            'properties' => $properties
        ]);
    }
}
