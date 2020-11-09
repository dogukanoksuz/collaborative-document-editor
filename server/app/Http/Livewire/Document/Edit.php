<?php

namespace App\Http\Livewire\Document;

use Livewire\Component;
use App\Models\Document;

class Edit extends Component
{
    public $document;

    public function mount($documentId)
    {
        $this->document = Document::findOrFail($documentId);
    }

    public function render()
    {
        return view('livewire.document.edit');
    }
}
