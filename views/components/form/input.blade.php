@props(['name', 'label' => null, 'required' => false, 'divClass' => null, 'class' => null,'placeholder' => null, 'id' => null, 'type' => null, 'hideRequiredIndicator' => false, 'dirty' => false])
<fieldset class="flex flex-col w-full {{ $divClass ?? '' }}">
    @if ($label)
        <label for="{{ $name }}" class="mb-1.5 text-xs font-semibold uppercase tracking-wide text-muted">
            {{ $label }}
            @if ($required && !$hideRequiredIndicator)
                <span class="text-error">*</span>
            @endif
        </label>
    @endif
    <input type="{{ $type ?? 'text' }}" id="{{ $id ?? $name }}" name="{{ $name }}"
        class="block w-full text-sm text-base bg-background-secondary border border-neutral rounded-md shadow-sm outline-none focus:border-primary focus:ring-4 focus:ring-primary/10 hover:border-primary/40 transition-all duration-300 ease-in-out disabled:bg-background-secondary/50 disabled:cursor-not-allowed disabled:hover:border-neutral {{ $class ?? '' }} @if ($type !== 'color') px-2.5 py-2.5 @endif"
        placeholder="{{ $placeholder ?? ($label ?? '') }}"
        @if ($dirty && isset($attributes['wire:model'])) wire:dirty.class="!border-warning" @endif
        {{ $attributes->except(['placeholder', 'label', 'id', 'name', 'type', 'class', 'divClass', 'required', 'hideRequiredIndicator', 'dirty']) }} @required($required) />
    @error($name)
        <p class="text-error text-xs mt-1">{{ $message }}</p>
    @enderror
</fieldset>
