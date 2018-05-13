<?php

namespace App\Http\Controllers\Admin;

use App\Model\AttributesDirectory;
use App\Model\ProductGroupAttributes;
use App\Model\ProductGroupAttributesValue;
use App\Model\ProductAttributes;
use Session;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductGroupAttributesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groups = ProductGroupAttributes::with('attributesDirectory')->get();

        $attributesDirectories = AttributesDirectory::pluck('name', 'id');

        // TODO: вынести в таблицы
        // Тип значения атрибута
        $type = [
            'Цвет' => 'Цвет', 'Цвет списком' => 'Цвет списком', 'Размер одежды' => 'Размер одежды',
            'Размер одежды списком' => 'Размер одежды списком', 'Размер обуви' => 'Размер обуви', 'Полнота' => 'Полнота',
            'Жесткость' => 'Жесткость'
        ];

        return view('admin.attributes.product-group-attributes.index',
            compact([
                'groups',
                'attributesDirectories',
                'type'
            ]));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        ProductGroupAttributes::create($request->all());

        Session::flash('message', 'Атрибут товаров добавлен');

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $attribute = ProductGroupAttributes::find($id);

        // ищем значения атрибутов и удаляем их
        ProductGroupAttributesValue::where('product_group_attributes_id', $id)->delete();

        // находим привязанные к товару группу атрибутов и удаляем их
        ProductAttributes::where('product_group_attributes_id', $id)->delete();

        // удаляем атрибут товара
        $attribute->delete();

        Session::flash('message', 'Атрибут товара удален. 
        Удалены все "значения атрибутоа товара" связанные с этим Атрибутом товара.
        Удалены во всех товарах соответствующий атрибут товара.');

        return redirect()->back();
    }
}
