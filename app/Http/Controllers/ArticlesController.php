<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArticlesController extends Controller
{
    public function show(Article $article){


        return view('Article.show',compact('article'));
    }

    public function store()
    {
        $validated = request()->validate([
            'description' => 'required|min:3|max:240',
            'title' => 'required|min:3|max:240'
        ]);
        $tags_list = \request('tag');
        $arrayoftags = explode(" ", $tags_list);
        $refinedarray = [];
        foreach ($arrayoftags as $element){
            $ret = DB::connection('MONGODB')->collection('tags')->where('name',$element)->get();

            if(empty($ret)){
                $newtag = new Tag;
                $newtag->setAttribute('name',$element);
                DB::connection('MONGODB')->collection('tags')->save($newtag);
            }
            foreach ($ret as $refined){
                array_push($refinedarray,$refined['name']);
            }
        }
        $validated['authorid'] = auth()->id();
        $art =  Article::create($validated);
        foreach ($refinedarray as $tag){
            $article_tag = DB::insert('INSERT INTO article_tag(article_id, tag_name, created_at, updated_at)VALUES (?, ?, ?, ?);',
                [$art['id'],$tag,now(),now()]);

        }
        dd($art['id']);

        return redirect()->route('dashboard')->with('success','Idea created successfully !');
    }

    public function destroy(Article $article){
        if(auth()->id() !== $article->authorid){
            abort(404);
        }
        $article->delete();

        return redirect()->route('dashboard')->with('success','Idea deleted successfully !');
    }

    public function edit(Article $article){

        if(auth()->id() !== $article->authorid){
            abort(404);
        }
        $editing = true;
        return view('ideas.show',compact('article','editing'));
    }

    public function update(Article $article){

        if(auth()->id() !== $article->authorid){
            abort(404);
        }
        $validated = request()->validate([
            'content' => 'required|min:3|max:240'
        ]);
        $article->update($validated);

        return redirect()->route('ideas.show',$article->id)->with('success',"Idea updated successfully!");
    }
}
