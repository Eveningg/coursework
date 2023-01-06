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
        $this->validate([
            'thread_name'=>'required',
            'thread_email'=>'required|email',
        ]);

        $update = $this->settings->update([
            'thread_name'=>$this->thread_name,
            'thread_email'=>$this->thread_email,
            'thread_description'=>$this->thread_description,
        ]);

        if($update){
            $this->showToastr('General Settings have Succesfully been Changed!','success');
            $this->emit('updateAuthorFooter');
        }else{
            $this->showToastr('Something Went Wrong!', 'error');
        }
    }

    public function showToastr($message, $type){
        return $this->dispatchBrowserEvent('showToastr',[
            'type'=>$type,
            'message'=>$message
        ]);
    }

    public function render()
    {
        return view('livewire.author-general-settings');
    }
}
