<div>
    @forelse ($lists as $list)
        @livewire('task-list', ['list' => $list], key($list->id))
    @empty
        <h4>No list to display</h4>
    @endforelse
</div>
