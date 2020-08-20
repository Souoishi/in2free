<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // here telling laravel "it ok , do not need to protec, just pass it!"
    protected $guarded = [];
    public function user() 
    {
        return $this->belongsTo(User::class);
    }
}
