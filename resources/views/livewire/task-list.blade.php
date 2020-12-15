<div>
    @forelse ($lists as $task_list)
        <h3>{{ $task_list->title }}</h3>
        <div class="tasks">
            @forelse ($task_list->tasks as $task)
                @livewire('task', ['task' => $task], key($task->id))
            @empty
                <p>No task to display</p>
            @endforelse
            
        </div>
    @empty
        <p>No list to display</p>
    @endforelse
</div>

