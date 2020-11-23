<?php

namespace App\Http\Livewire\Folder;

use Livewire\Component;
use App\Models\Folder;

class Create extends Component
{
    public $isCreatingFolder = false;
    public $name = "";
    public $message = "";
    public $emitTo;
    public $folderId;

    public function confirmCreatingFolder()
    {
        $this->isCreatingFolder = true;
    }

    public function createNewFolder()
    {
        try {
            if ($this->folderId == null) {
                $folder = Folder::create([
                    'name' => $this->name
                ]);
            } else {
                $folder = Folder::create([
                    'name' => $this->name,
                    'parent_folder_id' => $this->folderId
                ]);
            }
            

            $folder->user()->attach(auth()->user());
        } catch (\Throwable $e) {
            $this->emitTo($this->emitTo, 'flashMessage', "Oluşturma işlemi başarısız oldu!");
        }        
        $this->emitTo($this->emitTo, 'flashMessage', $this->name . " isimli klasör başarıyla eklendi!");

        if ($this->folderId == null) {
            $folders = Folder::where('parent_folder_id', null)->orderBy('updated_at', 'DESC')->get();
        } else {
            $folders = Folder::where('parent_folder_id', $this->folderId)->orderBy('updated_at', 'DESC')->get();
        }

        $this->emitTo($this->emitTo, 'emptyDecrement');
        
        $this->emitTo('folder.show', 'newFolderCreated', $folders, $this->folderId);
        $this->isCreatingFolder = false;
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
        return view('livewire.folder.create');
    }
}