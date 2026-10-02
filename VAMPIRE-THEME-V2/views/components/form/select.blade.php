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
<fieldset class="flex flex-col w-full {{ $divClass ?? '' }}">
    @if ($label)
    <label for="{{ $name }}" class="mb-1.5 text-xs font-semibold uppercase tracking-wide text-muted">
        {{ $label }}
        @if ($required && !$hideRequiredIndicator)
        <span class="text-error">*</span>
        @endif
    </label>
    @endif

    <select id="{{ $id ?? $name }}" {{ $multiple ? 'multiple' : '' }} {{ $attributes->except(['options', 'id', 'name', 'multiple'])->merge(['class' => 'block px-2.5 py-2.5 w-full text-sm text-base bg-background-secondary border border-neutral
        rounded-md outline-none focus:border-primary focus:ring-4 focus:ring-primary/10 hover:border-primary/40 transition-all duration-300 ease-in-out form-select disabled:bg-background-secondary/50 disabled:cursor-not-allowed']) }} name="{{ $name }}{{ $multiple ? '[]' : '' }}">
        @if (count($options) == 0 && $slot)
        {{ $slot }}
        @else
        @foreach ($options as $key => $option)
        <option value="{{ gettype($options) == 'array' ? $option : $key }}" {{ ($multiple && $selected ? in_array($key,
            $selected) : $selected==$option) ? 'selected' : '' }}>
            {{ $option }}</option>
        @endforeach
        @endif
    </select>
    @if ($multiple)
    <p class="text-xs text-muted mt-1">
        {{ __('Pro tip: Hold down the Ctrl (Windows) / Command (Mac) button to select multiple options.') }}</p>
    @endif

    @error($name)
    <p class="text-error text-xs mt-1">{{ $message }}</p>
    @enderror
</fieldset>