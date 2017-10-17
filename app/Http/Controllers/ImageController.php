<?php

namespace App\Http\Controllers;

use Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ImageController extends Controller
{
    public function getTest()
    {
    	return view('test');
    }

    public function resize($src, $w=100, $h=100)
    {
    	$img = Image::cache(function($image) use ($src, $w, $h){
    		return $image->make(public_path('../storage/app/news/'. $src ))
			   ->resize($w, $h);
		});

    	return \Response::make($img, 200 , array('Content-Type' => 'image/jpg'));
    }

    public function fitImgNews($src, $w=100, $h=100)
    {
    	$img = Image::cache(function($image) use ($src, $w, $h){
			return $image->make(public_path('../storage/app/news/'. $src ))->resize($w, $h);
		});

    	return  \Response::make($img, 200 , array('Content-Type' => 'image/jpg'));
    }

    public function fitImg($src, $w=100, $h=100)
    {
        $img = Image::cache(function($image) use ($src, $w, $h){
            return $image->make(public_path('uploads/images/'. $src ))->fit($w, $h);
        });

        return  \Response::make($img, 200 , array('Content-Type' => 'image/jpg'));
    }

    public function fitAvatar($src, $w=100, $h=100)
    {
        $img = Image::cache(function($image) use ($src, $w, $h){
            return $image->make(public_path('../storage/app/avatars/'. $src ))->fit($w, $h);
        });

        return  \Response::make($img, 200 , array('Content-Type' => 'image/jpg'));
    }

    
}
