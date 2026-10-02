<x-app-layout>
    <x-slot name="title">
        {{ __('errors.404.title') }}
    </x-slot>

    <div class="container flex flex-col items-center justify-center text-center py-24 min-h-[60vh]">
        <p class="text-8xl sm:text-9xl font-display font-bold text-gradient-brand leading-none">404</p>
        <x-divider-ornament class="w-40" />
        <h1 class="text-3xl font-display font-semibold tracking-tight text-balance sm:text-5xl">
            {{ __('errors.404.title') }}
        </h1>
        <p class="mt-5 text-base font-medium text-pretty text-muted sm:text-lg max-w-md">
            {{ __('errors.404.message') }}
        </p>
        <div class="mt-10 flex items-center justify-center gap-x-6">
            <a href="{{ route('home') }}" wire:navigate>
                <x-button.primary>
                    {{ __('errors.404.return_home') }}
                </x-button.primary>
            </a>
        </div>
    </div>
</x-app-layout>