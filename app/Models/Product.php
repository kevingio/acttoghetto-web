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
        'sku',
        'name',
        'price',
        'size_id',
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
     * Relation to Category
     *
     */
    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    /**
     * Relation to Size
     *
     */
    public function size()
    {
        return $this->belongsTo('App\Models\Size');
    }
}
