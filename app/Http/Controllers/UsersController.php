<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\User;
use App\Tour;
use App\Guide;

class UsersController extends Controller
{
    //観光者（ユーザー）が参加したツアーだけをマイページで表示
    public function show($id)
    {
        $user = \App\User::find($id);
        $tours = $user->tours()->orderBy('created_at', 'desc')->paginate(10);
        //dd($tours);

        $data = [
            'user' => $user,
            'tours' => $tours,
        ];

        $data += $this->count_users($user);
        
        return view('user.show', $data);
    }
    
    public function joinings($id)
    {
        $user = User::find($id);
        $joinings = $user->tours()->paginate(10);

        $data = [
            'user' => $user,
            'users' => $joinings,
        ];

        $data += $this->count_users($user);

        return redirect('/');
    }
}
