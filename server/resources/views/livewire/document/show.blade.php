<div>
    <div wire:loading>
        Fetching Documents...
    </div>
    <div wire:loading.remove>
    @foreach ($documents as $document)
        <a href="{{ route('showDocument', $document->id) }}"> 
            {{ $document->name }}<br>
            {{ $document->updated_at->isoFormat('LLL') }}<br>
        </a><br>
    @endforeach
    </div>
</div>
