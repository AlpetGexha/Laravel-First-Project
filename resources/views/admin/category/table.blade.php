<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Categorit') }}
        </h2>
    </x-slot>
    <livewire:admin.category.category-table>
</x-app-layout>

<script type="text/javascript">
    // Per tu mbyllur model pas submitit
    window.livewire.on('updateCategory', () => { //emit
        $('#updateCategory').modal('hide'); //modal id
    });
</script>
