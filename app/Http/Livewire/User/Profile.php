<?php

namespace App\Http\Livewire\User;

use App\Models\User;

use Livewire\Component;

class Profile extends Component
{
    public $user, $firstname, $lastname, $email, $mobile, $user_id, $gender, $address;


    public function mount(User $user){
        $this->user = $user;
        $this->firstname = $user->firstname;
        $this->lastname = $user->lastname;
        $this->email = $user->email;
        $this->mobile = $user->mobile;
        $this->gender = $user->gender;
        $this->address = $user->address;
    }


    public function render()
    {
        $this->user = User::all();
        return view('livewire.user.profile');
    }



    public function store()
    {
        $this->validate([
            'firstname' => 'required',
            'email' => 'required',
            'mobile' => 'required',
        ]);
        dd($this->firstname);
      //  $this->user_id = User::find()
        User::updateOrCreate(['id' => $this->user_id], [
            'firstname' => $this->firstname,
            'lastname' => 'Doe',
            'physical_address' => $this->address,
            'password' => '1234',
            'email' => $this->email,
            'mobile' => $this->phone,
            'gender' => $this->gender,
        ]);

        session()->flash('message', $this->user_id ? 'User updated.' : 'User created.');
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