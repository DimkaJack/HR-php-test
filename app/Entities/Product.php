<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Product
 * @package App\Entities
 * @property integer $id
 * @property string $name
 * @property integer $price
 * @property integer $vendor_id
 * @property Vendor $vendor
 */
class Product extends Model
{
    public function vendor()
    {
        return $this->belongsTo(Vendor::class, 'vendor_id', 'id');
    }
}
