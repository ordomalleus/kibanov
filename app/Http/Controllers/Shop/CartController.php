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

    public function addCart(Request $request)
    {
        $frontProduct = $request->all();

        $product = Product::find($frontProduct['id']);

        Cart::add($product->id, $product->name, $frontProduct['amount'], $frontProduct['priceOne'],[
            'price' => $frontProduct['price'],
            'selectAttributes' => $frontProduct['selectAttributes']
        ]);

//        Cart::destroy();

        return Cart::content();
    }
}