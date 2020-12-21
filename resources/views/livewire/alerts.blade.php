<div>
    @if ($alert)
        <div class="alert alert-{{ $alert['type'] }} alert-dismissible fade show" style="margin-top:30px;" role="alert">
            {{ $alert['message'] }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
</div>
