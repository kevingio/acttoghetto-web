<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'product_id',
        'transaction_id',
        'price',
        'qty',
        'size_id',
        'note',
    ];

    /**
     * Relation to Size
     *
     */
    public function size()
    {
        return $this->belongsTo('App\Models\Size');
    }

    /**
     * Relation to Size
     *
     */
    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }
}
