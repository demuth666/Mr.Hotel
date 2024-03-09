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

                    <div class="min-w-full align-middle">
                        <table class="table-auto w-full border mt-10">
                            <thead>
                                <tr>
                                    <th class="border text-left px-4 py-2">No Kamar</th>
                                    <th class="border text-left px-4 py-2">Kelas Kamar</th>
                                    <th class="border text-left px-4 py-2">Harga Kamar</th>
                                    <th class="border text-left px-4 py-2">Status Kamar</th>
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
                {{-- {{ $users->links() }} --}}
            </div>
        </div>
    </div>