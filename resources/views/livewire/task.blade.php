<div>
    <div class="row task-item">
        <div class="col task-descr {{ $task->status == 'pending' ? 'task-pending' : ($task->status == 'done' ? 'task-done' : '') }}" data-toggle="modal" data-target="#task-{{ $task->id }}">
            {{ $task->name }}
        </div>
        <div class="col-2 task-status {{ $task->status == 'pending' ? 'task-status-pending' : ($task->status == 'done' ? 'task-status-done' : '') }} align-self-center">
            {{ ucfirst($task->status) }}
        </div>
        <div class="col-1 task-actions align-self-center">
            <i class="fa fa-check-circle fa-lg green" wire:click="complete"></i>
            <i class="fa fa-trash fa-lg red" wire:click="delete()"></i>
        </div>
    </div>  
</div>

<!-- Modal -->
<div class="modal fade" id="task-{{ $task->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title task-descr {{ $task->status == 'pending' ? 'task-pending' : ($task->status == 'done' ? 'task-done' : '') }}" id="exampleModalLabel">
            {{ $task->name }}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            {{ $task->body }}
        </div>
        <div class="modal-footer">
            <div class="task-status p-1 {{ $task->status == 'pending' ? 'task-status-pending' : ($task->status == 'done' ? 'task-status-done' : '') }}">{{ ucfirst($task->status) }}</div>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
        </div>
      </div>
    </div>
  </div>