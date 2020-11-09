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
            Dosyalar Yükleniyor
        </button>
    </div>
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-4" wire:loading.remove>
        @foreach ($documents as $document)
        <div class="float-left bg-white rounded shadow hover:bg-gray-100 transition duration-500">
            <a href="{{ route('showDocument', $document["id"]) }}" class="block p-5">
                <svg class="-ml-1 mr-3 h-6 w-6 float-left" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z">
                    </path>
                </svg>
                <div class="flex flex-col">
                    <div class="font-semibold w-full">{{ $document["name"] }}</div>
                    <div class="font-weight:300 text-gray-600 text-sm w-full">{{ \Carbon\Carbon::parse($document["updated_at"])->isoFormat('LLL') }}
                    </div>
                </div>
            </a>
        </div>
        @endforeach
    </div>
</div>
