<div class="float-left w-full mb-10">
    <div class="grid grid-cols-2 lg:grid-cols-5 gap-4" wire:loading>
        <button type="button"
            class="inline-flex items-center px-4 py-2 border border-transparent text-center leading-6 font-medium rounded-md text-white bg-gray-800  focus:outline-none transition ease-in-out duration-150 cursor-not-allowed"
            disabled="">
            <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor"
                    d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                </path>
            </svg>
            Klasörler Yükleniyor
        </button>
    </div>
    <div class="grid grid-cols-2 lg:grid-cols-5 gap-4" wire:loading.remove>
        @foreach ($folders as $folder)
        <div class="float-left bg-white rounded shadow hover:bg-gray-100 transition duration-500">
            <a href="{{ route('listFolderContents', $folder['id']) }}" class="block p-5">
                <svg class="-ml-1 mr-3 h-6 w-6 float-left" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"></path></svg>
                <div class="font-semibold">{{ $folder['name'] }}</div>
            </a>
        </div>
        @endforeach
    </div>
</div>
