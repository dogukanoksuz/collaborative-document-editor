<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
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
        <div class="float-left">
            <nav class="text-black font-bold my-3" aria-label="Breadcrumb">
                <ol class="list-none p-0 inline-flex">
                    <li class="flex items-center">
                        <a href="{{ route('dashboard') }}">Pano</a>
                    </li>
                </ol>
            </nav>
        </div>
        
        <livewire:document.create :emitTo="null" :folderId="null" />
        <livewire:document.show :documents="null" />
    </div>
</div>
