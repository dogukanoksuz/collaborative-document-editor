<?php

namespace App\Http\Livewire;

use App\Models\Folder;
use Livewire\Component;

class Breadcrumb extends Component
{
    public $documentId;
    public $folderId;
    public $elements;

    public function findIterativeFolders()
    {
        $this->elements = [];
        if ($this->folderId != null) {
            $folder = Folder::find($this->folderId);
            array_push($this->elements, $folder);

            if (isset($folder->parent_folder_id))
            {
                while($folder->parent_folder_id != null)
                {
                    $folder = Folder::find($folder->parent_folder_id);
                    array_unshift($this->elements, $folder);
                }
            }
        }
    
        return $this->elements;
    }

    public function mount($documentId, $folderId)
    {
        $this->findIterativeFolders();

        $this->documentId = $documentId;
        $this->folderId = $folderId;
    }

    public function render()
    {
        return view('livewire.breadcrumb');
    }
}
