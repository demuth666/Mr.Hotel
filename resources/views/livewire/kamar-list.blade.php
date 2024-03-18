<div>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Kamar') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 overflow-hidden overflow-x-auto bg-white border-b border-gray-200">

                    <x-button wire:click="$dispatch('openModal', {component: 'kamar-modal'})">
                        Tambah Kamar
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
                                    <th class="border text-left px-4 py-2">No Kamar</th>
                                    <th class="border text-left px-4 py-2">Kelas Kamar</th>
                                    <th class="border text-left px-4 py-2">Harga Kamar</th>
                                    <th class="border text-left px-4 py-2">Status Kamar</th>
                                    <th class="border text-left px-4 py-2">Gambar</th>
                                    <th class="border text-left px-4 py-2 ">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($kamars as $kamar)
                                    <tr>
                                        <td class="border px-4 py-2 font-medium">{{ $kamar->no_kamar }}</td>
                                        <td class="border px-4 py-2 font-medium">{{ $kamar->kelas_kamar }}</td>
                                        <td class="border px-4 py-2 font-medium">{{ 'Rp ' . number_format($kamar->harga_kamar, 0, ',', '.') }}</td>
                                        @if($kamar->status_kamar == 'Tersedia')
                                        <td class="border px-4 py-2 font-medium text-green-500">{{ $kamar->status_kamar }}</td>
                                        @else
                                        <td class="border px-4 py-2 font-medium text-red-500">{{ $kamar->status_kamar }}</td>
                                        @endif
                                        <td class="border px-4 py-2 font-medium text-red-500">
                                            <img src="{{ asset('storage/' . $kamar->image) }}" alt="{{ $kamar->no_kamar }}" class="w-20 h-20">
                                        </td>
                                        <td class="border px-4 py-2 font-medium">
                                            <div class="flex space-x-3">
                                                <x-button wire:click="$dispatch('openModal', { component: 'kamar-modal', arguments: { kamar: {{ $kamar }} }})">
                                                    Edit
                                                </x-button>
                                                    <x-danger-button wire:click="delete({{ $kamar->id }})">Hapus</x-danger-button>
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
                {{ $kamars->links() }}
            </div>
        </div>
    </div>