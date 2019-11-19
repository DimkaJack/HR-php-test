<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

/**
 * Class OrderProduct
 * @package App\Entities
 * @property integer $order_id
 * @property integer $product_id
 * @property integer $quantity
 * @property integer $price
 * @property Order $order
 * @property Product $product
 */
class OrderProduct extends Model
{
    public function getProductNameAttribute($value)
    {
        if ($this->product instanceof Product) {
            return $this->product->name;
        }

        return '';
    }
    public function getVendorNameAttribute($value)
    {
        if ($this->product instanceof Product && $this->product->vendor instanceof Vendor) {
            return $this->product->vendor->name;
        }

        return '';
    }


    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id', 'id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
