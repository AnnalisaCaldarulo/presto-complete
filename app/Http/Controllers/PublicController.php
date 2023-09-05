<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PublicController extends Controller
{
    public function home()
    {
        $articles = Article::where('is_accepted', true)->take(6)->orderBy('created_at', 'DESC')->get();
        return view('welcome', compact('articles'));
    }
    public function searchArticles(Request $request)
    {
        $search = $request->searched;
        $articles = Article::search($request->searched)->where('is_accepted', true)->paginate(5);
        // $articles = Article::where('is_accepted', true)->search($request->searched) //

        return view('article.search', compact('articles', 'search'));
    }
    public function categoryShow(Category $category)
    {
        $articles = Article::where('category_id', $category->id)->orderBy('created_at', 'DESC');
        return view('categoryShow', compact('category', 'articles'));
    }

    public function profile()
    {
        $articles = Article::where('is_accepted', true || Auth::user()->id == 'user_id')->orderBy('updated_at', 'desc')->get();
        return view('profile', compact('articles'));
    }


    public function setLanguage($lang)
    {
        session()->put('locale', $lang);
        return redirect()->back();
    }
}
