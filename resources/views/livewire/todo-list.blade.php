<div class="container mt-5" style="max-width: 650px;">
    <h1 class="fw-bold text-center mb-1">To-Do Lists</h1>
    <p class="text-center text-muted mb-4">Manage your tasks efficiently.</p>

    {{-- Add Todo --}}
    <div class="card mb-4 shadow-sm">
        <div class="card-body">
            <div class="mb-2">
                <input type="text" wire:model="title" class="form-control" placeholder="Add a new task...">
            </div>
            <div class="mb-2">
                <label class="form-label text-muted small">Deadline (optional)</label>
                <input type="date" wire:model="deadline" class="form-control">
            </div>
            <button wire:click="addTodo" class="btn btn-primary w-100">Add Task</button>
        </div>
    </div>

    {{-- Todo List --}}
    @foreach($todos as $todo)
    <div class="card mb-2 shadow-sm">
        <div class="card-body">
            @if($editId === $todo->id)
                <input type="text" wire:model="editTitle" class="form-control mb-2">
                <input type="date" wire:model="editDeadline" class="form-control mb-2">
                <button wire:click="updateTodo" class="btn btn-success btn-sm me-1">Save</button>
                <button wire:click="$set('editId', null)" class="btn btn-secondary btn-sm">Cancel</button>
            @else
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <span class="fw-semibold {{ $todo->completed ? 'text-decoration-line-through text-muted' : '' }}">
                            {{ $todo->title }}
                        </span>
                        <div class="small text-muted mt-1">
                            📅 Added: {{ $todo->created_at->format('M d, Y') }}
                            @if($todo->deadline)
                                &nbsp;|&nbsp; ⏰ Deadline: {{ \Carbon\Carbon::parse($todo->deadline)->format('M d, Y') }}
                            @endif
                        </div>
                    </div>
                    <div>
                        <button wire:click="toggleComplete({{ $todo->id }})" class="btn btn-sm btn-outline-success me-1">✓</button>
                        <button wire:click="editTodo({{ $todo->id }})" class="btn btn-sm btn-outline-warning me-1">✏️</button>
                        <button wire:click="deleteTodo({{ $todo->id }})" class="btn btn-sm btn-outline-danger">🗑️</button>
                    </div>
                </div>
            @endif
        </div>
    </div>
    @endforeach

    @if($todos->isEmpty())
    <p class="text-center text-muted mt-3">No tasks yet. Add one above!</p>
    @endif
</div>