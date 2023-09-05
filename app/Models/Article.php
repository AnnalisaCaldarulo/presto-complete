<?php

namespace App\Models;

use App\Models\Image;
use App\Models\Category;
use Laravel\Scout\Searchable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{
    use Searchable;
    use HasFactory;
    protected $fillable = [
        'name', 'price', 'description', 'category_id', 'user_id'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsto(User::class);
    }
    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public $asYouType = true;

    /**
     * Get the indexable data array for the model.
     *
     * @return array
     */
    public function toSearchableArray()
    {
        $category = $this->category;
        $array = $this->toArray();

        $array = [
            'title' => $this->title,
            'id' => $this->id,
            'description' => $this->description,
            'category' => $category,

        ];

        return $array;
    }
    public function setAccepted($value)
    {
        $this->is_accepted = $value;
        $this->save();
        return true;
    }

    public function select($value)
    {
        $this->is_selected = $value;
        $this->buyer =Auth::user()->id;
        $this->save();
        return true;
    }
}
