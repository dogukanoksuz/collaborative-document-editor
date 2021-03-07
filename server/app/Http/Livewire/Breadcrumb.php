<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Breadcrumb extends Component
{
    public $documentId;
    public $elements;

    public function mount($documentId)
    {
        $this->documentId = $documentId;
    }

    public function render()
    {
        return view('livewire.breadcrumb');
    }
}
