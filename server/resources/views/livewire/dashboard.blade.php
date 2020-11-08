<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div>
            @if ($message)
            <div class="alert alert-success">
                {{ $message }}
            </div>
            @endif
        </div>
        <livewire:document.create />
        <livewire:document.show />
    </div>
</div>
