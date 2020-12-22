<div>
    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="createComment" tabindex="-1" role="dialog" aria-labelledby="createCommentLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="createCommentLabel">Comments</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
            <form wire:submit.prevent="submit">
                <div class="form-group">
                    <textarea  class="form-control @error('comment') is-invalid @enderror" rows="5" wire:model="comment"></textarea>
                    @error('comment')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                </div>    
            </form>
            <button type="button" class="btn btn-success" wire:click="postComment">post comment</button>
            
            @if($load_comments)
                <div class="comments">
                    @forelse ($task->comments as $comm)
                        <div class="comment">
                            <div>{{ $comm->body }}</div>
                            <div class="small">{{ $comm->updated_at->diffForHumans() }}</div>
                        </div>
                    @empty
                        <p>No comments to display</p>
                    @endforelse
                </div>
            @endif

            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
        </div>
    </div>
</div>
