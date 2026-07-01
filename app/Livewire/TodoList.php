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
    public $title = '';
    public $deadline = '';
    public $editId = null;
    public $editTitle = '';
    public $editDeadline = '';

    public function addTodo()
    {
    $this->validate(['title' => 'required|min:1']);
    Todo::create([
        'title' => $this->title,
        'deadline' => $this->deadline ?: null,
    ]);
    $this->title = '';
    $this->deadline = '';
    }

    public function deleteTodo($id)
    {
        Todo::findOrFail($id)->delete();
    }

    public function editTodo($id)
    {
    $todo = Todo::findOrFail($id);
    $this->editId = $id;
    $this->editTitle = $todo->title;
    $this->editDeadline = $todo->deadline;
    }

    public function updateTodo()
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

    public function toggleComplete($id)
    {
        $todo = Todo::findOrFail($id);
        $todo->update(['completed' => !$todo->completed]);
    }

    public function render()
    {
        return view('livewire.todo-list', ['todos' => Todo::all()]);
    }
}