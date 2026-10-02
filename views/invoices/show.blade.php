<div class="container mt-14">
    <div @if ($checkPayment) wire:poll.5s="checkPaymentStatus" @endif>
        @if ($this->pay || $showPayModal)
        @include('invoices.partials.payment-modal')
        @endif

        <div class="flex justify-end">
            <div class="max-w-[200px] w-full text-right">
                <span class="cursor-pointer text-base hover:text-primary transition-colors underline underline-offset-2" wire:click="downloadPDF">
                    <span wire:loading wire:target="downloadPDF">
                        <x-ri-loader-5-fill class="size-6 animate-spin" />
                    </span>
                    <span wire:loading.remove wire:target="downloadPDF">
                        {{ __('invoices.download_pdf') }}
                    </span>
                </span>
            </div>
        </div>

        <div class="card-trim p-8 sm:p-12 mt-2">
            <h1 class="text-2xl font-display font-semibold sm:text-3xl">
                {{ !$invoice->number && config('settings.invoice_proforma', false) ? __('invoices.proforma_invoice', ['id'
            => $invoice->id]) : __('invoices.invoice', ['id' => $invoice->number]) }}
            </h1>
            <div class="sm:flex justify-between pr-4 pt-4">
                <div class="mt-4 sm:mt-0">
                    <p class="uppercase text-xs font-semibold tracking-wide text-muted">{{ __('invoices.issued_to') }}</p>
                    <p class="mt-1 text-base">{{ $invoice->user_name }}</p>
                    @foreach($invoice->user_properties as $property)
                    <p class="text-base">{{ $property }}</p>
                    @endforeach
                </div>
                <div class="mt-4 sm:mt-0 text-right">
                    <p class="uppercase text-xs font-semibold tracking-wide text-muted">{{ __('invoices.bill_to') }}</p>
                    <p class="mt-1 text-base">{!! nl2br(e($invoice->bill_to)) !!}</p>
                </div>
            </div>
            <div class="sm:flex justify-between pr-4 pt-4 mt-6">
                <div class="">
                    <p class="text-base text-muted">{{ !$invoice->number && config('settings.invoice_proforma', false) ?
                    __('invoices.proforma_invoice_date') : __('invoices.invoice_date') }}: {{
                    $invoice->created_at->format('d M Y') }}</p>
                    @if($invoice->due_at)
                    <p class="text-base text-muted">{{ __('invoices.due_date') }}: {{ $invoice->due_at->format('d M Y') }}</p>
                    @endif
                    @if($invoice->number)
                    <p class="text-base text-muted">{{ __('invoices.invoice_no')}}: {{ $invoice->number }}</p>
                    @endif
                </div>
                <div class="max-w-[300px] w-full">
                    @if ($invoice->status == 'paid')
                    <div class="mt-6 flex justify-center sm:justify-end">
                        <span class="badge badge-success !text-sm !px-4 !py-1.5">
                            {{ __('invoices.paid') }}
                        </span>
                    </div>
                    @elseif ($invoice->status == 'pending')
                    @if($checkPayment || $invoice->transactions->where('status', \App\Enums\InvoiceTransactionStatus::Processing)->where('created_at', '>=', now()->subDays(1))->count() > 0)
                    <div class="mb-6 flex justify-center sm:justify-end">
                        <span class="badge badge-warning !text-sm !px-4 !py-1.5">
                            {{ __('invoices.payment_processing') }}
                            <x-ri-loader-5-fill aria-hidden="true" class="size-4 animate-spin" />
                        </span>
                    </div>
                    @else
                    <div class="mb-6 flex justify-center sm:justify-end">
                        @if($invoice->transactions->where('status', \App\Enums\InvoiceTransactionStatus::Processing)->count() > 0)
                        <div class="text-right">
                            <span class="badge badge-warning !text-sm !px-4 !py-1.5">{{ __('invoices.payment_processing') }}</span>
                            <p class="text-sm text-muted mt-1">{{ __('invoices.duplicate_payment') }}</p>
                        </div>
                        @else
                        <span class="badge badge-warning !text-sm !px-4 !py-1.5">{{ __('invoices.payment_pending') }}</span>
                        @endif
                    </div>
                    <div class="flex justify-center sm:justify-end">
                        <x-button.primary wire:click="$set('showPayModal', true)" class="mt-2 !w-auto px-8" wire:loading.attr="disabled"
                            wire:target="$set('showPayModal')">
                            <span wire:loading wire:target="pay">Processing...</span>
                            <span wire:loading.remove wire:target="pay">Pay</span>
                        </x-button.primary>
                    </div>
                    @endif
                    @endif
                </div>
            </div>

            <div class="mt-12 overflow-x-auto">
                <table class="table-premium">
                    <thead>
                        <tr>
                            <th scope="col">{{ __('invoices.item') }}</th>
                            <th scope="col">{{ __('invoices.price') }}</th>
                            <th scope="col">{{ __('invoices.quantity') }}</th>
                            <th scope="col">{{ __('invoices.total') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($invoice->items as $item)
                        <tr>
                            <td class="font-normal whitespace-nowrap">
                                @if(in_array($item->reference_type, ['App\Models\Service', 'App\Models\ServiceUpgrade']))
                                <a href="{{ route('services.show', $item->reference_type == 'App\Models\Service' ? $item->reference_id : $item->reference->service_id) }}"
                                    class="hover:text-primary hover:underline underline-offset-2 transition-colors">{{ $item->description }}
                                </a>
                                @else
                                {{ $item->description }}
                                @endif

                                @if($item->reference && $item->reference->label)
                                    <br><small class="text-muted text-xs">{{ $item->reference->label }}</small>
                                @endif
                            </td>
                            <td class="font-normal whitespace-nowrap text-base">{{ $item->formattedPrice }}
                            </td>
                            <td class="font-normal whitespace-nowrap">{{ $item->quantity }}</td>
                            <td class="whitespace-nowrap font-semibold">{{ $item->formattedTotal }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="space-y-3 sm:text-right sm:ml-auto sm:w-72 mt-10">
                @if ($invoice->formattedTotal->tax > 0)
                <div class="flex justify-between">
                    <div class="text-xs font-semibold uppercase tracking-wide text-muted">{{ __('invoices.subtotal') }}
                    </div>
                    <div class="text-base font-medium text-base">
                        {{ $invoice->formattedTotal->format($invoice->formattedTotal->subtotal) }}
                    </div>
                </div>
                <div class="flex justify-between">
                    <div class="text-xs font-semibold uppercase tracking-wide text-muted">
                        {{ $invoice->tax->name }} ({{ $invoice->tax->rate }}%)
                    </div>
                    <div class="text-base font-medium text-base">
                        {{ $invoice->formattedTotal->formatted->tax }}
                    </div>
                </div>
                @endif
                <x-divider-ornament class="!my-2" />
                <div class="flex justify-between items-center">
                    <div class="text-base font-display font-semibold uppercase tracking-wide text-base">Total</div>
                    <div class="text-2xl font-display font-bold text-gradient-brand">
                        {{ $invoice->formattedTotal }}
                    </div>
                </div>
            </div>

            @if ($invoice->transactions->isNotEmpty())
            <div class="mt-12">
                <h2 class="text-2xl font-display font-semibold">{{ __('invoices.transactions') }}</h2>
                <div class="mt-4 overflow-x-auto">
                    <table class="table-premium">
                        <thead>
                            <tr>
                                <th scope="col">{{ __('invoices.date') }}</th>
                                <th scope="col">{{ __('invoices.transaction_id') }}</th>
                                <th scope="col">{{ __('invoices.gateway') }}</th>
                                <th scope="col">{{ __('invoices.amount') }}</th>
                                <th scope="col">{{ __('invoices.status') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($invoice->transactions->sortByDesc('created_at') as $transaction)
                            <tr>
                                <td class="font-normal whitespace-nowrap">
                                    {{ $transaction->created_at->format('d M Y H:i') }}
                                </td>
                                <td class="font-normal whitespace-nowrap">{{ $transaction->transaction_id }}
                                </td>
                                <td class="font-normal whitespace-nowrap">
                                    @if($transaction->is_credit_transaction)
                                    {{ __('invoices.paid_with_credits') }}
                                    @else
                                    {{ $transaction->gateway?->name }}
                                    @endif
                                </td>
                                <td class="font-normal whitespace-nowrap">{{ $transaction->formattedAmount }}
                                </td>
                                <td class="whitespace-nowrap">
                                    @if($transaction->status == \App\Enums\InvoiceTransactionStatus::Succeeded)
                                    <span class="badge badge-success">{{
                                    __('invoices.transaction_statuses.succeeded') }}</span>
                                    @elseif($transaction->status == \App\Enums\InvoiceTransactionStatus::Processing)
                                    <span class="badge badge-warning">
                                        {{ __('invoices.transaction_statuses.processing') }}
                                        <x-ri-loader-5-fill aria-hidden="true"
                                            class="size-3.5 animate-spin" />
                                    </span>
                                    @elseif($transaction->status == \App\Enums\InvoiceTransactionStatus::Failed)
                                    <span class="badge badge-error">{{ __('invoices.transaction_statuses.failed')
                                    }}</span>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            @endif

        </div>

    </div>
</div>
