<?php

namespace App\Http\Livewire;

use App\Models\Link;
use Livewire\Component;
use Illuminate\Support\Str;

class CreateLink extends Component
{

    public $slug;
    public $url;

    protected $rules = [
        'url' => 'required|url|max:225',
        'slug' => 'nullable|alpha_dash|unique:links,slug|min:3|max:100',
    ];


    protected $messages = [
        'url.required' => 'Você precisa informar uma URL.',
        'url.url' => 'Informe uma URL válida.',
        'url.max' => 'Limite máximo de caracteres.',

        'slug.alpha_dash' => 'Você possui caracteres inválidos.',
        'slug.unique' => 'Este slug já está sendo utilizado.',
        'slug.min'=> 'Informe pelo menos 3 caracteres.',
        'slug.max' => 'Limite máximo de caracteres.'
    ]; 


    public function salvarLink(){
        $this->validate();

        Link::create([
            'url' => $this->url,
            'slug' => $this->slug ?? Str::random(40),
            'user_id' => auth()->user()->id
        ]);
    
        return redirect(route('link'));
    }

    public function updated($property)
    {
        $this->validateOnly($property);
    }

    public function resetarFormulario()
    {
        $this->reset();
        $this->resetValidation();
    }

    public function render()
    {
        return view('livewire.create-link');
    }
}
