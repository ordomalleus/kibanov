<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;

use Gloudemans\Shoppingcart\Facades\Cart;

class GeneralController extends Controller
{
    public function __construct()
    {

    }

    public function index()
    {
        // получаем карзину
        // Метод flatten() преобразует многомерную коллекцию в одномерную:
        $cart = Cart::content()->flatten();

        return view('kibanov/general', compact(['cart']));
    }

    public function about()
    {
        // получаем карзину
        $cart = Cart::content()->flatten();

        return view('kibanov/about', compact(['cart']));
    }

    public function shops()
    {
        // получаем карзину
        $cart = Cart::content()->flatten();

        return view('kibanov/shops', compact(['cart']));
    }
}
