<?php

namespace App\Http\Livewire;

use App\Models\Article;
use Livewire\Component;

class Filter extends Component
{
    public $minPrice;
    public $maxPrice;
    public $dbQuery;

    public function mount()
    {
        $this->dbQuery = Article::where('is_accepted', true)->get();
    }
    public function render()
    {
        $searched = $this->dbQuery;
        if ($this->minPrice) {
            $searched = $searched->where('price', '>=', $this->minPrice);
        }

        if ($this->maxPrice) {
            $searched = $searched->where('price', '<=', $this->maxPrice);
        }
        return view('livewire.filter', ['searched' => $searched]);
    }
}
