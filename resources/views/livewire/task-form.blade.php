<div>
    <form wire:submit.prevent="submit">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <select class="form-control @error('list') is-invalid @enderror" wire:model="list">
                    <option value="">Select list</option>
                    @foreach($lists as $list)
                    <option value="{{ $list->id }}">{{ $list->title }}</option>
                    @endforeach
                </select>
            </div>
            <input type="text" class="form-control @error('task') is-invalid @enderror" aria-label="Text input with dropdown button" wire:model="task">
            <div class="input-group-append">
                <button type="submit" class="btn btn-success">Add Task</button>
            </div>
          </div>
    </form>
    
</div>
