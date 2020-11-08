<?php

namespace App\Http\Livewire\Folder;

use Livewire\Component;

class Show extends Component
{
    public $folders;

    protected $listeners = ['newFolderCreated'];

    public function newFolderCreated()
    {
        $this->folders = auth()->user()->folder()->orderBy('updated_at', 'DESC')->get();
    }

    public function mount()
    {
        $this->folders = auth()->user()->folder()->orderBy('updated_at', 'DESC')->get();
    }

    public function render()
    {
        return view('livewire.folder.show');
    }
}
