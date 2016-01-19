<?php

namespace App\Providers;

use Illuminate\Contracts\Events\Dispatcher as DispatcherContract;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'App\Events\Stripe\AccountUpdated' => [],
        'App\Events\Stripe\AccountApplicationDeauthorized' => [],
        'App\Events\Stripe\AccountExternalAccountCreated' => [],
        'App\Events\Stripe\AccountExternalAccountDeleted' => [],
        'App\Events\Stripe\AccountExternalAccountUpdated' => [],
        'App\Events\Stripe\ApplicationFeeCreated' => [],
        'App\Events\Stripe\ApplicationFeeRefunded' => [],
        'App\Events\Stripe\ApplicationFeeRefundUpdated' => [],
        'App\Events\Stripe\BalanceAvailable' => [],
        'App\Events\Stripe\BitcoinReceiverCreated' => [],
        'App\Events\Stripe\BitcoinReceiverFilled' => [],
        'App\Events\Stripe\BitcoinReceiverUpdated' => [],
        'App\Events\Stripe\BitcoinReceiverTransactionCreated' => [],
        'App\Events\Stripe\ChargeCaptured' => [],
        'App\Events\Stripe\ChargeFailed' => [],
        'App\Events\Stripe\ChargeRefunded' => [],
        'App\Events\Stripe\ChargeSucceeded' => [],
        'App\Events\Stripe\ChargeUpdated' => [],
        'App\Events\Stripe\ChargeDisputeClosed' => [],
        'App\Events\Stripe\ChargeDisputeCreated' => [],
        'App\Events\Stripe\ChargeDisputeFundsReinstated' => [],
        'App\Events\Stripe\ChargeDisputeFundsWithdrawn' => [],
        'App\Events\Stripe\ChargeDisputeUpdated' => [],
        'App\Events\Stripe\CouponCreated' => [],
        'App\Events\Stripe\CouponDeleted' => [],
        'App\Events\Stripe\CouponUpdated' => [],
        'App\Events\Stripe\CustomerCreated' => [],
        'App\Events\Stripe\CustomerDeleted' => [],
        'App\Events\Stripe\CustomerUpdated' => [],
        'App\Events\Stripe\CustomerDiscountCreated' => [],
        'App\Events\Stripe\CustomerDiscountDeleted' => [],
        'App\Events\Stripe\CustomerDiscountUpdated' => [],
        'App\Events\Stripe\CustomerSourceCreated' => [],
        'App\Events\Stripe\CustomerSourceDeleted' => [],
        'App\Events\Stripe\CustomerSourceUpdated' => [],
        'App\Events\Stripe\CustomerSubscriptionCreated' => [],
        'App\Events\Stripe\CustomerSubscriptionDeleted' => [],
        'App\Events\Stripe\CustomerSubscriptionTrialWillEnd' => [],
        'App\Events\Stripe\CustomerSubscriptionUpdated' => [],
        'App\Events\Stripe\InvoiceCreated' => [],
        'App\Events\Stripe\InvoicePaymentFailed' => [],
        'App\Events\Stripe\InvoicePaymentSucceeded' => [],
        'App\Events\Stripe\InvoiceUpdated' => [],
        'App\Events\Stripe\InvoiceitemCreated' => [],
        'App\Events\Stripe\InvoiceitemDeleted' => [],
        'App\Events\Stripe\InvoiceitemUpdated' => [],
        'App\Events\Stripe\OrderCreated' => [],
        'App\Events\Stripe\OrderPaymentFailed' => [],
        'App\Events\Stripe\OrderPaymentSucceeded' => [],
        'App\Events\Stripe\OrderUpdated' => [],
        'App\Events\Stripe\PlanCreated' => [],
        'App\Events\Stripe\PlanDeleted' => [],
        'App\Events\Stripe\PlanUpdated' => [],
        'App\Events\Stripe\ProductCreated' => [],
        'App\Events\Stripe\ProductUpdated' => [],
        'App\Events\Stripe\RecipientCreated' => [],
        'App\Events\Stripe\RecipientDeleted' => [],
        'App\Events\Stripe\RecipientUpdated' => [],
        'App\Events\Stripe\SkuCreated' => [],
        'App\Events\Stripe\SkuUpdated' => [],
        'App\Events\Stripe\TransferCreated' => [],
        'App\Events\Stripe\TransferFailed' => [],
        'App\Events\Stripe\TransferPaid' => [],
        'App\Events\Stripe\TransferReversed' => [],
        'App\Events\Stripe\TransferUpdated' => [],
        'App\Events\Stripe\Ping' => [],
    ];

    /**
     * Register any other events for your application.
     *
     * @param  \Illuminate\Contracts\Events\Dispatcher  $events
     * @return void
     */
    public function boot(DispatcherContract $events)
    {
        parent::boot($events);

        //
    }
}
