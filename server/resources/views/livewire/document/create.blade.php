<div>
    <x-jet-button wire:click="confirmCreating">
        Yeni Doküman Oluştur
    </x-jet-button>

    <x-jet-dialog-modal wire:model="isCreating">
        <x-slot name="title">
            Yeni Doküman Oluştur
        </x-slot>

        <x-slot name="content">
            @if (!empty($message))
            <div class="flex items-center bg-blue-500 text-white text-sm font-bold px-4 py-3 w-3/4" role="alert">
                <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <path
                        d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z" />
                    </svg>
                <p>{{ $message }}</p>
            </div>
            @endif
            Oluşturmak istediğiniz dokümanın ismini yazınız.


            <div class="mt-4" x-data="{}">
                <x-jet-input type="text" class="mt-1 block w-3/4" placeholder="{{ __('Name') }}" x-ref="name"
                    wire:model.defer="name" />
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('isCreating')" wire:loading.attr="disabled">
                {{ __('Close') }}
            </x-jet-secondary-button>

            <x-jet-button class="ml-2" wire:click="createNewDocument" wire:loading.attr="disabled">
                {{ __('Create') }}
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
