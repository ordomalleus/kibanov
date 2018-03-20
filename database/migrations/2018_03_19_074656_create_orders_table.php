<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            // TODO: переделать на таблицу
            $table->text('orders_info_id');
            // TODO: переделать на таблицу
            $table->text('orders_products_id');
            // Самовывоз или доставка: 0 - самовывоз, 1 - доставка
            $table->boolean('delivery');
            // TODO: переделать на таблицу
            // статус заказа
            $table->text('order_status_id')->nullable();
            // Уникальный хеш идентификатор
            $table->char('unique_id', 255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
