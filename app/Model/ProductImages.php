<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ProductImages extends Model
{
    /**
     * Поля таблиц разрешенные для массового присваивания
     * @var array
     */
    protected $fillable = [
        'product_id', 'img_name'
    ];
}
