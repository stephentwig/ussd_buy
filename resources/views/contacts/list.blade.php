<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('List Numbers') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex flex-col">
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                    <table class="min-w-full divide-y divide-gray-200" >
                                        <thead class="bg-gray-50">
                                        <tr>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Numbers
                                            </th>
                                            <th scope="col" class="relative px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Status
                                            </th>
                                            <th scope="col" class="relative px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Date Created
                                            </th>
                                            <th scope="col" class="relative px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Edit
                                            </th>
                                            <th scope="col" class="relative px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Blacklist
                                            </th>
                                            <th scope="col" class="relative px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Delete
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-gray-200">
                                        @foreach ($contacts as $contact)


                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                {{ $contact->contact_number }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                <a href="{{ route('contact.edit', $contact) }}" class="text-indigo-600 hover:text-indigo-900">{{ $contact->is_whitelisted === 1 ? "Whitelisted" :"Blacklisted"}}</a>
                                            </td>


                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                {{ $contact->created_at }}
                                            </td>

                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                <a href="{{ route('contact.edit', $contact) }}" class="bg-green-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit</a>
                                            </td>

                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                <a href="{{ route('contact.blacklist', $contact) }}" class="bg-yellow-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Blacklist</a>
                                            </td>

                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                <a href="{{ route('contact.delete', $contact) }}" class="bg-red-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Delete</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                        </tbody>
                                    </table>

                                </div>
                                <div class="mt-4">
                                {{ $contacts->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
