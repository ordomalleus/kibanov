<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ProductGroupAttributesValue extends Model
{
    /**
     * Поля таблиц разрешенные для массового присваивания
     * @var array
     */
    protected $fillable = [
        'product_group_attributes_id', 'attributes_directory_values_id', 'price'
    ];

    /**
     * Динамическое свойство модели
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function productGroupAttributes()
    {
        return $this->belongsTo(ProductGroupAttributes::class, 'product_group_attributes_id');
    }

    /**
     * Динамическое свойство модели
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function attributesDirectoryValue()
    {
        return $this->belongsTo(AttributesDirectoryValue::class, 'attributes_directory_values_id');
    }
}
