<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard');
    }
    public function search()
    {
        $validated = request()->validate([
            'search' => 'required|min:3|max:240'
        ]);
        $search = \request('search');
        $arrayofsearch = explode(" ", $search);
        $refinedarray = [];
        foreach ($arrayofsearch as $element){
            $ret = DB::connection('MONGODB')->collection('tags')->where('name',$element)->get();
            foreach ($ret as $refined){
                array_push($refinedarray,$refined['name']);

            }
        }
        /*$results = DB::select('SELECT b.* FROM article_tag bt, bookmark b WHERE (bt.tag_name IN (:tag))AND b.id = bt.bookmark_id GROUP BY b.id',
        ['tag' => $refinedarray]);*/
        $articles = DB::table('article_tag as bt')
            ->select('b.*')
            ->join('article as b', 'b.id', '=', 'bt.article_id')
            ->whereIn('bt.tag_name', $refinedarray)
            ->groupBy('b.id')
            ->get();
        return view('searches',['articles' => $articles]);
    }
}
