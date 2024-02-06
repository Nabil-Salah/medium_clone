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
            'content' => 'required|min:3|max:240'
        ]);
        $tags_list = \request('tags');
        $arrayoftags = explode(" ", $tags_list);
        $refinedarray = [];
        foreach ($arrayoftags as $element){
            $ret = DB::connection('MONGODB')->collection('tags')->where('name',$element)->get();
            if(empty($ret)){
                $newtag = new Tag::class(['name'=>$element]);
                DB::connection('MONGODB')->collection('tags')->save($newtag);
            }
            foreach ($ret as $refined){
                array_push($refinedarray,$refined['name']);

            }
        }
        $validated['user_id'] = auth()->id();
        Article::create($validated);

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
