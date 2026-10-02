<x-button.primary {{ $attributes->merge(['class' => 'bg-error bg-none text-white py-2 px-4 rounded hover:bg-error/80 btn-glow'])}}>
    {{ $slot }}
</x-button.primary>