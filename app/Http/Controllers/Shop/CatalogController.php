<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;

use App\Model\Product;
use App\Model\Category;
use Gloudemans\Shoppingcart\Facades\Cart;

class CatalogController extends Controller
{
    public function __construct()
    {

    }

    public function index()
    {
        // получаем товары по 20штук
        $products = Product::where('show', '=', 1)->paginate(3);
        // догружаем у товаров все связанные свойства
        $products->load(
            'attributes.productGroupAttributes.productGroupAttributesValue.attributesDirectoryValue',
            'attributes.productGroupAttributes.attributesDirectory'
        );

        // получаем карзину
        // Метод flatten() преобразует многомерную коллекцию в одномерную:
        // https://laravel.ru/docs/v5/collections#%D1%81%D0%BF%D0%B8%D1%81%D0%BE%D0%BA-35
        $cart = Cart::content()->flatten();

        // получаем категории
        $categorys = Category::where('parent_id', '=', null)->get();

        return view('kibanov/catalog', compact(['products', 'cart', 'categorys']));
    }
}