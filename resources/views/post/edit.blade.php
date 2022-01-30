<x-app-layout>
    @push('styles')
        <link rel="stylesheet" href="{{ asset('AdminPanel/plugins/select2/css/select2.min.css') }}">
    @endpush
    <x-slot name="header">
        {{ __('Nrysho Postimin') }} / {{ $post->title }}
    </x-slot>
    {{-- Postime --}}
    <x-jet-authentication-card>
        <x-slot name="logo"> </x-slot>
        <livewire:post.post :id="$post->id">
    </x-jet-authentication-card>
    @push('scripts')
        <script src="{{ asset('AdminPanel/plugins/select2/js/select2.full.min.js') }}"></script>

        <script>
            $(function() {
                $('.select2').select2()
            });
        </script>
    @endpush
</x-app-layout>
