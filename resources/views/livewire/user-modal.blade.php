<div class="p-6">
    <form wire:submit="save">
        <div class="col-span-12">
            <div class="mt-4">
                <x-label for="form.nik" value="{{ __('Nik') }}" />
                <x-input wire:model="form.nik" id="form.nik" class="block mt-1 w-full" type="number" required
                    autocomplete="form.nik" />
                <x-input-error for="form.nik" class="mt-2" />
            </div>
        </div>

        <div class="col-span-12">
            <div class="mt-4">
                <x-label for="form.name" value="{{ __('Nama') }}" />
                <x-input wire:model="form.name" id="form.name" class="block mt-1 w-full" type="text" required
                    autocomplete="form.name" />
                <x-input-error for="form.name" class="mt-2" />
            </div>
        </div>

        <div class="col-span-12">
            <div class="mt-4">
                <x-label for="form.email" value="{{ __('Email') }}" />
                <x-input wire:model="form.email" id="form.email" class="block mt-1 w-full" type="email"
                    required autocomplete="form.email" />
                <x-input-error for="form.email" class="mt-2" />
            </div>
        </div>

        <div class="col-span-12">
            <div class="mt-4">
                <x-label for="form.password" value="{{ __('Password') }}" />
                <x-input wire:model="form.password" id="form.password" class="block mt-1 w-full" type="password"
                    required autocomplete="form.password" />
                <x-input-error for="form.password" class="mt-2" />
            </div>
        </div>

        <div class="col-span-12">
            <div class="mt-4">
                <x-label for="form.role_id" value="{{ __('Roles') }}" />
                <select wire:model="form.role_id" id="form.role_id"
                    class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full">
                    <option value="" selected>Pilih role</option>
                    @foreach ($roles as $role)
                        <option value="{{ $role->id }}">{{ $role->role }}</option>
                    @endforeach
                </select>
                <x-input-error for="form.role_id" class="mt-2" />
            </div>
        </div>

        <div class="col-span-12">
            <div class="mt-4">
                <x-label for="form.phone" value="{{ __('Phone') }}" />
                <x-input wire:model="form.phone" id="form.phone" class="block mt-1 w-full" type="number"
                    required autocomplete="form.phone" />
                <x-input-error for="form.phone" class="mt-2" />
            </div>
        </div>
 
     <x-button class="mt-4">
         {{ __('Simpan') }}
     </x-button>
    </form>
 </div>
 