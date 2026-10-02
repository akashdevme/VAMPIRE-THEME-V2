@props([
'name',
'label' => null,
'options' => [],
'selected' => null,
'multiple' => false,
'required' => false,
'divClass' => null,
'hideRequiredIndicator' => false,
])
<fieldset class="flex flex-col w-full {{ $divClass ?? '' }}" name="{{ $name }}">
    @if ($label)
    <label for="{{ $name }}" class="mb-1.5 text-xs font-semibold uppercase tracking-wide text-muted">
        {{ $label }}
        @if ($required && !$hideRequiredIndicator)
        <span class="text-error">*</span>
        @endif
    </label>
    @endif

    <div
        class="block px-2.5 py-2.5 w-full text-sm text-base bg-background-secondary border border-neutral rounded-md outline-none focus:outline-none focus:border-primary transition-all duration-300 ease-in-out">
        @if (count($options) == 0 && $slot)
        {{ $slot }}
        @else
        @foreach ($options as $key => $option)
        <div class="flex items-center gap-2">
            <input type="radio" id="{{ $name }}_{{ $key }}" name="{{ $name }}"
                class="text-primary focus:ring-primary/30 border-neutral cursor-pointer"
                value="{{ gettype($options) == 'array' ? $option : $key }}" {{ ($multiple && $selected ? in_array($key,
                $selected) : $selected==$option) ? 'checked' : '' }} />
            <label class="cursor-pointer" for="{{ $name }}_{{ $key }}">
                {{ $option }}
            </label>
        </div>
        @endforeach
        @endif
    </div>

    @error($name)
    <p class="text-error text-xs mt-1">{{ $message }}</p>
    @enderror
</fieldset>