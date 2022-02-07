<x-modal>
    <x-slot name="id">banUser</x-slot>
    <x-slot name="title">Suspendo Përdoruesin {{ $username }}</x-slot>
    <x-slot name="function"> wire:click='ban()' </x-slot>
    <x-slot name="type">Suspendo</x-slot>

    <input type="hidden" wire:model='id'>
    <div class="mb-3">
        <x-jet-label value="{{ __('Suspendo përdoruesin për: ') }}" />
        <select wire:model.defer='userBanTime' class="form-control">
            @foreach($userBanData as $time)
                <option value="{{ $time }}"> 
                    {{ $time == 0 ? '' : $time }} {{ $time == 0 ? 'Përgjithmonë' : 'Ditë' }} 
                </option>
            @endforeach
        </select>
      
    </div>
</x-modal>
{{-- <button type="button" data-bs-toggle="modal" data-bs-target="#updateCategory">dasdas</button> --}}