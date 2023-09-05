<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;
use App\Jobs\RemoveFaces;
use App\Jobs\ResizeImage;
use Livewire\WithFileUploads;
use App\Jobs\GoogleVisionLabelImage;
use App\Jobs\GoogleVisionSafeSearch;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class CreateArticleForm extends Component
{

    use WithFileUploads;

    public $name, $price, $description, $category = 1, $article, $user_id, $images = [], $temporary_images, $image;

    protected $rules = [
        'name' => 'required|min:5',
        'price' => 'required',
        'description' => 'required|min:10',
        'user_id' => 'required',
        'images.*' => 'image|max:1024',
        'temporary_images.*' => 'image|max:1024',
        'category' => 'required'
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
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
    public function removeImage($key)
    {
        if (in_array($key, array_keys($this->images))) {
            unset($this->images[$key]);
        }
    }


    public function store()
    {
        $this->user_id = Auth::user()->id;

        $this->validate();
        $this->article = Category::find($this->category)->articles()->create($this->validate());
        foreach ($this->images as $image) {

            $newFileName = "articles/{$this->article->id}";
            $newImage = $this->article->images()->create(['path' => $image->store($newFileName, 'public')]);

            RemoveFaces::withChain([
                new ResizeImage($newImage->path, 400, 400),
                new GoogleVisionSafeSearch($newImage->id),
                new GoogleVisionLabelImage($newImage->id)
            ])->dispatch($newImage->id);
        }
        File::deleteDirectory(storage_path('/app/livewire-tmp'));
        // }

        $message = "";

        if (app()->getLocale() == 'en') {
            $message = "A revisor will publish your article as soon as possible.";
        } else if (app()->getLocale() == 'es') {
            $message = "Su anuncio está pendiente de revisión. Se publicará lo antes posible.";
        } else {
            $message = 'Il tuo annuncio è in attesa di essere revisionato. Verrà pubblicato al più presto.';
        }


        // session()->flash('successMessage', $message);
        $this->reset();

        // $article->categories->attach($this->categories);
        return redirect()->route('article.index')->with('successMessage', $message);
    }

    public function render()
    {
        $categoriesAll = Category::all();
        return view('livewire.create-article-form', compact('categoriesAll'));
    }
}
