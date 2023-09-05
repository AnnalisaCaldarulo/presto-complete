<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Article;
use App\Mail\BecomeRevisor;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Artisan;

class RevisorController extends Controller
{
    private $rules = [
        'description' => 'required|min:10',
    ];

    public function __construct()
    {
        return $this->middleware('isRevisor')->except('workWithUs');
    }

    public function index()
    {
        $article_to_check = Article::where('is_accepted', null)->orderBy('created_at', 'DESC')->first();
        $checked_articles = Article::where('is_accepted', '<>', null)->orderBy('created_at', 'DESC')->get();
        return view('revisor.index', compact('article_to_check', 'checked_articles'));
    }
    public function workWithUs()
    {
        return view('workWithUs');
    }

    public function workSubmit(Request $request)
    {
        $description = $request->description;


        // $success = "";
        // $errorMessage = "";

        // if (app()->getLocale() == 'en') {
        //     $success = "Your request has been sent. We'll write to you back as soon as possible!";
        // } else if (app()->getLocale() == 'es') {
        //     $success = "Su solicitud ha sido aceptada. Nos pondremos en contacto con usted lo antes posible.";
        // } else {
        //     $success = "La tua richiesta è stata accolta. Ti risponderemo al più presto!";
        // }
        // if (app()->getLocale() == 'en') {
        //     $errorMessage = "There was a mistake, try again later";
        // } else if (app()->getLocale() == 'it') {
        //     $errorMessage = "C'è stato un errore, riprova più tardi";
        // }

        try {
            Mail::to('admin@admin.it')->send(new BecomeRevisor($user = Auth::user(), $description));
        } catch (Exception $error) {
            return redirect(route('workWithUs'))->with('errorMessage', "C'è stato un errore, riprova più tardi");
        }
        return redirect(route('workWithUs'))->with('successMessage', "La tua richiesta è stata accolta. Ti risponderemo al più presto!");

    }


    public function makeRevisor(User $user)
    {
        Artisan::call('presto:makeUserRevisor', ['email' => $user->email]);
        $message = "";

        if (app()->getLocale() == 'en') {
            $message = "Congratulations. The user has become a revisor!";
        } else if (app()->getLocale() == 'es') {
            $message = "Enhorabuena. El usuario se ha convertido en revisor!";
        } else {
            $message = "Complimenti. L'utente è diventato un revisore!";
        }


        return redirect('/')->with('successMessage', $message);
    }
    public function accept(Article $article)
    {
        $article->setAccepted(true);
        return redirect()
            ->back();
    }
    public function reject(Article $article)
    {
        $article->setAccepted(false);
        return redirect()
            ->back();
    }
    public function undo(Article $article)
    {
        $article->setAccepted(null);
        return redirect()->route('revisor.index');
    }
    // public function removeImg($id){
    //     DB::table('images')->where('id', $id)->delete();
    //     return redirect()->back()->with('successMessage', 'Immagine cancellata con successo');
    // }
}
