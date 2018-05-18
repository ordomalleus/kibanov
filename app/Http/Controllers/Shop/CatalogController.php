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

    public function index($id = null)
    {
        // первичный тайтл
        $title = null;

        if ($id) {
            // получаем товары по 20штук
            $products = Product::where('show', '=', 1)->where('category_id', '=', $id)->paginate(20);
            // установим тайтл
            $title = Category::find($id);
        } else {
            // получаем товары по 20штук
            $products = Product::where('show', '=', 1)->paginate(20);
        }
        // догружаем у товаров все связанные свойства
        $products->load(
            'attributes.productGroupAttributes.productGroupAttributesValue.attributesDirectoryValue'
        );

        // получаем карзину
        // Метод flatten() преобразует многомерную коллекцию в одномерную:
        $cart = Cart::content()->flatten();

        // получаем категории с вложенными детьми 1 уровня
        // TODO: узнать нужно ли делать рекурсию для детей (если вложеность будет более чем 1 уровня)
        $categories = Category::where('parent_id', '=', null)->orderBy('priority')->get();
        $categories->transform(function ($item) {
            $child = Category::where('parent_id', '=', $item->id)->orderBy('priority')->get();
            $item->child = $child->count() > 0 ? $child : null;
            return $item;
        });

        return view('kibanov/catalog', compact(['products', 'cart', 'categories', 'title']));
    }
}