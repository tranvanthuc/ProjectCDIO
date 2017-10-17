<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Major extends Model
{
    protected $table = 'majors';

    protected $fillable = ['name'];

    public function users()
    {
    	return $this->hasMany('App\User');
    }

    public function news()
    {
    	return $this->hasMany('App\News');
    }
}
