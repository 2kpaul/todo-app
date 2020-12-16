<div>
    <h3>Create task</h3>
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

        
        <div class="form-group">
            <button type="submit" class="btn btn-success">Add Task</button>

        </div>

    </form>
    
</div>
