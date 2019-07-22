<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Mail\OrderMail;
use App\Model\OrderStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use Gloudemans\Shoppingcart\Facades\Cart;
use App\Model\Orders;
use Illuminate\Support\Facades\Mail;

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
            'order_status_id' => 1,
            'unique_id' => Hash::make($frontOrder['ordersInfoId']['fio'] . '_' . time())
        ];

        // создаем заказ
        $orderBd = Orders::create($order);

        //Отправляем письмо
        try {
            Mail::to($frontOrder['ordersInfoId']['mail'])->send(new OrderMail($orderBd));
        } catch (\Exception $e) {
        }

        return response([
            'id' => $orderBd->id,
            'unique_id' => $orderBd->unique_id
        ]);
    }

    /**
     * Просмотр юзером свой заказ
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showUserStatusOrder(Request $request)
    {
        $uniqueId = $request->unique_id;

        $orderCollections = Orders::where('unique_id', $uniqueId)->get();

        $status = OrderStatus::pluck('title', 'id');

        // Если ничего не нашли то 404 страница
        if (count($orderCollections) === 0) {
            return view('errors.404');
        }

        // Получим 0 элемент (он там должен быть 1)
        $order = $orderCollections[0];

        return view('kibanov.orders.show', compact(['order', 'status']));
    }

    /**
     * TODO: для тестинга
     * @param $uniqueId
     * @return string
     */
    public function sendMailOrder($uniqueId)
    {
        $orderCollections = Orders::where('unique_id', $uniqueId)->get();
        $order = $orderCollections[0];
        Mail::to('demidov_dv@proitr.ru')->send(new OrderMail($order));

        return 'lol';
    }

    /**
     * TODO: для тестинга
     * @param $uniqueId
     * @return OrderMail
     */
    public function showMailOrder($uniqueId)
    {
        $orderCollections = Orders::where('unique_id', $uniqueId)->get();
        $order = $orderCollections[0];

        return new OrderMail($order);
    }
}
