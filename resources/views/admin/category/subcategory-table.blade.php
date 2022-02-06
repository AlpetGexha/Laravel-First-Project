{{-- subcategory --}}
<x-Admin>
    <x-slot name="name">
        {{ __('Nën Kategori') }}
    </x-slot>
   <livewire:admin.subcategory.sub-category-table /> 
</x-Admin>

<script type="text/javascript">
    // Per tu mbyllur model pas submitit
    window.livewire.on('updateSubCategory', () => { //emit
        $('#updateSubCategory').modal('hide'); //modal id
    });
</script>
