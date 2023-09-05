<?php

namespace App\Providers;

use App\Models\Category;
use TeamTNT\TNTSearch\TNTSearch;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }
// new TNTSearch();
    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if (Schema::hasTable('categories')) {
            $categories = Category::all();
            View::share(['categories' =>$categories ]);
        }
    }
}
