<div>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Users') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 overflow-hidden overflow-x-auto bg-white border-b border-gray-200">
                    <x-button wire:click="$dispatch('openModal', {component: 'user-modal'})">
                        Tambah User
                    </x-button>

                    <form class="max-w-md mb-5">   
                        <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only">Search</label>
                        <div class="pt-2 relative mx-auto text-gray-600">
                            <input wire:model.live.debounce.500ms='search' class="border-2 mt-3 border-gray-300 bg-white h-10 px-4 pr-16 rounded-lg text-sm focus:outline-none"
                              type="search" name="search" placeholder="Search">
                          </div>
                    </form>

                    <div class="min-w-full align-middle">
                        <table class="table-auto w-full border mt-10">
                            <thead>
                                <tr>
                                    <th class="border text-left px-4 py-2">NIK</th>
                                    <th class="border text-left px-4 py-2">Nama</th>
                                    <th class="border text-left px-4 py-2">Email</th>
                                    <th class="border text-left px-4 py-2">Roles</th>
                                    <th class="border text-left px-4 py-2">Phone</th>
                                    <th class="border text-left px-4 py-2 ">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($users as $user)
                                    <tr>
                                        <td class="border px-4 py-2 font-medium">{{ $user->nik }}</td>
                                        <td class="border px-4 py-2 font-medium">{{ $user->name }}</td>
                                        <td class="border px-4 py-2 font-medium">{{$user->email}}</td>
                                        <td class="border px-4 py-2 font-medium">{{$user->roles['role']}}</td>
                                        <td class="border px-4 py-2 font-medium">{{$user->phone}}</td>
                                        <td class="border px-4 py-2 font-medium">
                                            <div class="flex space-x-3">
                                                <x-button wire:click="$dispatch('openModal', { component: 'user-modal', arguments: { user: {{ $user }} }})">
                                                    Edit
                                                </x-button>
                                                    <x-danger-button wire:click="delete({{ $user->id }})">Hapus</x-danger-button>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td class="border px-4 py-2 font-medium" colspan="6">Data tidak ditemukan
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                {{-- {{ $users->links() }} --}}
            </div>
        </div>
</div>