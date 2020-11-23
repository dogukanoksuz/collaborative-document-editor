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
    public $empty = 0;

    protected $listeners = ['flashMessage', 'emptyDecrement'];

    public function flashMessage($message)
    {
        $this->message = $message;
    }

    public function emptyChecker()
    {
        if(count($this->documents) == 0)
        {
            $this->empty++;
        }

        if(count($this->subfolders) == 0)
        {
            $this->empty++;
        }
    }

    public function emptyDecrement()
    {
        $this->empty--;
    }

    public function mount($folderId)
    {
        $this->message = "";
        $this->folderId = $folderId;
        $this->documents = Folder::findOrFail($folderId)->document()->orderBy('updated_at', 'DESC')->get();
        $this->subfolders = Folder::where('parent_folder_id', $folderId)->orderBy('updated_at', 'DESC')->get();

        $this->emptyChecker();
    }

    public function render()
    {
        return view('livewire.folder.list-contents');
    }
}
