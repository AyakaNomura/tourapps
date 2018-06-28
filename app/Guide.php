<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

//継承するクラスだけModelからAuthenticatableに変えて置く
class Guide extends Authenticatable
{
    //Usersと同様
    protected $fillable = [
        'name', 'email', 'password',
    ];
    
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function tours(){
        return $this->hasMany(Tour::class);
    }
}
