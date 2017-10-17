<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\News;
use App\Major;

class SearchController extends Controller
{

    public function autocomplete(Request $request)
    {
    	$term = $request->term;
        $data = News::where('title', 'LIKE', '%'. $term .'%')
        ->where('status', 1)
        ->where('user_lock', 0)
        // ->take(5)
        ->get();
        $results = array();
        foreach($data as $key => $v)
        {
            $results[] = ['id'=>$v->id, 'value' => $v->title];
        }
        return response()->json($results);
    }
    
}
