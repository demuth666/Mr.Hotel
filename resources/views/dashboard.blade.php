<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex space-x-4">
            <div class="w-full bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 flex justify-between">
                    <span>Kamar Tersedia</span>
                    <span>{{$kamar_tersedia}}</span>
                </div>
            </div>
            <div class="w-full bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 flex justify-between">
                    <span>Jumlah Costumer</span>
                    <span>{{ $costumer }}</span>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
