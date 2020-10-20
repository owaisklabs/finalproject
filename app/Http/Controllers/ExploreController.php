<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ExploreController extends Controller
{

    public function index()
    {
        $user = auth()->user();
        $follower = $user->follows()->pluck('following_user_id');

        return view('explore',[
            'users' => User::where('id', '!=',$user->id )->where('id','!=',$follower)->paginate(5),
        ]);


    }

}
