<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ProductAttributes extends Model
{
    /**
     * Поля таблиц разрешенные для массового присваивания
     * @var array
     */
    protected $fillable = [
        'product_id', 'product_group_attributes_id'
    ];

    /**
     * Динамическое свойство модели
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function productGroupAttributes()
    {
        return $this->belongsTo(ProductGroupAttributes::class);
    }
}
