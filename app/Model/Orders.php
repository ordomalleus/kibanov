<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    /**
     * Поля таблиц разрешенные для массового присваивания
     * @var array
     */
    protected $fillable = [
        'orders_info_id', 'orders_products_id', 'delivery', 'order_status_id', 'unique_id'
    ];
}
