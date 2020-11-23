<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div>
            <div>
                @if ($message)
                <div class="mb-5 bg-teal-100 border-t-4 border-teal-500 rounded text-teal-900 px-4 py-3 shadow-md"
                    role="alert">
                    <div class="flex">
                        <div class="py-1"><svg class="fill-current h-6 w-6 text-teal-500 mr-4"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path
                                    d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z" />
                            </svg></div>
                        <div>
                            <p class="font-bold mt-1">{{ $message }}</p>
                        </div>
                    </div>
                </div>
                @endif
            </div>
           
            <livewire:breadcrumb :folderId="$folderId" :documentId="null" />

            <livewire:document.create :emitTo="'folder.list-contents'" :folderId="$folderId" />
            <livewire:folder.create :emitTo="'folder.list-contents'" :folderId="$folderId" />

            @if($empty == 2)
            <div class="w-full mb-10 text-center flex items-center justify-center" style="height: 600px;">
                <div class="w-64 h-64 bg-gray-200 rounded-full flex items-center justify-center flex-col">
                    <svg class="w-24 h-24 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                    <div class="text-gray-500">Yeni düğmesine tıklayarak <br> dosya oluşturun</div>
                </div>
            </div>
            @endif

            <livewire:folder.show :folders="$subfolders" :folderId="$folderId" />
            <livewire:document.show :documents="$documents" />
        </div>
    </div>
</div>
