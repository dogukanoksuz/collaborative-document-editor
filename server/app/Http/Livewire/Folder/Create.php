<?php

namespace App\Http\Livewire\Folder;

use Livewire\Component;
use App\Models\Folder;

class Create extends Component
{
    public $isCreatingFolder = false;
    public $name = "";
    public $message = "";

    public function confirmCreatingFolder()
    {
        $this->isCreatingFolder = true;
    }

    public function createNewFolder()
    {
        try {
            $folder = Folder::create([
                'name' => $this->name
            ]);

            $folder->user()->attach(auth()->user());
        } catch (\Throwable $e) {
            $this->emitTo('dashboard', 'flashMessage', "Oluşturma işlemi başarısız oldu!");
        }        
        $this->emitTo('dashboard', 'flashMessage', $this->name . " isimli klasör başarıyla eklendi!");

        $this->emitTo('folder.show', 'newFolderCreated');
        $this->isCreatingFolder = false;
        $this->name = "";
    }

    public function render()
    {
        return view('livewire.folder.create');
    }
}