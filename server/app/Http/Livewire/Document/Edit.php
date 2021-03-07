<?php

namespace App\Http\Livewire\Document;

use Livewire\Component;
use App\Models\Document;

class Edit extends Component
{
    public $document;
    public $joining_key;

    public function mount($documentId)
    {
        $this->document = Document::findOrFail($documentId);
        
        $to_be_hashed = env('SOCKET_SECRET') . "||" . $documentId . "||" . auth()->user()->id;
        $this->joining_key = md5($to_be_hashed);
    }

    public function render()
    {
        return view('livewire.document.edit');
    }
}
