<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Project') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="overflow-hidden overflow-x-auto p-6 bg-white border-b border-gray-200">

                    <form method="POST" action="{{ route('projects.update', $project) }}">
                        @csrf
                        @method('PUT')

                        <!-- Title -->
                        <div>
                            <x-input-label for="title" :value="__('Title')" />
                            <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title', $project->title)" required />
                            <x-input-error :messages="$errors->get('title')" class="mt-2" />
                        </div>

                        <!-- Description -->
                        <div class="mt-4">
                            <x-input-label for="description" :value="__('Description')" />
                            <textarea id="description" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" name="description" required>{{ old('description', $project->description) }}</textarea>
                            <x-input-error :messages="$errors->get('description')" class="mt-2" />
                        </div>

                        <!-- Deadline At -->
                        <div class="mt-4">
                            <x-input-label for="deadline_at" :value="__('Deadline')" />
                            <x-text-input id="deadline_at" class="block mt-1 w-full" type="date" name="deadline_at" min="{{ today()->format('Y-m-d') }}" :value="old('deadline_at', $project->deadline_at)" required />
                            <x-input-error :messages="$errors->get('deadline_at')" class="mt-2" />
                        </div>

                        <!-- Assigned User -->
                        <div class="mt-4">
                            <x-input-label for="user_id" :value="__('Assigned user')" />
                            <select class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" name="user_id" id="user_id">
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}"
                                        @selected(old('user_id', $project->user_id) == $user->id)>{{ $user->first_name . ' ' . $user->last_name }}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('user_id')" class="mt-2" />
                        </div>

                        <!-- Assigned Client -->
                        <div class="mt-4">
                            <x-input-label for="client_id" :value="__('Client')" />
                            <select class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" name="client_id" id="client_id">
                                @foreach($clients as $client)
                                    <option value="{{ $client->id }}"
                                        @selected(old('client_id', $project->client_id) == $client->id)>{{ $client->company_name }}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('client_id')" class="mt-2" />
                        </div>

                        <!-- Status -->
                        <div class="mt-4">
                            <x-input-label for="status" :value="__('Status')" />
                            <select class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" name="status" id="status">
                                @foreach(\App\Enums\ProjectStatus::cases() as $status)
                                    <option value="{{ $status->value }}" @selected(old('status', $project->status->value) == $status->value)>{{ $status->value }}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('status')" class="mt-2" />
                        </div>

                    <div class="flex items-center space-x-4 mt-4">
                                <x-primary-button class="mt-4">
                                    {{ __('Save') }}
                                </x-primary-button>

                                <a href="{{ route('projects.index') }}" class="mt-4 inline-flex items-center px-4 py-2 bg-gray-300 border border-transparent rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest hover:bg-gray-400 focus:bg-gray-400 active:bg-gray-500 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                    {{ __('Cancel') }}
                                </a>
                            </div>
                    </form>
                    @can(\App\Enums\PermissionEnum::DELETE_PROJECTS->value)
                     <div class="flex items-center justify-between mt-4">                   
                            <form method="POST" class="inline-block" action="{{ route('projects.destroy', $project) }}"
                            onsubmit="return confirm('Are you sure you want to delete user?')">
                            @method('DELETE')
                            @csrf
                            <button type="submit" 
                                    class="mt-4 inline-flex items-center px-4 py-2 bg-gray-300 border border-transparent rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest hover:bg-red-400 focus:bg-gray-400 active:bg-gray-500 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150"
                                    
                                    onclick="event.stopPropagation()">
                                
                                {{ __('Delete project') }}
                            </button>
                            </form>
                        </div>
                    @endcan
                </div>
            </div>
        </div>
    </div>
</x-app-layout>