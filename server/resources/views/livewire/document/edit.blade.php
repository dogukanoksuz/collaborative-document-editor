<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <livewire:breadcrumb :folderId="$folderId" :documentId="$document->id" />
        {{ $document->name }}
        {{ $document->content }}
    </div>
</div>