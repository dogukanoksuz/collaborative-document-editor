<div class="mb-5 float-right ml-5">
    <x-jet-button wire:click="confirmCreating">
        <svg class="w-6 h-6 mr-2 -ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 13h6m-3-3v6m5 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
        Yeni Doküman Oluştur
    </x-jet-button>

    <x-jet-dialog-modal wire:model="isCreating">
        <x-slot name="title">
            Yeni Doküman Oluştur
        </x-slot>

        <x-slot name="content">
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

            <x-jet-button class="ml-2" wire:click="createNewDocument({{ $folderId }})" wire:loading.attr="disabled">
                {{ __('Create') }}
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
