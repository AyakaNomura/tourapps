<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    protected $fillable = ['tour_name', 'place', 'start_date', 'end_date', 'price', 'category', 'content', 'guide_id', 'thum'];
    
    public function guide(){
        return $this->belongsTo(Guide::class);
    }
    
    public function users()
    {
        return $this->belongsToMany(User::class, 'user_tours', 'tour_id', 'user_id')->withPivot('type')->withTimestamps();
    }

    public function join_users()
    {
        return $this->users()->where('type', 'join');
    }
}
