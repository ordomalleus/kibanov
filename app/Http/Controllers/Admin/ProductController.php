<?php

namespace App\Http\Controllers\Admin;

use App\Model\Category;
use App\Model\Product;
use App\Model\ProductGroupAttributes;
use App\Model\ProductAttributes;
use Session;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();

        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('name', 'id');

        return view('admin.product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $formInput = $request->except('img_name');

        // Валидатор
        $this->validate($request, [
            'name' => 'required',
            'price' => 'required',
            'category_id' => 'required',
            'img_name' => 'image|mimes:png,jpg,jpeg'
        ]);

        // Загрузка изображения
        // TODO: подумать над мульти картинками и месте хранения
        $image = $request->img_name;
        if ($image) {
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move('products/images', $imageName);
            $formInput['img_name'] = $imageName;
        }

        Product::create($formInput);

        Session::flash('message', 'Продукт сохранен');

        return redirect()->route('admin.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id)->loadMissing(
            'attributes.productGroupAttributes.productGroupAttributesValue.attributesDirectoryValue',
            'attributes.productGroupAttributes.attributesDirectory'
        );

        $productGroupAttributes = ProductGroupAttributes::all();

        $categories = Category::pluck('name', 'id');

        return view('admin.product.show', compact(['product', 'categories', 'productGroupAttributes']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Привязывает атрибут к товару
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function addAttribute(Request $request, $id)
    {

        $formInput = $request->all();
        $formInput['product_id'] = $id;

        ProductAttributes::create($formInput);

        Session::flash('message', 'Атрибут добавлен');

        return redirect()->back();
    }

    /**
     * Удаляет атрибут у товара
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteAttribute($id)
    {
        ProductAttributes::find($id)->delete();

        Session::flash('message', 'Атрибут удален');

        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $formInput = $request->except('img_name');

        // Валидатор
        $this->validate($request, [
            'name' => 'required',
            'price' => 'required',
            'category_id' => 'required',
//            'img_name' => 'image|mimes:png,jpg,jpeg'
        ]);

        // Загрузка изображения
        // TODO: подумать над мульти картинками и месте хранения. Передалть на Storage
        $image = $request->img_name;
        if ($image) {
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move('products/images', $imageName);
            $formInput['img_name'] = $imageName;
            // удалим старый файл
            unlink(public_path('products/images/' . $product->img_name));

        }

        $product->update($formInput);

        Session::flash('message', 'Продукт сохранен');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
