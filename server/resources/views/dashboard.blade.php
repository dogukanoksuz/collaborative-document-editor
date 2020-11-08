<x-app-layout>
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <livewire:document.create />

            <livewire:document.show />
        </div>
    </div>
</x-app-layout>
