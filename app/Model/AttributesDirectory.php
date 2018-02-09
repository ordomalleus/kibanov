<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class AttributesDirectory extends Model
{
    /**
     * Поля таблиц разрешенные для массового присваивания
     * @var array
     */
    protected $fillable = [
        'name'
    ];

    /**
     * Динамическое свойство модели
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function attributesDirectoryValues()
    {
        return $this->hasMany(AttributesDirectoryValue::class, 'attributes_directories_id');
    }
}
