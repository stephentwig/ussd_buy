<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            
            {{ __('Edit Number') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                   
                    <br>
                    <br>
                    <form action="{{ route('profile.update') }}" method="post">
                        @csrf
                        <label for="contact_number">Number:</label>
                        <input type="text" name="contact_number" placeholder="Enter Phone Number">
                        <br>
                        <br>
                        <label for="is_whitelisted">Status:</label>
                        

                        <select name="is_whitelisted" id="">
                            <option value="1">Whitelist</option>
                            <option value="0">Blacklist</option>
                        </select>
                        <br>
                        <br>
                        <input type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" value="Update Number">
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>