<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Order
 * @package App\Entities
 * @property integer $id
 * @property integer $status
 * @property string $client_email
 * @property integer $partner_id
 * @property Partner $partner
 * @property Collection $orderProducts
 */
class Order extends Model
{
    const STATUS_NEW = 0;
    const STATUS_CONFIRMED = 10;
    const STATUS_COMPLETED = 20;

    public function getPartnerNameAttribute($value)
    {
        if ($this->partner instanceof Partner) {
            return $this->partner->name;
        }

        return '';
    }

    public function getStatusNameAttribute($value)
    {
        $statuses = [
            self::STATUS_NEW => 'новый',
            self::STATUS_CONFIRMED => 'подтвержден',
            self::STATUS_COMPLETED => 'завершен',
        ];

        return $statuses[$this->status];
    }

    public function amount()
    {
        if (count($this->orderProducts)) {
            return $this->orderProducts->sum(function (OrderProduct $order) {
                return $order->quantity * $order->price;
            });
        }

        return 0;
    }


    public function partner()
    {
        return $this->belongsTo(Partner::class, 'partner_id', 'id');
    }

    public function orderProducts()
    {
        return $this->hasMany(OrderProduct::class, 'order_id', 'id');
    }
}
