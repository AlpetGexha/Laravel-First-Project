<button {{ $attributes->merge(['type' => 'submit', 'class' => 'btn btn-dark text-uppercase']) }}  wire:loading.attr='disabled'>
    {{ $slot }}
</button>
