<div class="task-item d-flex justify-content-between">
    <div class="task-descr {{ $task->completed == 1 ? 'bg-success' : '' }}">
        {{ $task->body }}
    </div>
    <div class="task-actions align-self-center">
        <i class="fa fa-check-circle fa-lg green" wire:click="complete"></i>
        <i class="fa fa-trash fa-lg red" wire:click="delete()"></i>
    </div>
</div>  