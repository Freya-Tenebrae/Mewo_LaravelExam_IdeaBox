<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Cache;

//use Illuminate\Http\Request;

class PageController extends Controller
{
    public function Welcome()
    {

        $userCount = Cache::remember('user_count', 600, function () {
            // Cette fonction ne sera exécutée que toutes les 10 minutes.
            return User::count();
        });
            return view('pages.welcome', ['userCount' => $userCount]);
    }
}
