<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class GreetingController extends Controller
{
    //
    public function index($name, $company='StreamDotMy')

    {
        //current log user

        // $user = auth()->user();

        $user=User::find(1);
        // dd($user);
        // dd($user);
        $name = $user->name;
        // $name = 'Shaiful amir';
        $company = 'streamDotMy';


        // Get /something;
        //method 1
        // return view
        // method 2
        // return view('greeting.hello')->with(['name' => $name, 'campany' => $company]);

        //method 3
        return view('greeting.hello')->with(compact('name','company'));

    }
}
