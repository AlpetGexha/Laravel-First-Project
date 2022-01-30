@props(['disabled' => false])

<textarea {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'single-textarea form-control']) !!}
    onfocus="this.placeholder = ''" onblur="this.placeholder = 'Përshkrimi'" spellcheck="true"
    style="position: relative; background: none !important; line-height: 24px;">
</textarea>
