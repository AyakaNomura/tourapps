<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Tour;

class UserSearchController extends Controller
{
    public function search(Request $request){
        #キーワード受け取り
        $keyword = $request->input('keyword');
         
        #クエリ生成
        $query = Tour::query();
        
        $user = \Auth::user();
         
        #もしキーワードがあったら
        if(!empty($keyword)){
            $tours = $query->where('place','like','%'.$keyword.'%')->orWhere('tour_name','like','%'.$keyword.'%')->paginate(10);
            //dd($tours);
            
            return view('welcome', ['tours' => $tours, 'user' => $user]);
        }
    }
}
