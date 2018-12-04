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
        // Получаем товары для главной страницы
        // TODO: Пока захардкожанные id
        $products = Product::find([770, 855]);
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
