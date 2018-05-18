<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ProductGroupAttributes extends Model
{
    /**
     * Поля таблиц разрешенные для массового присваивания
     * @var array
     */
    protected $fillable = [
        'name', 'title', 'type'
    ];

    /**
     * Динамическое свойство модели
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function productGroupAttributesValue()
    {
        return $this->hasMany(ProductGroupAttributesValue::class, 'product_group_attributes_id');
    }

}
