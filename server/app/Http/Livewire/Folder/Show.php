<?php

namespace App\Http\Livewire\Folder;

use Livewire\Component;

class Show extends Component
{
    public $folders;

    protected $listeners = ['newFolderCreated'];
    
    public function newFolderCreated($folders, $folderId)
    {
        if(!$folders)
        {
            $this->folders = auth()->user()->folder()->where('parent_folder_id', null)->orderBy('updated_at', 'DESC')->get();
        } else {
            $this->folders = auth()->user()->folder()->where('parent_folder_id', $folderId)->orderBy('updated_at', 'DESC')->get();
        }
    }

    public function mount($folders, $folderId)
    {
        if(!$folders)
        {
            $this->folders = auth()->user()->folder()->where('parent_folder_id', null)->orderBy('updated_at', 'DESC')->get();
        } else {
            $this->folders = auth()->user()->folder()->where('parent_folder_id', $folderId)->orderBy('updated_at', 'DESC')->get();
        }
    }
    
    public function render()
    {
        return view('livewire.folder.show');
    }
}
