<div>
    <h3>{{ $list->name }}</h3>
    <div class="tasks">
        @forelse ($list->tasks as $task)
            @livewire('task', ['task' => $task], key($task->id))
        @empty
            <h4>No task to display</h4>
        @endforelse
        
    </div>
</div>

