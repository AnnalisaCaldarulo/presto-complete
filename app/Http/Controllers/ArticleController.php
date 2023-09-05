<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Laravel\Fortify\Contracts\LoginResponse;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function __construct()
    {
        return $this->middleware('auth')->except('index', 'show');
    }

    public function index()
    {
        $articles = Article::where('is_accepted', true)->orderBy('is_accepted', 'desc')->get();
        return view('article.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('article.create');
    }

    /**
     * Store a newly created resource in storage.
     */

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        // $reg = DB::table('articles')->select('user_id', 'id')->join('users', 'articles.user_id', '=', 'users.id' )->get();
        $category = $article->category;
        return view('article.show', compact('article', 'category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        if (!Auth::user()) {
            return redirect(route('login'))->with('errorMessage', 'Devi essere iscritto per scrivere e cancellare i tuoi articoli');
        } elseif (Auth::user()->id != $article->user_id && $article->user->is_revisor != true) {
            return redirect(route('article.create'))->with('errorMessage', "Non puoi modificare gli articoli di qualcun altro!");
        }
        return view('article.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article){
        $article->update([
            'name'=> $request->name,
            'price'=>$request->price,
            'description'=>$request->description,
            'category'=>$request->category
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        //
    }
}
