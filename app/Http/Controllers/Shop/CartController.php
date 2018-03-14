<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Gloudemans\Shoppingcart\Facades\Cart;
use App\Model\Product;

class CartController extends Controller
{
    public function __construct()
    {

    }

    public function index()
    {

    }

    /**
     * Добавление товара в карзину
     * @param Request $request
     * @return mixed
     */
    public function addCart(Request $request)
    {
        $frontProduct = $request->all();

        $product = Product::find($frontProduct['id']);

        // формируем еденичнй заказ
        $response = Cart::add(
            $product->id,
            $product->name,
            $frontProduct['amount'],
            $frontProduct['priceOne'],
            [
                'selectAttributes' => $frontProduct['selectAttributes'],
                'product' => $frontProduct['product']
            ]);

        return $response;
    }

    /**
     * Изменение колличества товаров в карзине в плюс
     * @param Request $request
     * @return mixed
     */
    public function productCartPlus(Request $request)
    {
        $frontRequest = $request->all();

        Cart::update($frontRequest['rowId'], $frontRequest['qty'] + 1);

        return Cart::content()->flatten();
    }

    /**
     * Изменение колличества товаров в карзине в минус
     * @param Request $request
     * @return mixed
     */
    public function productCartMinus(Request $request)
    {
        $frontRequest = $request->all();

        Cart::update($frontRequest['rowId'], $frontRequest['qty'] - 1);

        return Cart::content()->flatten();
    }

    /**
     * Удаление товара из карзины
     * @param Request $request
     * @return mixed
     */
    public function productCartDelete(Request $request)
    {
        $frontRequest = $request->all();

        Cart::remove($frontRequest['rowId']);

        return Cart::content()->flatten();
    }
}