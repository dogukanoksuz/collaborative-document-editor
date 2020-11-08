<?php

namespace App\Http\Livewire\Document;

use Livewire\Component;

class Show extends Component
{
    public $documents;

    protected $listeners = ['newDocumentCreated'];

    public function newDocumentCreated()
    {
        $this->documents = auth()->user()->document()->orderBy('updated_at', 'DESC')->get();
    }

    public function mount()
    {
        $this->documents = auth()->user()->document()->orderBy('updated_at', 'DESC')->get();
    }

    public function render()
    {
        return view('livewire.document.show');
    }
}
