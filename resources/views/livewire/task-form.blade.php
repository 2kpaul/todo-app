<div>
    @if (session()->has('message'))
        <div class="alert alert-success" style="margin-top:30px;">
            {{ session('message') }}
        </div>
    @endif


    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="createTask" tabindex="-1" role="dialog" aria-labelledby="createTaskModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="createTaskModalLabel">{{ $update ? 'Edit Task' : 'Create Task' }}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="submit" class="form-task">

                    <div class="form-group">
                        <label for="taskList">Task list</label>
                        <select class="form-control @error('list') is-invalid @enderror" wire:model="list" id="taskList">
                            <option value="">Select list</option>
                            @foreach($lists as $list)
                            <option value="{{ $list->id }}">{{ $list->name }}</option>
                            @endforeach
                        </select>
                        @error('list')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
            
                    <div class="form-group">
                        <label for="task">Task</label>
                        <input type="text" class="form-control @error('task') is-invalid @enderror" aria-label="Text input with dropdown button" wire:model="task" id="task">
                        @error('task')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
            
                    <div class="form-group">
                        <label for="taskDescription">Task description</label>
                        <textarea  class="form-control @error('description') is-invalid @enderror" rows="5" wire:model="description" id="taskDescription"></textarea>
                        @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    @if($update)
                    <input type="hidden" wire:model="task_id">
                    @endif

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                @if($update)
                    <button type="button" class="btn btn-success" wire:click="update">Save changes</button>
                @else
                    <button type="button" class="btn btn-success" wire:click="create">Add Task</button>
                @endif
                
            </div>
        </div>
        </div>
    </div>
    
</div>

