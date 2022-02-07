<x-modal>
    <x-slot name="id">DeleteUser</x-slot>
    <x-slot name="title">Fshij Përdoruesin <i style="color: red;">{{ $username }}</i></x-slot>
    <x-slot name="function"> wire:click='delete()' </x-slot>
    <x-slot name="type">Fshije Llogarin</x-slot>

    <input type="hidden" wire:model='ids'>
    <div class="mb-3 ">
        <label for=""><b style="color: red">Kini Kujdes : </b></label> <br />
        <i style="color: red">
            {{ __('A jeni i sigurt që dëshironi të fshini llogarinë? Pasi të fshihet llogaria, të gjitha burimet dhe të dhënat do të fshihen përgjithmonë (Postimet, Ndjeksat, Ndjekjet, Kontributet etj... ).') }}
        </i>
    </div>
</x-modal>
