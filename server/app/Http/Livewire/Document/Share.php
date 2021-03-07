<?php

namespace App\Http\Livewire\Document;

use Livewire\Component;

class Share extends Component
{
    public $document;
    public $users;
    public $email;
    public $attachUser;
    public $message;

    protected $listeners = ['newUserAdded', 'flashMessage'];

    public function newUserAdded()
    {
        $this->users = $this->document->user()->get();
    }

    public function share()
    {
        $attachUser = \App\Models\User::where('email', $this->email)->first();
        
        if ($attachUser == null) {
            $this->flashMessage("Bu kullanıcı sistemde bulunmadığından kendisini yetkilendiremezsiniz.");
            return;
        } else {
            $this->flashMessage("Başarıyla paylaşım eklendi.");
        }
        $this->document->user()->attach($attachUser);
        $this->newUserAdded();
    }

    public function deleteShare($uid)
    {
        $deletedUser = \App\Models\User::where('id', $uid)->first();
        $this->document->user()->detach($deletedUser);
        $this->flashMessage("Kullanıcı paylaşımı kaldırıldı.");
        $this->newUserAdded();
    }

    public function redirectToDocument()
    {
        return redirect()->to(route('showDocument', $this->document->id));
    }
    
    public function flashMessage($message)
    {
        $this->message = $message;
    }

    public function mount()
    {
        $this->document = \App\Models\Document::where('id', request()->documentId)->first();
        $this->users = $this->document->user()->get();
        $this->message = "";
    }

    public function render()
    {
        return view('livewire.document.share');
    }
}
