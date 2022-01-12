<div>
    <span wire:click='sortBy({{ $by }})' class="text-sm" style="cursor: pointer">
        <i class="fa fa-arrow-up {{ $sortBy === $by && $sortDirection === 'asc' ? '' : 'text-muted' }}"></i>
        <i class="fa fa-arrow-down {{ $sortBy === $by && $sortDirection === 'desc' ? '' : 'text-muted' }}"></i>
    </span>
</div>
