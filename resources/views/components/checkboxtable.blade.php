@if ($selectPage || $selectIteams)
    <div class="alert alert-info">
        <div class="row">
            <div class="col">
                @if ($selectAll)
                    <button class="btn btn-primary" wire:click.prevent='unSelectAll'>
                        Hiq selektimin për të gjithaolonat
                    </button>
                @else
                    <button class="btn btn-primary" wire:click.prevent='selectAll'>
                        Selektoj të gjitha kolonat
                    </button>

                    <button class="btn btn-primary" wire:click.prevent='selectAllHere'>
                        Selektoj të gjitha kolonat në këtë faqe
                    </button>
                @endif

                @if ($search)
                    <button class="btn btn-primary" wire:click.prevent='selectAllOnSearch'>
                        Select All with search
                    </button>
                @endif
            </div>
        </div>
        <div class="mt-1">
            <button class="btn btn-danger" wire:click.prevent='deleteSelectIteams'>Delete
                Selection {{ count($selectIteams) }}
            </button>
        </div>
    </div>

@endif
