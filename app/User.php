<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];
    
    public function tours()
    {
        return $this->belongsToMany(Tour::class, 'user_tours', 'user_id', 'tour_id')->withPivot('type')->withTimestamps();
    }
    
    
    public function join_tours()
    {
        return $this->tours()->where('type', 'join');
    }

    public function join($tourId)
    {
        // 既に 参加 しているかの確認
        $exist = $this->is_joining($tourId);

        if ($exist) {
            // 既に 参加 していれば何もしない
            return false;
        } else {
            // 未 参加 であれば 参加 する
            $this->tours()->attach($tourId, ['type' => 'join']);
            return true;
        }
    }

    public function dont_join($tourId)
    {
        // 既に 参加 しているかの確認
        $exist = $this->is_joining($tourId);

        if ($exist) {
            // 既に 参加 していれば 参加 を外す
            \DB::delete("DELETE FROM user_tours WHERE user_id = ? AND tour_id = ? AND type = 'join'", [\Auth::user()->id, $tourId]);
        } else {
            // 未 参加 であれば何もしない
            return false;
        }
    }

    public function is_joining($tourId)
    {
        $user = \App\User::find($tourId);
        return $this->tours()->where('tour_id', $tourId)->exists();
        return $user;
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
