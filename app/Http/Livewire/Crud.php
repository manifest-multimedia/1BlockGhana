<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class Crud extends Component
{
    public $users, $name, $email, $mobile, $user_id;
    public $isModalOpen = 0;

    public function render()
    {
        $this->users = User::all();
        dd($this->users);
        return view('livewire.crud');
    }

    public function create()
    {
        $this->resetCreateForm();
        $this->openModalPopover();
    }

    public function openModalPopover()
    {
        $this->isModalOpen = true;
    }

    public function closeModalPopover()
    {
        $this->isModalOpen = false;
    }

    private function resetCreateForm(){
        $this->name = '';
        $this->email = '';
        $this->mobile = '';
    }

    public function store()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required',
            'mobile' => 'required',
        ]);
        //dd($this->name);
        User::updateOrCreate(['id' => $this->user_id], [
            'firstname' => $this->name,
            'lastname' => 'Doe',
            'physical_address' => 'Accra',
            'password' => '1234',
            'email' => $this->email,
            'mobile' => $this->mobile,
        ]);

        session()->flash('message', $this->user_id ? 'User updated.' : 'User created.');

        $this->closeModalPopover();
        $this->resetCreateForm();
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $this->user_id = $id;
        $this->name = $user->firstname;
        $this->email = $user->email;
        $this->mobile = $user->mobile;

        $this->openModalPopover();
    }

    public function delete($id)
    {
        User::find($id)->delete();
        session()->flash('message', 'User deleted.');
    }
}