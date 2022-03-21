<x-slot name="header">
    <h2 class="text-center">Laravel 8 Livewire CRUD Demo</h2>
</x-slot>
<div class="py-12">
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="px-4 py-4 overflow-hidden bg-white shadow-xl sm:rounded-lg">
            @if (session()->has('message'))
            <div class="px-4 py-3 my-3 text-teal-900 bg-teal-100 border-t-4 border-teal-500 rounded-b shadow-md"
                role="alert">
                <div class="flex">
                    <div>
                        <p class="text-sm">{{ session('message') }}</p>
                    </div>
                </div>
            </div>
            @endif
            <button wire:click="create()"
                class="inline-flex justify-center w-full px-4 py-2 my-4 text-base font-bold text-white bg-red-600 border border-transparent rounded-md shadow-sm hover:bg-red-700">
                Create User
            </button>
            @if($isModalOpen)
            @include('livewire.create')
            @endif
            <table class="w-full table-fixed">
                <thead>
                    <tr class="bg-gray-800">
                        <th class="w-20 px-4 py-2">No.</th>
                        <th class="px-4 py-2">Name</th>
                        <th class="px-4 py-2">Email</th>
                        <th class="px-4 py-2">Mobile</th>
                        <th class="px-4 py-2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @dd($users)
                    @foreach($users as $user)
                    <tr class="text-gray-700">
                        <td class="px-4 py-2 border">{{ $user->id }}</td>
                        <td class="px-4 py-2 border">{{ $user->firstname }}</td>
                        <td class="px-4 py-2 border">{{ $user->email}}</td>
                        <td class="px-4 py-2 border">{{ $user->mobile}}</td>
                        <td class="px-4 py-2 border">
                            <button wire:click="edit({{ $user->id }})"
                                class="flex px-4 py-2 text-gray-900 bg-gray-500 cursor-pointer">Edit</button>
                            <button wire:click="delete({{ $user->id }})"
                                class="flex px-4 py-2 text-gray-900 bg-red-100 cursor-pointer">Delete</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
