<x-liadmin>
    {{ __('Dashboard') }}
    <x-slot name="icone">fas fa-tachometer-alt</x-slot>
    <x-slot name="go">{{ route('admin.dashboard') }}</x-slot>
</x-liadmin>


<x-liadmin>
    {{ __('Userat') }}
    <x-slot name="icone">fas fa-users</x-slot>
    <x-slot name="go">{{ route('admin.user') }}</x-slot>
</x-liadmin>

<x-liadmin>
    {{ __('Rolet') }}
    <x-slot name="icone">fas fa-user-tag</x-slot>
    <x-slot name="go">{{ route('admin.role') }}</x-slot>
</x-liadmin>

<x-liadmin>
    <x-slot name="icone">fas fa-blog</x-slot>
    <x-slot name="go">{{ route('admin.post') }}</x-slot>
    {{ __('Postimet') }}
</x-liadmin>

<x-liadmin>
    <x-slot name="icone">fas fa-blog</x-slot>
    <x-slot name="go">{{ route('admin.category') }}</x-slot>
    {{ __('Kategorit') }}
</x-liadmin>

{{-- <x-liadmin>
    <x-slot name="icon">fas fas-copy</x-slot>
    Alpet
</x-liadmin> --}}
