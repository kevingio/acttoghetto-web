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
        'sku',
        'name',
        'price',
        'size_id',
        'qty',
        'description',
    ];

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

    /**
     * Relation to Product Image
     *
     */
    public function images()
    {
        return $this->hasMany('App\Models\ProductImage');
    }

    /**
     * Get Product Size ID
     * @param integer $productId
     * @param string $size
     * @return integer
     */
    public function getSizeId($productId, $size)
    {
        $product = $this->with('category.sizes')->find($productId);
        foreach ($product->category->sizes as $key => $value) {
            if($value->text == $size) {
                return $value->id;
            }
        }
    }
}
