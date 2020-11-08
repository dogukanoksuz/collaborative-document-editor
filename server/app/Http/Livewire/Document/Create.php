<?php

namespace App\Http\Livewire\Document;

use Livewire\Component;
use App\Models\Document;

class Create extends Component
{
    public $isCreating = false;
    public $name = "";
    public $message = "";

    public function confirmCreating()
    {
        $this->isCreating = true;
    }

    public function createNewDocument()
    {
        try {
            $document = Document::create([
                'name' => $this->name
            ]);

            $document->user()->attach(auth()->user());
        } catch (\Throwable $e) {
            $this->emitTo('dashboard', 'flashMessage', "Oluşturma işlemi başarısız oldu!");
        }        
        $this->emitTo('dashboard', 'flashMessage', $this->name . " isimli doküman başarıyla eklendi!");

        $this->emitTo('document.show', 'newDocumentCreated');
        $this->isCreating = false;
        $this->name = "";
    }

    public function render()
    {
        return view('livewire.document.create');
    }
}
