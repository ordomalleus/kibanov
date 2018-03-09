<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;

use App\Model\Product;

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

        return view('kibanov/catalog', compact('products'));
    }
}