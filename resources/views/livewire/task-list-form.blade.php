<div>
    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="createList" tabindex="-1" role="dialog" aria-labelledby="createTaskListModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="createTaskListModalLabel">{{ $update ? 'Edit List' : 'Create List' }}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="submit" class="form-task">
            
                    <div class="form-group">
                        <label for="list">Name</label>
                        <input type="text" class="form-control @error('list') is-invalid @enderror" aria-label="Text input with dropdown button" wire:model="list" id="list">
                        @error('task')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    @if($update)
                    <input type="hidden" wire:model="list_id">
                    @endif
            
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                @if($update)
                    <button type="button" class="btn btn-success" wire:click="update">Save changes</button>
                @else
                    <button type="button" class="btn btn-success" wire:click="create">Add list</button>
                @endif
            </div>
        </div>
        </div>
    </div>
</div>
