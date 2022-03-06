<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CreateLink extends Component
{

    public $slug;
    public $url;

    protected $rules = [
        'url' => 'require|url|max:225',
        'slug' => 'nullable|alpha_dash|unique:links,slug|min:3|max:100',
    ]

    public function render()
    {
        return view('livewire.create-link');
    }
}
