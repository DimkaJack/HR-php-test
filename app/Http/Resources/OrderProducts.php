<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class OrderProducts extends Resource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'name' => $this->productName,
            'vendor_name' => $this->vendorName,
            'quantity' => $this->quantity,
            'price' => $this->price,
        ];
    }
}
