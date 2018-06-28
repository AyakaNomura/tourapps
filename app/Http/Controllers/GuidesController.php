<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GuidesController extends Controller
{
    //ガイドが登録したツアーだけをマイページで表示
    public function show($id)
    {
        $guide = \App\Guide::find($id);
        $tours = $guide->tours()->orderBy('created_at', 'desc')->paginate(10);
        //dd($tours);

        $data = [
            'guide' => $guide,
            'tours' => $tours,
        ];

        $data += $this->counts($guide);
        
        return view('guide.show', $data);
    }
}
