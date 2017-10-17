<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'news';

    protected $fillable = ['title', 'slug', 'subject', 'description', 'price',	 'image', 'status', 'user_id', 'major_id'];

    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function major()
    {
    	return $this->belongsTo('App\Major');
    }

    public function subject()
    {
        return $this->belongsTo('App\Subject');
    }
}
