<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    public function counts($guide) {
        $count_tours = $guide->tours()->count();
        //$count_joinings = $user->tours()->count();

        return [
            'count_tours' => $count_tours,
            //'count_joinings' => $count_joinings,
        ];
    }
    
    public function count_users($user) {
        $count_joinings = $user->tours()->count();

        return [
            'count_joinings' => $count_joinings,
        ];
    }

}
