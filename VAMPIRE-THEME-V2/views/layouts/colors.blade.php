<style>
    :root {
        /* Branding Colors (Light) */
        --color-primary: {{ str_replace(',', '', preg_replace('/^hsl\((.+)\)$/', '$1', theme('primary', '229 100% 64%'))) }};
        --color-secondary: {{ str_replace(',', '', preg_replace('/^hsl\((.+)\)$/', '$1', theme('secondary', '237 33% 60%'))) }};
        --color-tertiary: {{ str_replace(',', '', preg_replace('/^hsl\((.+)\)$/', '$1', theme('tertiary', '275 55% 48%'))) }};

        /* Neutral Colors - Borders, Accents... (Light) */
        --color-neutral: {{ str_replace(',', '', preg_replace('/^hsl\((.+)\)$/', '$1', theme('neutral', '220 25% 85%'))) }};

        /* Text Colors (Light) */
        --color-base: {{ str_replace(',', '', preg_replace('/^hsl\((.+)\)$/', '$1', theme('base', '0 0% 0%'))) }};
        --color-muted: {{ str_replace(',', '', preg_replace('/^hsl\((.+)\)$/', '$1', theme('muted', '0 0% 40%'))) }};
        --color-inverted: {{ str_replace(',', '', preg_replace('/^hsl\((.+)\)$/', '$1', theme('inverted', '100 100% 100%'))) }};

        /* State Colors (Light) - gothic jewel tones */
        --color-success: 152 55% 36%;
        --color-error: 8 72% 48%;
        --color-warning: 38 82% 46%;
        --color-inactive: 320 8% 52%;
        --color-info: 265 42% 52%;

        /* Background Colors (Light) */
        --color-background: {{ str_replace(',', '', preg_replace('/^hsl\((.+)\)$/', '$1', theme('background', '100 100% 100%'))) }};
        --color-background-secondary: {{ str_replace(',', '', preg_replace('/^hsl\((.+)\)$/', '$1', theme('background-secondary', '0 0% 97%'))) }};

        /* Gold Trim - hairlines & highlights (Light) */
        --color-gold: {{ str_replace(',', '', preg_replace('/^hsl\((.+)\)$/', '$1', theme('gold', '38 45% 52%'))) }};
    }

    .dark {
        /* Branding Colors (Dark) */
        --color-primary: {{ str_replace(',', '', preg_replace('/^hsl\((.+)\)$/', '$1', theme('dark-primary', '229 100% 64%'))) }};
        --color-secondary: {{ str_replace(',', '', preg_replace('/^hsl\((.+)\)$/', '$1', theme('dark-secondary', '237 33% 60%'))) }};
        --color-tertiary: {{ str_replace(',', '', preg_replace('/^hsl\((.+)\)$/', '$1', theme('dark-tertiary', '275 65% 62%'))) }};

        /* Neutral Colors - Borders, Accents... (Dark) */
        --color-neutral: {{ str_replace(',', '', preg_replace('/^hsl\((.+)\)$/', '$1', theme('dark-neutral', '0 0% 17%'))) }};

        /* State Colors (Dark) - gothic jewel tones, brightened for a dark backdrop */
        --color-success: 152 55% 48%;
        --color-error: 8 78% 58%;
        --color-warning: 38 85% 58%;
        --color-inactive: 320 8% 62%;
        --color-info: 265 50% 66%;

        /* Text Colors (Dark) */
        --color-base: {{ str_replace(',', '', preg_replace('/^hsl\((.+)\)$/', '$1', theme('dark-base', '100 100% 100%'))) }};
        --color-muted: {{ str_replace(',', '', preg_replace('/^hsl\((.+)\)$/', '$1', theme('dark-muted', '220 0% 53%'))) }};
        --color-inverted: {{ str_replace(',', '', preg_replace('/^hsl\((.+)\)$/', '$1', theme('dark-inverted', '220 14% 60%'))) }};

        /* Background Colors (Dark) */
        --color-background: {{ str_replace(',', '', preg_replace('/^hsl\((.+)\)$/', '$1', theme('dark-background', '240 18% 9%'))) }};
        --color-background-secondary: {{ str_replace(',', '', preg_replace('/^hsl\((.+)\)$/', '$1', theme('dark-background-secondary', '240 13% 11%'))) }};

        /* Gold Trim - hairlines & highlights (Dark) */
        --color-gold: {{ str_replace(',', '', preg_replace('/^hsl\((.+)\)$/', '$1', theme('dark-gold', '40 55% 62%'))) }};
    }
</style>