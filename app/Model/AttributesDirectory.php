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
}
