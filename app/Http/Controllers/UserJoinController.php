<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserJoinController extends Controller
{
    public function store(Request $request, $id)
    {
        \Auth::user()->join($id);
        return redirect()->back();
    }

    public function destroy($id)
    {
        \Auth::user()->dont_join($id);
        return redirect()->back();
    }
}
