<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use Gloudemans\Shoppingcart\Facades\Cart;
use App\Model\Orders;

class OrdersController extends Controller
{
    public function __construct()
    {

    }

    /**
     * Добавление заказа
     * @param Request $request
     * @return mixed
     */
    public function addOrder(Request $request)
    {
        // данные формы с клиента
        $frontOrder = $request->all();

        // текущая карзина
        $cart = Cart::content()->flatten()->map(function ($item) {
            $item->options['product'] = ['img_name' => $item->options['product']['img_name']];

            return $item;
        });

        // формируем массив заказа
        $order = [
            'orders_info_id' => json_encode($frontOrder['ordersInfoId']),
            'orders_products_id' => $cart->toJson(),
            'delivery' => $frontOrder['delivery'],
            'order_status_id' => null,
            'unique_id' => Hash::make($frontOrder['ordersInfoId']['fio'] . '_' . time())
        ];

        // создаем заказ
        $orderBd = Orders::create($order);

        return response([
            'id' => $orderBd->id,
            'unique_id' => $orderBd->unique_id
        ]);
    }
}