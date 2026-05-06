<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Clients') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
     <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <span class="material-symbols-outlined text-gray-600 text-6xl ml-2">account_balance</span>
                        <span class="text-gray-900 text-3xl ml-6">Clients</span> 
                    </div>
                     <a href="{{ route('clients.create') }}" class="mt-4 mr-4 inline-flex items-center px-4 py-2 bg-gray-300 border border-transparent rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest hover:bg-gray-400 focus:bg-gray-400 active:bg-gray-500 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                    {{ __('Create') }}
                                </a>
                </div>
                    <table class="min-w-full divide-y divide-gray-200 border mt-4">
                        <thead>
                        <tr>

                            <th class="px-6 py-3 bg-gray-50 text-left">
                                <span class="text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Company</span>
                            </th>
                            <th class="px-6 py-3 bg-gray-50 text-left">
                                <span class="text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Person</span>
                            </th>
                            <th class="px-6 py-3 bg-gray-50 text-left">
                                <span class="text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Email</span>
                            </th>
                            <th class="px-6 py-3 bg-gray-50 text-left">
                                <span class="text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Address</span>
                            </th>
                            <th class="px-6 py-3 bg-gray-50 text-left">
                                <span class="text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">City</span>
                            </th>
                            <th class="px-6 py-3 bg-gray-50 text-left">
                            </th>

                        </tr>
                        </thead>

                        <tbody class="bg-white divide-y divide-gray-200 divide-solid">
                            @foreach($clients as $client)
                            <tr class="bg-white hover:bg-sky-50 transition-colors duration-150 cursor-pointer" onclick="window.location='{{ route('clients.edit', $client) }}'">
                                <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">
                                    {{ $client->company_name }}
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">
                                    {{ $client->contact_name }}
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">
                                    {{ $client->contact_email }}
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">
                                    {{ $client->company_address }}
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">
                                    {{ $client->company_city }}
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>

                    <div class="mt-4">
                        {{ $clients->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
