<?php

namespace App\Http\Livewire\Document;

use Livewire\Component;
use App\Models\Document;

class Create extends Component
{
    public $isCreating = false;
    public $name = "";
    public $message = "";
    public $emitTo;

    public function confirmCreating()
    {
        $this->isCreating = true;
    }

    public function createNewDocument()
    {
        try {
            $document = Document::create([
                'name' => $this->name,
            ]);
           
            $document->user()->attach(auth()->user());
        } 
        catch (\Throwable $e) 
        {
            $this->emitTo($this->emitTo, 'flashMessage', "Oluşturma işlemi başarısız oldu!");
        }        
        $this->emitTo($this->emitTo, 'flashMessage', $this->name . " isimli doküman başarıyla eklendi!");

        $documents = Document::orderBy('updated_at', 'DESC')->get();
        
        $this->emitTo($this->emitTo, 'emptyDecrement');

        $this->emitTo('document.show', 'newDocumentCreated', $documents);
        $this->isCreating = false;
        $this->name = "";
    }

    public function mount($emitTo)
    {
        $this->emitTo = $emitTo;

        if(!$emitTo) {
            $this->emitTo = 'dashboard';
        }
    }

    public function render()
    {
        return view('livewire.document.create');
    }
}
