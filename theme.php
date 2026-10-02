<?php

return [
    'name' => 'Vampire Theme V2',
    'author' => 'Your Company',
    'url' => 'https://paymenter.org',

    'settings' => [
        [
            'name' => 'direct_checkout',
            'label' => 'Direct Checkout',
            'type' => 'checkbox',
            'default' => false,
            'database_type' => 'boolean',
            'description' => 'Don\'t show the product overview page, go directly to the checkout page',
        ],
        [
            'name' => 'small_images',
            'label' => 'Small Images',
            'type' => 'checkbox',
            'default' => false,
            'database_type' => 'boolean',
            'description' => 'Show small images in the product overview page',
        ],
        [
            'name' => 'show_category_description',
            'label' => 'Show Category Description',
            'type' => 'checkbox',
            'default' => true,
            'database_type' => 'boolean',
            'description' => 'Show the category description in the product overview page/homepage',
        ],
        [
            'name' => 'logo_display',
            'label' => 'Logo display',
            'type' => 'select',
            'options' => [
                'logo-only' => 'Logo only',
                'logo-and-name' => 'Logo and Name',
            ],
            'default' => 'logo-and-name',
        ],
        [
            'name' => 'home_page_text',
            'label' => 'Home Page Text',
            'type' => 'markdown',
            'default' => 'Welcome. Step inside.',
        ],
        [
            'name' => 'show_palette_switcher',
            'label' => 'Show Palette Switcher',
            'type' => 'checkbox',
            'default' => true,
            'database_type' => 'boolean',
            'description' => 'Show the floating bottom-right button that lets visitors pick from 20 accent palettes',
        ],

        // ---- Brand colors (Light mode) ------------------------------------------------
        [
            'name' => 'primary',
            'label' => 'Primary - Brand Color (Light)',
            'type' => 'color',
            'default' => 'hsl(349, 70%, 42%)',
        ],
        [
            'name' => 'secondary',
            'label' => 'Secondary - Brand Color (Light)',
            'type' => 'color',
            'default' => 'hsl(338, 55%, 48%)',
        ],
        [
            'name' => 'tertiary',
            'label' => 'Tertiary - Purple Brand Color (Light)',
            'type' => 'color',
            'default' => 'hsl(275, 55%, 48%)',
        ],
        [
            'name' => 'neutral',
            'label' => 'Borders, Accents... (Light)',
            'type' => 'color',
            'default' => 'hsl(345, 22%, 86%)',
        ],
        [
            'name' => 'base',
            'label' => 'Base - Text Color (Light)',
            'type' => 'color',
            'default' => 'hsl(345, 35%, 10%)',
        ],
        [
            'name' => 'muted',
            'label' => 'Muted - Text Color (Light)',
            'type' => 'color',
            'default' => 'hsl(345, 14%, 42%)',
        ],
        [
            'name' => 'inverted',
            'label' => 'Inverted - Text Color (Light)',
            'type' => 'color',
            'default' => 'hsl(350, 45%, 98%)',
        ],
        [
            'name' => 'background',
            'label' => 'Background - Color (Light)',
            'type' => 'color',
            'default' => 'hsl(350, 45%, 97%)',
        ],
        [
            'name' => 'background-secondary',
            'label' => 'Background - Secondary Color (Light)',
            'type' => 'color',
            'default' => 'hsl(345, 48%, 93%)',
        ],
        [
            'name' => 'gold',
            'label' => 'Gold Trim - Hairlines & Highlights (Light)',
            'type' => 'color',
            'default' => 'hsl(38, 45%, 52%)',
        ],

        // ---- Brand colors (Dark mode) --------------------------------------------------
        [
            'name' => 'dark-primary',
            'label' => 'Primary - Brand Color (Dark)',
            'type' => 'color',
            'default' => 'hsl(349, 78%, 50%)',
        ],
        [
            'name' => 'dark-secondary',
            'label' => 'Secondary - Brand Color (Dark)',
            'type' => 'color',
            'default' => 'hsl(338, 65%, 56%)',
        ],
        [
            'name' => 'dark-tertiary',
            'label' => 'Tertiary - Purple Brand Color (Dark)',
            'type' => 'color',
            'default' => 'hsl(275, 65%, 62%)',
        ],
        [
            'name' => 'dark-neutral',
            'label' => 'Borders, Accents... (Dark)',
            'type' => 'color',
            'default' => 'hsl(345, 28%, 17%)',
        ],
        [
            'name' => 'dark-base',
            'label' => 'Base - Text Color (Dark)',
            'type' => 'color',
            'default' => 'hsl(350, 30%, 95%)',
        ],
        [
            'name' => 'dark-muted',
            'label' => 'Muted - Text Color (Dark)',
            'type' => 'color',
            'default' => 'hsl(345, 14%, 62%)',
        ],
        [
            'name' => 'dark-inverted',
            'label' => 'Inverted - Text Color (Dark)',
            'type' => 'color',
            'default' => 'hsl(345, 40%, 99%)',
        ],
        [
            'name' => 'dark-background',
            'label' => 'Background - Color (Dark)',
            'type' => 'color',
            'default' => 'hsl(345, 40%, 5%)',
        ],
        [
            'name' => 'dark-background-secondary',
            'label' => 'Background - Secondary Color (Dark)',
            'type' => 'color',
            'default' => 'hsl(345, 32%, 8%)',
        ],
        [
            'name' => 'dark-gold',
            'label' => 'Gold Trim - Hairlines & Highlights (Dark)',
            'type' => 'color',
            'default' => 'hsl(40, 55%, 62%)',
        ],
    ],
];
