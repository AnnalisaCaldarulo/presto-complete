<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function cart(){
        $articles = Article::where('is_selected', true)->where(Auth::user()->id == 'buyer')->orderBy('updated_at', 'desc')->get();
        return view('cart', compact('articles'));
    }
    public function add(Article $article)
    {
        $article->select(true);
        return redirect()
            ->back();
    }
    public function remove(Article $article)
    {
        $article->select(false);
        return redirect()
            ->back();
    }
}
