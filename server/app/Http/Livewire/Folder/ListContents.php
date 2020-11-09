<?php

namespace App\Http\Livewire\Folder;

use App\Models\Folder;
use Livewire\Component;

class ListContents extends Component
{
    public $subfolders;
    public $documents;
    public $folderId;
    public $message;

    protected $listeners = ['flashMessage'];

    public function flashMessage($message)
    {
        $this->message = $message;
    }

    public function mount($folderId)
    {
        $this->message = "";
        $this->folderId = $folderId;
        $this->documents = Folder::findOrFail($folderId)->document()->orderBy('updated_at', 'DESC')->get();
        $this->subfolders = Folder::where('parent_folder_id', $folderId)->orderBy('updated_at', 'DESC')->get();
    }

    public function render()
    {
        return view('livewire.folder.list-contents');
    }
}
