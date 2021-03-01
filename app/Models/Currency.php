<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'currencies';

    protected $fillable = [
        'AUD',
        'GBP',
        'BYN',
        'DKK',
        'USD',
        'EUR',
        'CAD',
        'CNY',
        'UAH',
        'CZK',
    ];
}
