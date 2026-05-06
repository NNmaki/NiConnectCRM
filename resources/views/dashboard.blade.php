<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="mb-6">
            <h3 class="text-2xl font-bold text-gray-800 mb-6">Overview</h3>
            <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-6 gap-6">
               
                <!-- Total Tasks -->
                <div class="bg-white rounded-xl p-6 shadow-md hover:shadow-xl transition-all duration-300 cursor-pointer transform hover:-translate-y-1 border-t-4 border-blue-500" onclick="window.location='{{ route('tasks.index') }}'">
                    <div class="flex items-center justify-between mb-2">
                        <div class="ml-3">
                            <span class="material-symbols-outlined text-blue-500 text-5xl">pending_actions</span>
                        </div>
                        <div class="text-3xl font-bold text-gray-800">{{ $stats['total_tasks'] }}
                        </div>
                        </div>
                    <div class="text-sm font-semibold text-gray-600">Total Tasks
                    </div>
                </div>

                <!-- Open Tasks -->
                <div class="bg-white rounded-xl p-6 shadow-md hover:shadow-xl transition-all duration-300 cursor-pointer transform hover:-translate-y-1 border-t-4 border-yellow-500" 
                     onclick="window.location='{{ route('tasks.index') }}'">
                    <div class="flex items-center justify-between mb-2">
                         <div class="ml-3">
                            <span class="material-symbols-outlined text-yellow-500 text-5xl">view_kanban</span>
                        </div> 
                        <div class="text-3xl font-bold text-gray-800">{{ $stats['open_tasks'] }}</div>
                    </div>
                    <div class="text-sm font-semibold text-gray-600">Open Tasks</div>
                </div>

                <!-- In Progress -->
                <div class="bg-white rounded-xl p-6 shadow-md hover:shadow-xl transition-all duration-300 cursor-pointer transform hover:-translate-y-1 border-t-4 border-green-500" 
                     onclick="window.location='{{ route('tasks.index') }}'">
                    <div class="flex items-center justify-between mb-2">
                         <div class="ml-3">
                            <span class="material-symbols-outlined text-green-500 text-5xl">pace</span>
                        </div>
                        <div class="text-3xl font-bold text-gray-800">{{ $stats['in_progress_tasks'] }}</div>
                    </div>
                    <div class="text-sm font-semibold text-gray-600">Tasks in Progress</div>
                </div>

                <!-- Projects -->
                <div class="bg-white rounded-xl p-6 shadow-md hover:shadow-xl transition-all duration-300 cursor-pointer transform hover:-translate-y-1 border-t-4 border-purple-500" 
                     onclick="window.location='{{ route('projects.index') }}'">
                    <div class="flex items-center justify-between mb-2">
                        <div class="ml-3">
                            <span class="material-symbols-outlined text-purple-500 text-5xl">filter_9_plus</span>
                        </div>
                        <div class="text-3xl font-bold text-gray-800">{{ $stats['total_projects'] }}</div>
                    </div>
                    <div class="text-sm font-semibold text-gray-600">Total Projects</div>
                </div>

                <!-- Clients -->
                <div class="bg-white rounded-xl p-6 shadow-md hover:shadow-xl transition-all duration-300 cursor-pointer transform hover:-translate-y-1 border-t-4 border-pink-500" 
                     onclick="window.location='{{ route('clients.index') }}'">
                    <div class="flex items-center justify-between mb-2">
                          <div class="ml-3">
                            <span class="material-symbols-outlined text-pink-500 text-5xl">diversity_3</span>
                        </div>
                        <div class="text-3xl font-bold text-gray-800">{{ $stats['total_clients'] }}</div>
                    </div>
                    <div class="text-sm font-semibold text-gray-600">Total Clients</div>
                </div>

                <!-- Users -->
                <div class="bg-white rounded-xl p-6 shadow-md hover:shadow-xl transition-all duration-300 cursor-pointer transform hover:-translate-y-1 border-t-4 border-indigo-500" 
                     onclick="window.location='{{ route('users.index') }}'">
                    <div class="flex items-center justify-between mb-2">
                           <div class="ml-3">
                            <span class="material-symbols-outlined text-indigo-500 text-5xl">productivity</span>
                        </div>
                        <div class="text-3xl font-bold text-gray-800">{{ $stats['total_users'] }}</div>
                    </div>
                    <div class="text-sm font-semibold text-gray-600">Total Users</div>
                </div>
            </div>
        </div>
            <!-- tahan tulevia tehtavia -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-4">
                    <h4 class="text-lg font-semibold text-gray-800 mb-4">Most urgent tasks</h4>
                    
                    @if($tasks->count() > 0)
                        <div class="space-y-2">
                            @foreach($tasks as $task)
                                <div class="border-l-4 border-blue-500 bg-gray-50 p-4 hover:bg-sky-50 transition-colors duration-150 cursor-pointer"
                                     onclick="window.location='{{ route('tasks.edit', $task) }}'">
                                    <div class="flex justify-between items-start">
                                        <div class="flex-1">
                                            <h5 class="font-semibold text-gray-900">{{ $task->title }}</h5>
                                            <p class="text-sm text-gray-600 mt-1">{{ Str::limit($task->description, 100) }}</p>
                                            <div class="flex gap-2 mt-1 text-xs text-gray-500">
                                                <span class="material-symbols-outlined text-blue-500 text-xl ml-2">person</span> 
                                                <span class="mt-2">{{ $task->user->first_name }} {{ $task->user->last_name }}</span>
                                                <span class="material-symbols-outlined text-gray-600 text-xl ml-2">account_balance</span> 
                                                <span class="mt-2">{{ $task->client->company_name }}</span>
                                                <span class="material-symbols-outlined text-yellow-500 text-xl ml-2">topic</span> 
                                                <span class="mt-2">{{ $task->project->title }}</span>
                                            </div>
                                        </div>
                                        <div class="ml-4 flex flex-col items-end gap-1">

                                            <span class="px-3 py-1 rounded-full text-xs font-semibold {{ $task->getStatusColorClass() }}">
                                                {{ ucfirst($task->status->value) }}
                                            </span>
                                            <span class="text-sm text-gray-600">
                                                {{ \Carbon\Carbon::parse($task->deadline_at)->format('d.m.Y') }}
                                            </span>
                                            <span class="material-symbols-outlined text-yellow-600 text-xl mr-6">calendar_month</span>

                                        </div>
                                          
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        
                        <div class="mt-4 text-center">
                            <a href="{{ route('tasks.index') }}" class="text-blue-600 hover:text-blue-800 underline">
                                Show all tasks →
                            </a>
                        </div>
                    @else
                        <p class="text-gray-500">Ei tulevia tehtäviä.</p>
                    @endif
                </div>
            </div>

            <!-- ja tulevia projekteja -->
        
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-4">
                <div class="p-4">
                    <h4 class="text-lg font-semibold text-gray-800 mb-4">Most urgent projects</h4>
                    
                    @if($projects->count() > 0)
                        <div class="space-y-2">
                            @foreach($projects as $project)
                                <div class="border-l-4 border-green-500 bg-gray-50 p-4 hover:bg-green-50 transition-colors duration-150 cursor-pointer"
                                     onclick="window.location='{{ route('projects.edit', $project) }}'">
                                    <div class="flex justify-between items-start">
                                        <div class="flex-1">
                                            <h5 class="font-semibold text-gray-900">{{ $project->title }}</h5>
                                            <p class="text-sm text-gray-600 mt-1">{{ Str::limit($project->description, 100) }}</p>
                                            <div class="flex gap-2 mt-1 text-xs text-gray-500">
                                                <span class="material-symbols-outlined text-blue-500 text-xl ml-2">person</span> 
                                                <span class="mt-2">{{ $project->user->first_name }} {{ $project->user->last_name }}</span>
                                                <span class="material-symbols-outlined text-gray-600 text-xl ml-2">account_balance</span> 
                                                <span class="mt-2">{{ $project->client->company_name }}</span>
                                           </div>
                                        </div>
                                        <div class="ml-4 flex flex-col items-end gap-1">
                                            <span class="px-3 py-1 rounded-full text-xs font-semibold {{ $project->getStatusColorClass() }}">
                                                {{ ucfirst($project->status->value) }}
                                            </span>
                                            <span class="text-sm text-gray-600">
                                                {{ \Carbon\Carbon::parse($project->deadline_at)->format('d.m.Y') }}
                                            </span>
                                            <span class="material-symbols-outlined text-yellow-600 text-xl mr-6">calendar_month</span>
                                            </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        
                        <div class="mt-4 text-center">
                            <a href="{{ route('projects.index') }}" class="text-blue-600 hover:text-blue-800 underline">
                                Show all projects →
                            </a>
                        </div>
                    @else
                        <p class="text-gray-500">Ei tulevia tehtäviä.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>