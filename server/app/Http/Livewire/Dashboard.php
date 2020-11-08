<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Dashboard extends Component
{
    public $message;

    protected $listeners = ['flashMessage'];

    public function flashMessage($message)
    {
        $this->message = $message;
    }

    public function mount()
    {
        $this->message = "";
    }

    public function render()
    {
        return view('livewire.dashboard');
    }
}
