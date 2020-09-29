<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Mail;
use Laravel\Passport\HasApiTokens;
use Illuminate\Support\Facades\Cache;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'username', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // do sth (like init) when user is created
    protected static function boot()
    {
        parent::boot(); 
        // this is event fire wherever user is created
        static::created( function ($user){
            // here using create method inside of profile MIGRATION file! , 
            $user->profile()->create([
                'title' => $user->username,
            ]);
                //this is how to send email
            //Mail::to($user->email)->send(new NewUserwelcomeMail())
        });
    }

    public function posts()
    {
        return $this->hasMany(Post::class)->orderBy('created_at', 'DESC');
    }

    public function following()
    {
        return $this->belongsToMany(Profile::class);
    }


    public function profile()
    {
        return $this->hasMany(Profile::class);
    }

    // here posts is not singuler, differing from profile , why? 
    // cus you ll have many posts into ONE user MANY TO MANY

    public function isOnline()
    {
        return Cache::has('user-is-online' . $this->id);
    }

    
}
