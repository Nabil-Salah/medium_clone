<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard');
    }
    public function search(string $search)
    {
        $arrayofsearch = explode(" ", $search);
        $refinedarray = [];
        foreach ($arrayofsearch as $element){
            $ret = Article::find('name', $element);
            array_push($refinedarray,$ret->name);
        }
        $results = DB::select('SELECT b.* FROM tagmap bt, bookmark b, tag t WHERE (bt.tag_name IN (:tag))AND b.id = bt.bookmark_id GROUP BY b.id',
        ['tag' => $refinedarray]);
        return view('articles',$results);
    }
}
