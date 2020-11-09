<?php

namespace App\Http\Livewire\Document;

use Livewire\Component;

class Show extends Component
{
    public $documents;

    protected $listeners = ['newDocumentCreated'];

    public function newDocumentCreated($documents)
    {
        if (!$documents)
        {
            $this->documents = auth()->user()->document()
                                ->orderBy('updated_at', 'DESC')
                                ->where('folder_id', null)
                                ->get();
        } else {
            $this->documents = $documents;
        }
    }

    public function mount($documents)
    {
        if (!$documents)
        {
            $this->documents = auth()->user()->document()
                                ->orderBy('updated_at', 'DESC')
                                ->where('folder_id', null)
                                ->get();
        } else {
            $this->documents = $documents;
        }
    }

    public function render()
    {
        return view('livewire.document.show');
    }
}
