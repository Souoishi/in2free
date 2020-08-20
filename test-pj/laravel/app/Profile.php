<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $guarded = [];
    public function profileImage() 
    {
        $imagePath = ($this->image) ? $this->image : 'profile/5gf5X0QYA8F0HH5XCcM1JcMADDWqGqX05RzFL4Sv.png';
        return '/storage/'. $imagePath;
    }

    public function followers()
    {
        return $this->belongsToMany(User::class);
    }

    public function user() 
    {
        return $this->belongsTo(User::class);
    }
}
