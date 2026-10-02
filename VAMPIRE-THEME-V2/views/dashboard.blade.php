<div class="container mt-14">
    <x-navigation.breadcrumb />

    <div class="mt-2 mb-6">
        <h1 class="text-3xl mb-1.5 text-gradient-brand inline-block font-display font-semibold">{{ __('dashboard.welcome_back', ['name' => Auth::user()->name]) }}</h1>
        <p class="text-base text-muted">
            {{ __('dashboard.dashboard_description') }}
        </p>
    </div>

    <x-divider-ornament class="mb-8" />

    @php
        $activeServicesCount = Auth::user()->services()->where('status', 'active')->count();
        $unpaidInvoicesCount = Auth::user()->invoices()->where('status', 'pending')->count();
        $ticketsEnabled = !config('settings.tickets_disabled', false);
        $openTicketsCount = $ticketsEnabled ? Auth::user()->tickets()->where('status', '!=', 'closed')->count() : 0;
    @endphp

    <!-- At-a-glance summary -->
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 mb-10">
        <div class="card p-6 flex items-center gap-4">
            <div class="icon-badge">
                <x-ri-archive-stack-fill class="size-5" />
            </div>
            <div>
                <p class="text-3xl font-display font-semibold leading-none">{{ $activeServicesCount }}</p>
                <p class="text-xs uppercase tracking-wide text-muted mt-1.5">{{ __('dashboard.active_services') }}</p>
            </div>
        </div>

        <div class="card p-6 flex items-center gap-4">
            <div class="icon-badge">
                <x-ri-receipt-fill class="size-5" />
            </div>
            <div>
                <p class="text-3xl font-display font-semibold leading-none">{{ $unpaidInvoicesCount }}</p>
                <p class="text-xs uppercase tracking-wide text-muted mt-1.5">{{ __('dashboard.unpaid_invoices') }}</p>
            </div>
        </div>

        @if($ticketsEnabled)
        <div class="card p-6 flex items-center gap-4">
            <div class="icon-badge">
                <x-ri-customer-service-fill class="size-5" />
            </div>
            <div>
                <p class="text-3xl font-display font-semibold leading-none">{{ $openTicketsCount }}</p>
                <p class="text-xs uppercase tracking-wide text-muted mt-1.5">{{ __('dashboard.open_tickets') }}</p>
            </div>
        </div>
        @endif
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-start">

        <div class="grid gap-8 items-start">
            <!-- Active Services -->
            <div class="card p-6">
                <div class="flex items-center justify-between mb-6">
                    <div class="flex items-center gap-3">
                        <div class="icon-badge icon-badge-sm">
                            <x-ri-archive-stack-fill class="size-4" />
                        </div>
                        <h2 class="text-lg font-display font-semibold">{{ __('dashboard.active_services') }}</h2>
                    </div>
                    <span class="badge badge-primary">{{ $activeServicesCount }}</span>
                </div>
                <div class="space-y-4">
                    <livewire:services.widget status="active" />
                </div>
                <x-navigation.link
                    class="card-hover bg-background-secondary border border-neutral flex items-center justify-center rounded-lg mt-2 py-2.5"
                    :href="route('services')">
                    {{ __('dashboard.view_all') }}
                    <x-ri-arrow-right-fill class="size-5" />
                </x-navigation.link>
            </div>

            <!-- Open Tickets -->
            @if($ticketsEnabled)
            <div class="card p-6">
                <div class="flex items-center justify-between mb-6">
                    <div class="flex items-center gap-3">
                        <div class="icon-badge icon-badge-sm">
                            <x-ri-customer-service-fill class="size-4" />
                        </div>
                        <h2 class="text-lg font-display font-semibold">{{ __('dashboard.open_tickets') }}</h2>
                        <a href="{{ route('tickets.create') }}" wire:navigate class="text-muted hover:text-primary transition-colors">
                            <x-ri-add-fill class="size-5 h-5" />
                        </a>
                    </div>
                    <span class="badge badge-primary">{{ $openTicketsCount }}</span>
                </div>
                <div class="space-y-4">
                    <livewire:tickets.widget />
                </div>
                <x-navigation.link
                    class="card-hover bg-background-secondary border border-neutral flex items-center justify-center rounded-lg mt-2 py-2.5"
                    :href="route('tickets')">
                    {{ __('dashboard.view_all') }}
                    <x-ri-arrow-right-fill class="size-5 h-5" />
                </x-navigation.link>
            </div>
            @endif
        </div>

        <div class="grid gap-8 items-start">
            <!-- Unpaid Invoices — the signature card on this page -->
            <div class="card-trim p-6">
                <div class="flex items-center justify-between mb-6">
                    <div class="flex items-center gap-3">
                        <div class="icon-badge icon-badge-sm">
                            <x-ri-receipt-fill class="size-4" />
                        </div>
                        <h2 class="text-lg font-display font-semibold">{{ __('dashboard.unpaid_invoices') }}</h2>
                    </div>
                    <span class="badge badge-primary">{{ $unpaidInvoicesCount }}</span>
                </div>
                <div class="space-y-4">
                    <livewire:invoices.widget :limit="3" />
                </div>
                <x-navigation.link
                    class="card-hover bg-background-secondary border border-neutral flex items-center justify-center rounded-lg mt-2 py-2.5"
                    :href="route('invoices')">
                    {{ __('dashboard.view_all') }}
                    <x-ri-arrow-right-fill class="size-5 h-5" />
                </x-navigation.link>
            </div>
            {!! hook('pages.dashboard') !!}
        </div>
    </div>
</div>
