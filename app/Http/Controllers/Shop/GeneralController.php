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
        // [1 - 750, 2 - 770, 3 - 857, 4 - 874, 5 - 756, 6 - 747, 7 - 740, 8 - 889, 9 - 758, 10 - null, 11 - 880, 12 - 552, 13 - 873]
        // Порядок в массиве
        // [1-3, 2-6, 3-7, 4-9, 5-4, 6-2, 7-1, 8-11, 9-5, 10-null, 11-10, 12-0, 13-8]
        // Получаем товары для главной страницы
        // TODO: Пока захардкожанные id
        $products = Product::find([552, 740, 747, 750, 756, 758, 770, 857, 873, 874, 880, 889]);
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
