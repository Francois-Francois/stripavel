<?php

namespace App;

use App\Stripe\IsStripeEntity;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reversal extends Model
{
    use SoftDeletes, IsStripeEntity;

    protected $fillable = ['uuid', 'amount', 'balance_transaction_id', 'created', 'currency', 'metadata', 'transfer_id'];

    protected $dates = ['created', 'created_at', 'deleted_at', 'updated_at'];

    protected $stripeFileds = ['uuid', 'amount', 'balance_transaction_id', 'created', 'currency', 'metadata', 'transfer_id'];

    protected $jsonFileds = ['metadata'];

    protected $fieldsConnection = ['uuid' => 'id', 'balance_transaction_id' => 'balance_transaction', 'transfer_id' => 'transfer'];

    public function balanceTransaction()
    {
        return $this->belongsTo('App\BalanceTransaction', 'balance_transaction_id', 'uuid');
    }

    public function transfer()
    {
        return $this->belongsTo('App\Transfer', 'transfer_id', 'uuid');
    }

}
