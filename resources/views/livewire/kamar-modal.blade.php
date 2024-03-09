<div class="p-6">
   <form wire:submit="save">
    <div class="col-span-12">
        <div class="mt-4">
            <x-label for="form.no_kamar" value="{{ __('No Kamar') }}" />
            <x-input wire:model="form.no_kamar" id="form.no_kamar" class="block mt-1 w-full" type="number" required
                autocomplete="form.no_kamar" />
            <x-input-error for="form.no_kamar" class="mt-2" />
        </div>
    </div>

    <div class="col-span-12">
        <div class="mt-4">
            <x-label for="form.kelas_kamar" value="{{ __('Kelas Kamar') }}" />
            <x-input wire:model="form.kelas_kamar" id="form.kelas_kamar" class="block mt-1 w-full" type="text" required
                autocomplete="form.kelas_kamar" />
            <x-input-error for="form.kelas_kamar" class="mt-2" />
        </div>
    </div>

    <div class="col-span-12">
        <div class="mt-4">
            <x-label for="form.harga_kamar" value="{{ __('Harga Kamar') }}" />
            <x-input wire:model="form.harga_kamar" id="form.harga_kamar" class="block mt-1 w-full" type="number" required
                autocomplete="form.harga_kamar" />
            <x-input-error for="form.harga_kamar" class="mt-2" />
        </div>
    </div>

    @if($kamar && $kamar->exists)
    <div class="col-span-12">
        <div class="mt-4">
            <x-label for="form.status_kamar" value="{{ __('Status Kamar') }}" />
                <select wire:model="form.status_kamar" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full">
                    <option value="Tersedia">Tersedia</option>
                    <option value="Tidak Tersedia">Tidak Tersedia</option>
                </select>
            <x-input-error for="form.status_kamar" class="mt-2" />
        </div>
    </div>
    @endif  

    <x-button class="mt-4">
        {{ __('Simpan') }}
    </x-button>
   </form>
</div>
