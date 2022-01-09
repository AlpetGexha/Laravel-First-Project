<x-app-layout>
    <x-slot name="header">
        {{ __('Perdoruesi') }} / {{ __($user->username) }}
    </x-slot>

    <livewire:user.show :username="$user->username" />

    {{-- <livewire:post.show :userid="$user->id"> --}}

</x-app-layout>
<script type="text/javascript">
    // Per tu mbyllur model pas submitit
    window.livewire.on('addTodo', () => { //emit
        $('#createTodo').modal('hide');
    });

    window.livewire.on('updateTodo', () => { //emit
        $('#updatesTodo').modal('hide');
    });
</script>
