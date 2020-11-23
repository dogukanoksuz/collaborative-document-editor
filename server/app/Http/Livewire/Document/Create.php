<?php

namespace App\Http\Livewire\Document;

use Livewire\Component;
use App\Models\Document;
use App\Models\Folder;

class Create extends Component
{
    public $isCreating = false;
    public $name = "";
    public $message = "";
    public $emitTo;
    public $folderId;

    public function confirmCreating()
    {
        $this->isCreating = true;
    }

    public function createNewDocument()
    {
        try {
            if($this->folderId == null)
            {
                $document = Document::create([
                    'name' => $this->name,
                ]);
            } else {
                $document = Document::create([
                    'name' => $this->name,
                    'folder_id' => $this->folderId
                ]);
            }

            $document->user()->attach(auth()->user());
        } 
        catch (\Throwable $e) 
        {
            $this->emitTo($this->emitTo, 'flashMessage', "Oluşturma işlemi başarısız oldu!");
        }        
        $this->emitTo($this->emitTo, 'flashMessage', $this->name . " isimli doküman başarıyla eklendi!");

        if ($this->folderId == null) 
        {
            $documents = Document::where('folder_id', null)->orderBy('updated_at', 'DESC')->get();
        } 
        else 
        {
            $documents = Folder::findOrFail($this->folderId)->document()->orderBy('updated_at', 'DESC')->get();
        }
        
        $this->emitTo($this->emitTo, 'emptyDecrement');

        $this->emitTo('document.show', 'newDocumentCreated', $documents);
        $this->isCreating = false;
        $this->name = "";
    }

    public function mount($emitTo, $folderId)
    {
        $this->folderId = $folderId;

        $this->emitTo = $emitTo;

        if(!$emitTo) {
            $this->emitTo = 'dashboard';
        }

        if(!$folderId) {
            $this->folderId = null;
        }
    }

    public function render()
    {
        return view('livewire.document.create');
    }
}
