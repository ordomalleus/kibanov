<?php

namespace App\Http\Controllers\Admin;

use App\Model\AttributesDirectory;
use App\Model\ProductAttributes;
use App\Model\ProductGroupAttributes;
use App\Model\ProductGroupAttributesValue;
use Session;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AttributesDirectoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $attributes = AttributesDirectory::all();

        return view('admin.attributes.attributes-directories.index', compact('attributes'));
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

        AttributesDirectory::create($request->all());

        Session::flash('message', 'Атрибут добавлен в справочник');

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
        $attribute = AttributesDirectory::find($id);
        $formInput = $request->all();

        $attribute->update($formInput);

        Session::flash('message', 'Cправочник атрибутов изменен');

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
        $attribute = AttributesDirectory::find($id);
        // получаем массив атрибутов товаров зависящих от справочника -> AttributesDirectory::find($id)
        $ProductGroupAttributes = ProductGroupAttributes::where('attributes_directories_id', $id)->get();

        // проходим по массиву и ищем значения атрибутов и удаляем их
        foreach ($ProductGroupAttributes as $ProductGroupAttribute) {
            ProductGroupAttributesValue::where('product_group_attributes_id', $ProductGroupAttribute->id)->delete();

            // находим привязанные к товару группу атрибутов и удаляем их
            ProductAttributes::where('product_group_attributes_id', $ProductGroupAttribute->id)->delete();

            // удаляем сам атрибут товара
            $ProductGroupAttribute->delete();
        }

        // удаляем атрибут справочника
        $attribute->delete();

        Session::flash('message', 'Справочник атрибута удален. 
        Удалены все "атрибутов товаров" связанные с этим справочником и все "Значения атрибутов товаров"');

        return redirect()->back();
    }
}
