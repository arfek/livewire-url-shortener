<?php

namespace App\Http\Livewire;

use App\Models\Link;
use Illuminate\Validation\Rule;
use Livewire\Component;

class EditLink extends Component
{

    public function rules() {
        return [
            'url' => ['required', 'url', 'max:255'],
            'slug' => ['required', 'alpha_dash', 'min:3', 'max:100', Rule::unique('links')->ignore($this->link_id)],
            'is_enabled' => ['required', 'boolean'],
        ];
    }


    protected $messages = [
        'url.required' => 'Você precisa informar uma URL.',
        'url.url' => 'Informe uma URL válida.',
        'url.max' => 'Limite máximo de caracteres.',

        'slug.alpha_dash' => 'Você possui caracteres inválidos.',
        'slug.unique' => 'Este slug já está sendo utilizado.',
        'slug.min'=> 'Informe pelo menos 3 caracteres.',
        'slug.max' => 'Limite máximo de caracteres.'
    ]; 

    public function render()
    {
        return view('livewire.edit-link');
    }

    public function salvarLink()
    {
        $link = Link::findOrFail($this->link_id);
        
        $link->update($this->validate());

        return redirect(route('link'));
    }

    //Método que é invocado quando componente é montado
    public function mount($link)
    {
        $this->link_id = $link->id;
        $this->url = $link->url;
        $this->slug = $link->slug;
        $this->is_enabled = $link->is_enabled;
    }

    public function updated($property)
    {
        $this->validateOnly($property);
    }

}
