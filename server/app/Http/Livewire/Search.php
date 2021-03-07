<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Search extends Component
{
    public $searchResults;
    public $searchQuery;

    public function mount()
    {
        $this->searchQuery = request()->q;
        $this->searchResults = auth()->user()->document()->getQuery()
                ->where('name', 'LIKE', "%{$this->searchQuery}%")
                ->orWhere('content', 'LIKE', "%{$this->searchQuery}%")
                ->get();   
    }

    public function render()
    {
        return view('livewire.search');
    }
}
