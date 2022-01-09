@props(['disabled' => false])

<input wire:loading.attr='disabled' {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'form-control']) !!}>
