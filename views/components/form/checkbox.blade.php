<div class="flex items-center {{ $divClass ?? '' }}">
    {{-- <input type="hidden" name="{{ $name }}" value="0" /> --}}
    <input type="checkbox" name="{{ $name }}" id="{{ $id ?? $name }}"
        {{ $attributes->except(['label', 'name', 'id', 'class', 'divClass', 'required']) }}
        class="form-checkbox size-4 text-primary rounded focus:ring-primary/30 hover:bg-secondary/10 ring-offset-background-secondary focus:ring-2 bg-background-secondary border-neutral cursor-pointer" />
    <label class="ml-2 text-sm text-base cursor-pointer" for="{{ $id ?? $name }}">
        @if(isset($label))
            {{ $label }}
        @else
            {{ $slot }}
        @endif
    </label>

    @error($name)
        <p class="text-error text-xs">{{ $message }}</p>
    @enderror
</div>
