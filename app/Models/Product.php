<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'category_id',
        'brand_id',
        'name',
        'price',
        'qty',
        'description',
    ];

    /**
     * Relation to Brand
     *
     */
    public function brand()
    {
        return $this->belongsTo('App\Models\Brand');
    }

    /**
     * Relation to Brand
     *
     */
    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }
}
