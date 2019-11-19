<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class Orders extends Resource
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
            'id' => $this->id,
            'partner' => $this->partnerName,
            'amount' => $this->amount(),
            'order_info' => OrderProducts::collection($this->orderProducts),
            'status' => $this->statusName,
        ];
    }
}
