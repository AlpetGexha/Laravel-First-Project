<x-Admin>
    <x-slot name="name">
        {{ __('Kategorit') }}
    </x-slot>
    <livewire:admin.category.category-table>
</x-Admin>

<script type="text/javascript">
    // Per tu mbyllur model pas submitit
    window.livewire.on('updateCategory', () => { //emit
        $('#updateCategory').modal('hide'); //modal id
    });
</script>
