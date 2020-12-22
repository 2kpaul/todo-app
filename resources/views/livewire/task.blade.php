@if($task)
<div>
    <div class="row task-item">
        <div class="col task-descr {{ $task->status == 'pending' ? 'task-pending' : ($task->status == 'done' ? 'task-done' : '') }}" wire:click="$emit('toggleTaskModal', {{ $task }})">
            {{ $task->name }}
        </div>
        <div class="col-1 task-status {{ $task->status == 'pending' ? 'task-status-pending' : ($task->status == 'done' ? 'task-status-done' : '') }} align-self-center">
            {{ ucfirst($task->status) }}
        </div>
        <div class="col-1 task-actions align-self-center">
            <i class="fa fa-check-circle fa-lg green" wire:click="complete"></i>
            <i class="fa fa-edit fa-lg blue" wire:click="$emit('toggleTaskModal', {{ $task }})"></i>
            <i class="fa fa-trash fa-lg red" wire:click="delete"></i>
        </div>
    </div>  
</div>
@endif

