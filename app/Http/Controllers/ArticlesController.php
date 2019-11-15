<?php

namespace App\Http\Controllers;
use App\Article;
use Illuminate\Http\Request as BaseRequest;
use App\Http\Requests\StoreArticleRequest as Request;

class ArticlesController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $articles = Article::orderBy('created_at','DESC')->get();
        $articles = Article::paginate();

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
        //return redirect('/articles');
        return redirect()->route('articles:index')->with(['alert-type' => 'alert-success', 'alert'=> 'Your article saved']);
    }

    public function edit(Article $article){
        return view('articles.edit')->with(compact('article'));
    }

    public function update(Request $request, Article $article){

        $article = $article->update($request->only('title', 'body', 'published'));

        return redirect()->route('articles:index')->with(['alert-type' => 'alert-success', 'alert' => "Your article updated"]);
    }

    public function delete(Article $article){
        $article->delete();
        return redirect()->route('articles:index')->with(['alert-type' => 'alert-danger', 'alert' => 'Your article deleted']);
    }

    public function search(BaseRequest $request){
        $keyword = $request->get('keyword');
        $articles = Article::where('title','LIKE','%'.$keyword.'%')->paginate(3);
        return view('articles.index')->with(compact('articles'));
    }
}
