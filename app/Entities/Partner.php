<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Partner
 * @package App\Entities
 * @property integer $id
 * @property string $email
 * @property string $name
 */
class Partner extends Model
{
    protected $fillable = [
        'email',
        'name'
    ];

    public function orders()
    {
        return $this->hasMany(Order::class, 'partner_id', 'id');
    }
}
