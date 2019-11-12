<?php

namespace App\Http\Controllers;
use App\Article;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    //
    public function index(){
        $articles = Article::orderBy('created_at', 'DESC')->get();

        return view('articles.index')->with(compact('articles'));
    }
    public function create(){
        
        return view('articles.create');
    }

    public function store(Request $request){
        //Method 1
        // $article = new Article();
        // $article->title = $request->get('title');
        // $article->body = $request->get('body');
        // $article->published = $request->get('published');
        // $article->save();

        //Method 2
        $article = Article::create($request->only('title','body','published'));
        return back();
    }
}
