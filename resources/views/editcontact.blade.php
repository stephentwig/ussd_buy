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
                    <form action="{{ route('contact.update', $contact->id) }}" method="post">
                        @method('PUT')
                        @csrf
                        <label for="contact_number">Number:</label>
                        <input type="text" name="contact_number" placeholder="Enter Phone Number" value="{{$contact->contact_number}}">
                        <br>
                        <br>
                        <label for="is_whitelisted">Status:</label>
                        

                        <select name="is_whitelisted" id="">
                             <option selected value="{{$contact->is_whitelisted}}">{{ $contact->is_whitelisted === 1 ? "Whitelisted":"Blacklisted" }} </option>
                            <option value="1">Whitelisted</option>
                            <option value="0">Blacklisted</option>
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
