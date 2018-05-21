<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * Поля таблиц разрешенные для массового присваивания
     * @var array
     */
    protected $fillable = [
        'name', 'description', 'category_id', 'price', 'img_name', 'show', 'brand'
    ];

    /**
     * Динамическое свойство модели
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function categories()
    {
        return $this->belongsTo(Category::class);
    }

    public function attributes() {
        return $this->hasMany(ProductAttributes::class);
    }

    public function productImages()
    {
        return $this->hasMany(ProductImages::class);
    }
}
