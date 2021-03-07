<div class="float-left w-full mb-10">
    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
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
        <x-jet-form-section submit="share">
            <x-slot name="title">
                {{ $document->name }} dosyasının paylaşımını ayarlayın
            </x-slot>
        
            <x-slot name="description">
                Paylaşmak istediğiniz kullanıcının e-posta adresini yazınız.
            </x-slot>
        
            <x-slot name="form">
                <!-- Email -->
                <div class="col-span-6 sm:col-span-4">
                    <x-jet-label for="email" value="{{ __('Email') }}" />
                    <x-jet-input id="email" type="email" class="mt-1 block w-full" wire:model="email" />
                    <x-jet-input-error for="email" class="mt-2" />
                </div>
                <div class="col-span-6 sm:col-span-4">
                    <span class="font-semibold">Dokümanın kullanıcıları:</span> 
                    <ul>
                        @foreach ($users as $user)
                        <li>{{ $user->name }} ({{ $user->email }}) <a href="#" wire:click="deleteShare('{{ $user->id }}')"><svg class="float-right w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg></a></li> 

                        @endforeach
                    </ul>
                </div>
            </x-slot>
        
            <x-slot name="actions">
                <x-jet-action-message class="mr-3" on="saved">
                    {{ __('Saved.') }}
                </x-jet-action-message>
                
                <x-jet-secondary-button class="mr-3" wire:click="redirectToDocument">
                    Dokümana geri dön
                </x-jet-secondary-button>

                <x-jet-button>
                    Paylaşım izni ver
                </x-jet-button>
            </x-slot>
        </x-jet-form-section>
        
    </div>
</div>

