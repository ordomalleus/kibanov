<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;

use App\Model\Product;
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

        //===============================================================================================
        // Порядок в шаблоне
        // [1 - 750, 2 - 770, 3 - 857, 4 - 874, 5 - 756, 6 - 747, 7 - 740, 8 - 889, 9 - 758, 10 - 890, 11 - 880, 12 - 552, 13 - 647]
        // Порядок в массиве
        // [1-4, 2-7, 3-8, 4-9, 5-5, 6-3, 7-2, 8-11, 9-6, 10-12, 11-10, 12-0, 13-1]
        // Получаем товары для главной страницы
        // TODO: Пока захардкожанные id
        $products = Product::find([552, 647, 740, 747, 750, 756, 758, 770, 857, 874, 880, 889, 890]);
        // догружаем у товаров все связанные свойства
        $products->load(
            'attributes.productGroupAttributes.productGroupAttributesValue.attributesDirectoryValue',
            'productImages'
        );
        //===============================================================================================

        return view('kibanov/general', compact(['cart', 'products']));
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
