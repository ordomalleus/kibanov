<?php

namespace App\Http\Controllers\Admin;

use App\Model\Category;
use App\Model\Product;
use App\Model\ProductImages;
use App\Model\ProductGroupAttributes;
use App\Model\ProductAttributes;
use Session;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\ImageManagerStatic as Image;

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

            // сохраняем оригинал
            $image->move('products/images', $imageName);

            // Копируем и меням под 120x120
            copy(public_path() . '/products/images/' . $imageName,
                public_path() . '/products/images/120x120/' . $imageName);
            Image::make(public_path() . '/products/images/120x120/' . $imageName)->fit(120, 120)->save();

            // Копируем и меням под 400x400
            copy(public_path() . '/products/images/' . $imageName,
                public_path() . '/products/images/400x400/' . $imageName);
            Image::make(public_path() . '/products/images/400x400/' . $imageName)->fit(400, 400)->save();

            // Копируем и меням под _x400 (макс длина 600px высота автоматом)
            copy(public_path() . '/products/images/' . $imageName,
                public_path() . '/products/images/_x400/' . $imageName);
            Image::make(public_path() . '/products/images/_x400/' . $imageName)
                ->resize(600, null, function ($constraint) {
                    $constraint->aspectRatio();
                })->save();

            $formInput['img_name'] = $imageName;
        }

        Product::create($formInput);

        Session::flash('message', 'Продукт сохранен');

        return redirect()->back();
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
            'productImages'
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
     * Удаляет дополнительную картинку
     * @param $id - дополнительной картинки
     * @return $this|\Illuminate\Http\JsonResponse
     */
    public function deleteImage($id)
    {
        try {

            $product = ProductImages::find($id);

            unlink(public_path('products/images/_x400/' . $product->img_name));

            ProductImages::destroy($id);

            return response()->json('ok');

        } catch (\Exception $e) {
            // TODO: что то сделать
            return response()->setStatusCode(500);
        }
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
        $formInput = $request->except('img_name', 'product_images');

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
            // сохраняем оригинальное изображение
            $image->move('products/images', $imageName);

            // Копируем и меням под 120x120
            copy(public_path() . '/products/images/' . $imageName,
                public_path() . '/products/images/120x120/' . $imageName);
            Image::make(public_path() . '/products/images/120x120/' . $imageName)->fit(120, 120)->save();
            // Копируем и меням под 400x400
            copy(public_path() . '/products/images/' . $imageName,
                public_path() . '/products/images/400x400/' . $imageName);
            Image::make(public_path() . '/products/images/400x400/' . $imageName)->fit(400, 400)->save();
            // Копируем и меням под _x400 (макс длина 600px высота автоматом)
            copy(public_path() . '/products/images/' . $imageName,
                public_path() . '/products/images/_x400/' . $imageName);
            Image::make(public_path() . '/products/images/_x400/' . $imageName)
                ->resize(600, null, function ($constraint) {
                    $constraint->aspectRatio();
                })->save();

            try {
                // удалим старые файлы
                unlink(public_path('products/images/' . $product->img_name));
                unlink(public_path('products/images/120x120/' . $product->img_name));
                unlink(public_path('products/images/400x400/' . $product->img_name));
                unlink(public_path('products/images/_x400/' . $product->img_name));
            } catch (\Exception $e) {
                // TODO: как то обработать или нет
            }

            $formInput['img_name'] = $imageName;
        }

        // Если есть доп картинки то загрузим их в _x400 и создадим модели
        if ($request->product_images && count($request->product_images) > 0) {
            $productImages = $request->product_images;

            // Сохраним имена файлов для создания моделей
            $productImagesNames = [];

            foreach ($productImages as $productImage) {
                $imageName = time() . '_' . $productImage->getClientOriginalName();
                $productImagesNames[] = $imageName;

                // Сохраняем файл
                $productImage->move('products/images/_x400', $imageName);
                // Форматируем картинку
                Image::make(public_path() . '/products/images/_x400/' . $imageName)
                    ->resize(600, null, function ($constraint) {
                        $constraint->aspectRatio();
                    })->save();
            }

            // Создаем модели
            foreach ($productImagesNames as $productImagesName) {
                ProductImages::create([
                    'product_id' => $id,
                    'img_name' => $productImagesName
                ]);
            }
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
