<?php

namespace App;



use Eloquent;

// use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;

class User extends Eloquent implements Authenticatable
{
     use AuthenticableTrait;




    protected $table = 'users';

    



    protected $fillable = ['username', 'password', 'name', 'email', 'phone', 'address', 'image', 'level_id', 'major_id'];
// level
    public function level()
    {
    	return $this->belongsTo('App\Level');
    }
// major
    public function major()
    {
    	return $this->belongsTo('App\Major');
    }
// news
    public function news()
    {
    	return $this->hasMany('App\News');
    }
// reports
    public function reports()
    {
        return $this->hasMany('App\Report');
    }
// socialProvider
    public function socialProviders()
    {
        return $this->hasMany(SocialProvider::class);
    }
}
