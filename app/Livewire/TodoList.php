<?php
namespace App\Livewire;

use App\Models\Todo;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;

#[
    Layout('layouts.app'),
    Title('To-Do Lists')
]
class TodoList extends Component
{
    public string $title = '';
    public ?string $deadline = null;
    public ?int $editId = null;
    public string $editTitle = '';
    public ?string $editDeadline = null;

    public function addTodo(): void
    {
    $this->validate(['title' => 'required|min:1']);
    Todo::create([
        'title' => $this->title,
        'deadline' => $this->deadline ?: null,
    ]);
    $this->title = '';
    $this->deadline = '';
    }

    public function deleteTodo(int $id): void
    {
        Todo::findOrFail($id)->delete();
    }

    public function editTodo(int $id): void
    {
    $todo = Todo::findOrFail($id);
    $this->editId = $id;
    $this->editTitle = $todo->title;
    $this->editDeadline = $todo->deadline;
    }

    public function updateTodo(): void
    {
    $this->validate(['editTitle' => 'required|min:1']);
    Todo::findOrFail($this->editId)->update([
        'title' => $this->editTitle,
        'deadline' => $this->editDeadline ?: null,
    ]);
    $this->editId = null;
    $this->editTitle = '';
    $this->editDeadline = '';
    }

    public function toggleComplete(int $id): void
    {
        $todo = Todo::findOrFail($id);
        $todo->update(['completed' => !$todo->completed]);
    }

    public function render(): \Illuminate\Contracts\View\View
    {
        return view('livewire.todo-list', ['todos' => Todo::all()]);
    }
}