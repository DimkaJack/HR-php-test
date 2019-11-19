<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Vendor
 * @package App\Entities
 * @property integer $id
 * @property string $email
 * @property string $name
 * @property Collection $products
 */
class Vendor extends Model
{
    public function products()
    {
        return $this->hasMany(Product::class, 'vendor_id', 'id');
    }
}
