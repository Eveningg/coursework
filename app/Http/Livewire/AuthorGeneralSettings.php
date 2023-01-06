<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Setting;

class AuthorGeneralSettings extends Component
{
    public $settings;

    public $thread_name, $thread_email, $thread_description;

    public function mount(){
        $this ->settings=Setting::find(1);
        $this ->thread_name=$this->settings->thread_name;
        $this ->thread_email=$this->settings->thread_email;
        $this ->thread_description=$this->settings->thread_description;
    }

    public function updateGeneralSettings(){
        dd('test');
    }
    public function render()
    {
        return view('livewire.author-general-settings');
    }
}
