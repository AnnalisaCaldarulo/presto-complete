<?php

namespace App\Http\Livewire;

use App\Models\Article;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditArticle extends Component
{
    use WithFileUploads;

    public $temporary_images = [], $images, $image, $article;


    public function updatedTemporaryImages()
    {

        if ($this->validate([
            'temporary_images.*' => 'image|max:1024',
        ])) {
            foreach ($this->temporary_images as $image) {
                $this->images[] = $image;
            }
        }
    }
    public function mount()
    {
        $article = Article::find($this->article);
        $this->images = $article->images;
    }

    public function article_update()
    {
        $article = Article::find($this->article);
        $article->update([
            'images' => $this->images
        ]);
        return redirect()->route('article.index');
    }
    public function render()
    {
        $article = Article::find($this->article);
        $images = $article->images;
        dd($article);
        return view('livewire.edit-article', compact('article', 'images'));
    }
}
