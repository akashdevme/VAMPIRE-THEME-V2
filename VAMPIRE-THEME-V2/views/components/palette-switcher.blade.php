@php
    // 20 curated accent palettes, all within the crimson / rose / wine family.
    // Add or remove rows here to change what shows up in the picker below —
    // 'id' must match a `html[data-palette="..."]` block in css/app.css.
    $palettes = [
    ['id' => 'crimson-classic', 'name' => 'Crimson Classic', 'swatch' => 'hsl(350, 78%, 50%)'],
    ['id' => 'blood-rose', 'name' => 'Blood Rose', 'swatch' => 'hsl(355, 78%, 50%)'],
    ['id' => 'dark-orchid-bite', 'name' => 'Dark Orchid Bite', 'swatch' => 'hsl(315, 84%, 52%)'],
    ['id' => 'midnight-garnet', 'name' => 'Midnight Garnet', 'swatch' => 'hsl(5, 80%, 44%)'],
    ['id' => 'ruby-noir', 'name' => 'Ruby Noir', 'swatch' => 'hsl(348, 80%, 44%)'],
    ['id' => 'wine-noir', 'name' => 'Wine Noir', 'swatch' => 'hsl(358, 80%, 44%)'],
    ['id' => 'velvet-merlot', 'name' => 'Velvet Merlot', 'swatch' => 'hsl(335, 78%, 50%)'],
    ['id' => 'crimson-velvet', 'name' => 'Crimson Velvet', 'swatch' => 'hsl(352, 84%, 52%)'],
    ['id' => 'rosewood', 'name' => 'Rosewood', 'swatch' => 'hsl(8, 82%, 52%)'],
    ['id' => 'vampires-kiss', 'name' => 'Vampire\'s Kiss', 'swatch' => 'hsl(340, 78%, 50%)'],
    ['id' => 'scarlet-reign', 'name' => 'Scarlet Reign', 'swatch' => 'hsl(2, 84%, 52%)'],
    ['id' => 'bloodmoon', 'name' => 'Bloodmoon', 'swatch' => 'hsl(356, 80%, 44%)'],
    ['id' => 'nightshade-rose', 'name' => 'Nightshade Rose', 'swatch' => 'hsl(320, 78%, 50%)'],
    ['id' => 'cherry-noir', 'name' => 'Cherry Noir', 'swatch' => 'hsl(345, 80%, 44%)'],
    ['id' => 'sanguine-rose', 'name' => 'Sanguine Rose', 'swatch' => 'hsl(349, 78%, 50%)'],
    ['id' => 'plum-vein', 'name' => 'Plum Vein', 'swatch' => 'hsl(300, 78%, 50%)'],
    ['id' => 'frostbite-crimson', 'name' => 'Frostbite Crimson', 'swatch' => 'hsl(350, 64%, 58%)'],
    ['id' => 'gothic-fuchsia', 'name' => 'Gothic Fuchsia', 'swatch' => 'hsl(320, 84%, 52%)'],
    ['id' => 'burgundy-noir', 'name' => 'Burgundy Noir', 'swatch' => 'hsl(0, 80%, 44%)'],
    ['id' => 'draculas-ember', 'name' => 'Dracula\'s Ember', 'swatch' => 'hsl(10, 82%, 52%)'],
    ];
@endphp

@if(theme('show_palette_switcher', true))
<div
    x-data="{
        open: false,
        palette: $persist('sanguine-rose').as('accent_palette'),
        palettes: @js($palettes),
        current() {
            return this.palettes.find(p => p.id === this.palette) || this.palettes[0]
        },
        select(id) {
            this.palette = id
            document.documentElement.setAttribute('data-palette', id)
            this.open = false
        },
        init() {
            document.documentElement.setAttribute('data-palette', this.palette)
        }
    }"
    @keydown.escape.window="open = false"
    class="fixed bottom-6 right-6 rtl:right-auto rtl:left-6 z-30"
>
    <div
        x-show="open"
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 translate-y-2 scale-95"
        x-transition:enter-end="opacity-100 translate-y-0 scale-100"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100 translate-y-0 scale-100"
        x-transition:leave-end="opacity-0 translate-y-2 scale-95"
        @click.away="open = false"
        x-cloak
        class="card absolute bottom-17 right-0 rtl:right-auto rtl:left-0 w-64 p-4 origin-bottom-right rtl:origin-bottom-left"
        role="dialog"
        aria-label="Choose accent palette"
    >
        <p class="text-sm font-semibold mb-3">Accent palette</p>

        <div class="grid grid-cols-5 gap-2.5">
            <template x-for="p in palettes" :key="p.id">
                <button
                    type="button"
                    @click="select(p.id)"
                    class="size-8 rounded-full border-2 transition hover:scale-110 cursor-pointer"
                    :class="palette === p.id ? 'border-gold' : 'border-transparent'"
                    :style="{ backgroundColor: p.swatch }"
                    :aria-label="p.name"
                    :aria-pressed="palette === p.id"
                    :title="p.name"
                ></button>
            </template>
        </div>

        <p class="text-xs text-muted mt-3" x-text="current().name"></p>
    </div>

    <button
        type="button"
        @click="open = !open"
        class="size-14 rounded-full border border-neutral bg-background-secondary btn-glow flex items-center justify-center cursor-pointer"
        :aria-expanded="open"
        aria-label="Choose accent palette"
    >
        <span class="size-6 rounded-full border border-gold/60" :style="{ backgroundColor: current().swatch }"></span>
    </button>
</div>
@endif
