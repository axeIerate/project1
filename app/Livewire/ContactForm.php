<?php

namespace App\Livewire;

use Livewire\Component;

class ContactForm extends Component
{
    public string $name = '';
    public string $email = '';
    public string $message = '';

    /** @var array<string, string> */
    protected array $rules = [
        'name' => 'required|min:3',
        'email' => 'required|email',
        'message' => 'required|min:10',
    ];

    // real-time validate on each field update
    public function updated(string $propertyName): void
    {
        $this->validateOnly($propertyName);
    }

    public function submit(): void
    {
        $this->validate();

        // save logic here, e.g. Contact::create([...])

        session()->flash('message', 'Form submitted successfully.');
        $this->reset();
    }

    public function render(): \Illuminate\Contracts\View\View
    {
        return view('livewire.contact-form');
    }
}