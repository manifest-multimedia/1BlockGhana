<?php

namespace App\Http\Livewire\Admin;
use Illuminate\Database\Eloquent\Model;
use Livewire\Component;

class BusinessStatus extends Component

{
    public Model $model;
    public string $field;

    public bool $isActive;

    public function mount()
    {
        $this->isActive = (bool) $this->model->getAttribute($this->field);
    }

    public function render()
    {
        return view('livewire.admin.business-status');
    }

    public function updating($field, $value)
    {
        $this->model->setAttribute($this->field, $value)->save();
    }

}

