<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit User') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

            <div class="p-8 pt-16">            
                <p>You're not allowed to make changes on this section</p>
                <a href="{{ route('users.index') }}" class="mt-4 inline-flex items-center px-4 py-2 bg-gray-300 border border-transparent rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest hover:bg-gray-400 focus:bg-gray-400 active:bg-gray-500 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition ease-in-out duration-150">
                {{ __('Back') }}
                </a>
            </div>

                <div class="overflow-hidden overflow-x-auto p-6 bg-white border-b border-gray-100">
                @can(\App\Enums\PermissionEnum::MANAGE_USERS->value)
                    <form method="POST" action="{{ route('users.update', $user) }}">
                        @method('put')
                        @csrf

                        <!-- First Name -->
                        <div>
                            <x-input-label for="first_name" :value="__('First Name')" />
                            <x-text-input id="first_name" class="block mt-1 w-full" type="text" name="first_name" :value="old('first_name', $user->first_name)" required />
                            <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
                        </div>

                        <!-- Last Name -->
                        <div class="mt-4">
                            <x-input-label for="last_name" :value="__('Last Name')" />
                            <x-text-input id="last_name" class="block mt-1 w-full" type="text" name="last_name" :value="old('last_name', $user->last_name)" required />
                            <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
                        </div>

                        <!-- Email Address -->
                        <div class="mt-4">
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $user->email)" required />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>
                            <div class="flex items-center gap-4 mt-4">
                                    <x-primary-button class="mt-4">
                                        {{ __('Save') }}
                                    </x-primary-button>
                                    <a href="{{ route('users.index') }}" class="mt-4 inline-flex items-center px-4 py-2 bg-gray-300 border border-transparent rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest hover:bg-gray-400 focus:bg-gray-400 active:bg-gray-500 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                        {{ __('Cancel') }}
                                    </a>
                            </div>
                        </form>
                        <div class="flex items-right gap-4 mt-4">
                                 <form method="POST" class="inline-block" action="{{ route('users.destroy', $user) }}"
                            onsubmit="return confirm('Are you sure you want to delete user?')">
                                @method('DELETE')
                                @csrf
                                <button type="submit" 
                                        class="mt-4 inline-flex items-center px-4 py-2 bg-gray-300 border border-transparent rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest hover:bg-red-400 focus:bg-gray-400 active:bg-gray-500 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150"
                                        
                                        onclick="event.stopPropagation()">
                                    
                                    {{ __('Delete') }}
                                </button>
                                </form>
                    @endcan
                        </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>