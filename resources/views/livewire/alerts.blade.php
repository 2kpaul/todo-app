<div>
    @if ($alert)
        <div class="alert alert-{{ $alert['type'] }}" style="margin-top:30px;">
            {{ $alert['message'] }}
        </div>
    @endif
</div>
