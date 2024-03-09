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
                    <div class="min-w-full align-middle">
                        <table class="table-auto w-full border mt-10">
                            <thead>
                                <tr>
                                    <th class="border text-left px-4 py-2">Tanggal</th>
                                    <th class="border text-left px-4 py-2">Total Bayar</th>
                                    <th class="border text-left px-4 py-2">Check In</th>
                                    <th class="border text-left px-4 py-2">Check Out</th>
                                    <th class="border text-left px-4 py-2">Nama</th>
                                    <th class="border text-left px-4 py-2">Kamar</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($transaksis as $transaksi)
                                    <tr>
                                        <td class="border px-4 py-2 font-medium">{{ $transaksi->tanggal }}</td>
                                        <td class="border px-4 py-2 font-medium">{{ $transaksi->total_bayar }}</td>
                                        <td class="border px-4 py-2 font-medium">{{$transaksi->check_in}}</td>
                                        <td class="border px-4 py-2 font-medium">{{$transaksi->check_out}}</td>
                                        <td class="border px-4 py-2 font-medium">{{$transaksi->user['name']}}</td>
                                        <td class="border px-4 py-2 font-medium">{{$transaksi->kamar['no_kamar']}}</td>
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
</div>