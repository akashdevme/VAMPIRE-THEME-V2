@props(['class' => null])

<div {{ $attributes->merge(['class' => 'divider-ornament ' . ($class ?? '')]) }}>
    <span class="divider-ornament-line"></span>
    <span class="divider-ornament-gem"></span>
    <span class="divider-ornament-line"></span>
</div>
