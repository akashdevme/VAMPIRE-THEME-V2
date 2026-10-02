# Sanguine — a vampire-luxury theme for Paymenter

## Update log

**v2.0 — VAMPIRE-THEME-V2: purple added, much wider coverage**
- New third brand color, **Tertiary (purple)** — `tertiary` / `dark-tertiary` in
  Settings → Theme, alongside Primary (red) and Secondary (dark pink). It now
  appears in the icon-badge gradient (red → purple → pink), a third glow point
  in the dark-mode atmosphere, and two new utilities: `.text-gradient-brand`
  / `.bg-gradient-brand` — the signature three-color gradient, used on the
  dashboard greeting and the 404/500 pages.
- Fixed the same broken-color-class bug in `modal.blade.php`,
  `confirmation.blade.php`, `button/danger.blade.php`, `button/save.blade.php`,
  `notification.blade.php`, and `notifications.blade.php` — all were still
  using classes like `text-primary-100` or hardcoded `red-500`/`green-500`
  that don't exist in this token system or ignored it entirely.
- Modals and confirmation dialogs now use the `.card-trim` gold-hairline
  treatment with a blurred backdrop, matching login/register.
- Toasts and the notification bell now use the jewel-tone success/error
  colors and a branded glow instead of plain red/green.
- **404 / 500 pages** rebuilt with the brand gradient and an ornamental divider.
- **Storefront** (`products/index.blade.php`): every category and product
  tile now uses `.card .card-hover` (real elevation + lift on hover) instead
  of a flat bordered div, with display-font headings.
- **Invoice detail page** rebuilt end to end: wrapped in `.card-trim`, the
  line-item and transaction tables use `.table-premium`, paid/pending/
  processing/failed states are proper `.badge-*` pills instead of plain
  colored text, and the total uses the brand gradient. This page had the
  heaviest concentration of hardcoded `gray-500`/`gray-900`/`dark:text-white`
  classes in the whole theme — all replaced with real tokens.
- Footer gets a gold hairline top border and the display-font wordmark.

**v1.1 — professional polish pass**
- New gothic jewel-tone status system: `--color-success` (emerald), `--color-warning`
  (amber), `--color-error` (garnet), `--color-info` (amethyst), `--color-inactive`
  (slate-mauve) — each with distinct light/dark values. Use via `.badge-success`,
  `.badge-error`, `.badge-warning`, `.badge-info`, `.badge-inactive`, `.badge-primary`.
- New reusable primitives in `css/app.css`: `.icon-badge` (circular icon chip),
  `.divider-ornament` (line–gem–line section break, also as `<x-divider-ornament />`),
  `.skeleton` (brand-tinted loading shimmer), `.card-hover` (lift + gold border on
  hover), `.table-premium` (billing-table styling), `.bg-motif` (faint gold dot-grid
  texture for hero/empty sections).
- Rebuilt `dashboard.blade.php`: personalized "Welcome back, name" header, a new
  at-a-glance KPI row (services/invoices/tickets counts as proper `.card`s with
  icon badges), every section now sits in a real card instead of a bare div, and
  Unpaid Invoices is the page's `.card-trim` "signature" card.
- Fixed a second wave of the same broken-color-class bug found in the login page —
  it turned out to run through every form primitive: `input`, `checkbox`, `select`,
  `textarea`, and `radio` all referenced classes like `bg-primary-800` or
  `text-primary-100` that don't exist in this token system. All five now use real
  tokens, plus a proper focus glow (`focus:ring-4 focus:ring-primary/10`) and
  small-caps labels for a more premium form feel. `register.blade.php` had the
  same background bug as `login.blade.php` originally did — fixed the same way,
  wrapped in `.card-trim` to match.
- `toggle.blade.php` now glows when switched on.
- Sidebar nav: active links get a left accent bar in the brand color instead of
  just a background tint, separators are a thin gold gradient instead of flat
  grey, and a stray `divide-gray-200` (same class-name bug as above) is fixed.

**v1.0** — initial theme: vampire-luxury color tokens, 20-palette floating
switcher, Cormorant Garamond + Inter typography, login page fix. See below.

---


## What's different from the default theme

- **`theme.php`** — new default colors (crimson/rose on near-black or blush
  ivory) plus two new settings: `gold` / `dark-gold` (the hairline trim
  color) and `show_palette_switcher` (turn the floating picker off without
  touching code).
- **`views/layouts/colors.blade.php`** — outputs the new `--color-gold`
  variable the same way every other color is output.
- **`css/app.css`**:
  - Fonts swapped to Cormorant Garamond (headings, via `--font-display`)
    and Inter (body, via `--font-sans`), loaded from Google Fonts in
    `layouts/app.blade.php`.
  - `.card` got a soft crimson-tinted shadow instead of a flat border-only
    look; new `.card-trim` utility adds a thin gold hairline across the
    top — used on the login form, meant for the one or two "signature"
    cards per page, not everywhere.
  - New `.btn-glow` utility (soft glow + press animation), applied to
    `x-button.primary`.
  - A very faint two-tone radial glow behind the page in dark mode only.
  - Visible focus ring in the brand color (keyboard accessibility).
  - At the bottom of the file: the 20 accent palettes (see below).
- **`views/components/palette-switcher.blade.php`** — new component, the
  floating bottom-right button.
- **`views/layouts/app.blade.php`** — loads the two fonts, includes the
  palette switcher.
- **`views/components/navigation/index.blade.php`** — site name now uses
  the display serif.
- **`views/components/button/primary.blade.php`** — added `.btn-glow`.
- **`views/auth/login.blade.php`** — the default theme's login form
  referenced a few color classes (`bg-primary-800`, `text-secondary-500`,
  etc.) that don't exist in this token system and were rendering as
  unstyled; replaced with real tokens and wrapped in `.card-trim`.

## How the palette switcher works

The admin-set colors in Settings → Theme control the *base* look
(background, text, borders) for Light/Dark/System — that's all standard
Paymenter behavior, untouched.

The floating button is a separate, purely front-end layer on top of that:
clicking a swatch sets `data-palette="<id>"` on `<html>` and saves the
choice in the visitor's own browser (`localStorage`, via Alpine's
`$persist` — nothing is sent to the server, so it's per-visitor, not
global). CSS rules like:

```css
html[data-palette="crimson-classic"] { --color-primary: 350 70% 42%; --color-secondary: 340 55% 48%; }
html.dark[data-palette="crimson-classic"] { --color-primary: 350 78% 50%; --color-secondary: 340 65% 56%; }
```

override just `--color-primary` / `--color-secondary` — background, text
and border colors keep following Light/Dark/System as normal.

### Adding, removing, or re-coloring palettes

Two places need to agree on the `id`:

1. `css/app.css` (bottom of the file) — the `html[data-palette="..."]` /
   `html.dark[data-palette="..."]` rule pair for that id.
2. `views/components/palette-switcher.blade.php` — the `$palettes` array
   at the top (`id`, display `name`, and a `swatch` CSS color used only
   for the little preview dot).

Delete a palette by removing it from both places; add one the same way.

### Turning the switcher off

Admin panel → Settings → Theme tab → uncheck "Show Palette Switcher".
Or, to remove it from the code entirely, delete the
`<x-palette-switcher />` line in `views/layouts/app.blade.php`.

## After any edit

Custom CSS/JS needs a rebuild — nothing shows up from just editing the
files:

```bash
npm run build VAMPIRE-THEME-V2
```

(Blade/PHP file edits — like tweaking `theme.php` or any `.blade.php`
view — don't need a rebuild, only CSS/JS does.)
