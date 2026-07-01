<?php

namespace App\Livewire;

use Livewire\Component;

class ContactForm extends Component
{
    public $name = '';
    public $email = '';
    public $message = '';

    protected $rules = [
        'name' => 'required|min:3',
        'email' => 'required|email',
        'message' => 'required|min:10',
    ];

    // real-time validate on each field update
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submit()
    {
        $this->validate();

        // save logic here, e.g. Contact::create([...])

        session()->flash('message', 'Form submitted successfully.');
        $this->reset();
    }

    public function render()
    {
        return view('livewire.contact-form');
    }
}