<?php

namespace App\Mpesa;

use Illuminate\Database\Eloquent\Model;

class Mpesa extends Model
{
    protected $fillable = [
     
    'result_code',
    'merchant_request_id',
    'checkout_request_id',
    'amount',
    'mpesa_receipt_number',
    'b2c_utility_account_available_funds',
    'transaction_date',
    'phone_number'
        ]
   
}
