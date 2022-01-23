<x-liadmin>
    {{ __('Dashboard') }}
    <x-slot name="icone">fas fa-tachometer-alt</x-slot>
    <x-slot name="go">{{ route('admin.dashboard') }}</x-slot>
</x-liadmin>

@can('user_show')
    <x-liadmin>
        {{ __('Userat') }}
        <x-slot name="icone">fas fa-users</x-slot>
        <x-slot name="go">{{ route('admin.user') }}</x-slot>
    </x-liadmin>
@endcan

@can('role_show')
    <x-liadmin>
        {{ __('Rolet') }}
        <x-slot name="icone">fas fa-user-tag</x-slot>
        <x-slot name="go">{{ route('admin.role') }}</x-slot>
    </x-liadmin>
@endcan

@can('post_show')
    <x-liadmin>
        <x-slot name="icone">fas fa-blog</x-slot>
        <x-slot name="go">{{ route('admin.post') }}</x-slot>
        {{ __('Postimet') }}
    </x-liadmin>
@endcan

@can('category_show')
    <x-liadmin>
        <x-slot name="icone">fas fa-tags</x-slot>
        <x-slot name="go">{{ route('admin.category') }}</x-slot>
        {{ __('Kategorit') }}
    </x-liadmin>
@endcan

@can('admin_show')
    <x-liadmin>
        <x-slot name="icone">fas fa-sign-out-alt</x-slot>
        <x-slot name="go">{{ route('ballina') }}</x-slot>
        {{ __('Shko në faqen kryesore') }}
    </x-liadmin>
@endcan
{{-- <x-liadmin>
    <x-slot name="icon">fas fas-copy</x-slot>
    Alpet
</x-liadmin> --}}
