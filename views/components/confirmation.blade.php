<template x-teleport="body">
    <div class="fixed inset-0 z-30 flex items-center justify-center overflow-hidden bg-black/60 backdrop-blur-sm"
        x-show="$store.confirmation.show" 
        x-on:keydown.escape.window="!$store.confirmation.loading && $store.confirmation.close()">
        <!-- Modal inner -->
        <div class="card-trim px-6 py-5 w-full mx-2 md:mx-auto text-left max-h-screen overflow-y-auto mb-8 mt-8 max-w-2xl"
            x-cloak x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 scale-90"
            x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-300"
            x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-90">
            <div class="flex justify-between items-center">

                <h2 class="text-2xl font-display font-semibold text-base" x-text="$store.confirmation.title"></h2>
                <button @click="!$store.confirmation.loading && $store.confirmation.close()" 
                        class="text-muted hover:text-primary transition-colors cursor-pointer"
                        :class="{ 'opacity-50 cursor-not-allowed': $store.confirmation.loading }">
                    <x-ri-close-fill class="size-6" />
                </button>
            </div>
            <div class="mt-4 text-base" x-text="$store.confirmation.message"></div>
            <div class="mt-5 sm:mt-4 flex-col sm:flex-row flex sm:flex-row-reverse gap-2">
                <x-button.primary type="button" 
                    x-on:click="$store.confirmation.execute()"
                    ::disabled="$store.confirmation.loading">             
                    <!-- Loading spinner -->
                    <template x-if="$store.confirmation.loading">
                        <div class="mr-2">
                            <x-ri-loader-5-fill class="size-4 animate-spin" />
                        </div>
                    </template>
                    
                    <span x-text="$store.confirmation.loading ? 'Loading...' : $store.confirmation.confirmText"></span>
                </x-button.primary>
                
                <x-button.danger type="button" 
                    x-text="$store.confirmation.cancelText" 
                    x-on:click="!$store.confirmation.loading && $store.confirmation.close()"
                    ::disabled="$store.confirmation.loading">
                </x-button.danger>
            </div>
        </div>
    </div>
</template>