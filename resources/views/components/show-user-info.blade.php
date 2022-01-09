<!-- Modal -->
<div wire:ignore.self class="modal fade" id="{{ $id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ $title }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            
            <div class="modal-body">
                <form action="">
                    <div class="form-grup">
                        {{ $slot }}
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Mbyll</button>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    // Per tu mbyllur model pas submitit
    window.livewire.on('addTodo', () => { //emit
        $('#createTodo').modal('hide');
    });

    window.livewire.on('updateTodo', () => { //emit
        $('#updatesTodo').modal('hide');
    });
</script>