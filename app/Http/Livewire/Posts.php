<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class Posts extends Component
{
    public $title;

    protected $rules = [
        'title' => 'required|max:100'
    ];

    protected $listeners = ['delete'];

    public function render()
    {
        $posts = User::latest('id')->take(5)->get();

        return view('livewire.posts', compact('posts'));
    }

    public function storePost()
    {
        $this->validate();

        User::create([
            'firstname' => $this->title,
            'lastname' => 'test',
            'email' => 'test',
            'physical_address' => 'test',
            'password' => 'test',
        ]);

        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',
            'title' => 'Record added successfully',
            'text' => '',
        ]);

        $this->title = '';
    }

    public function deleteConfirm($id)
    {
        $this->dispatchBrowserEvent('swal:confirm', [
            'type' => 'warning',
            'title' => 'Are you sure?',
            'text' => '',
            'id' => $id,
        ]);
    }

    public function delete($id)
    {
        Post::where('id', $id)->delete();
    }
}
