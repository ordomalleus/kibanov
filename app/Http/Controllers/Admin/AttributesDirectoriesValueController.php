<?php

namespace App\Http\Controllers\Admin;

use App\Model\AttributesDirectoryValue;
use App\Model\ProductGroupAttributesValue;
use Session;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AttributesDirectoriesValueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $attributes = AttributesDirectoryValue::orderBy('type', 'desc')->get();

        // TODO: вынести в таблицы
        // Тип значения атрибута
        $type = [
            'Цвет' => 'Цвет', 'Размер' => 'Размер', 'Полнота' => 'Полнота',
        ];

        return view('admin.attributes.attributes-directories-value.index', compact(['attributes', 'type']));
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        AttributesDirectoryValue::create($request->all());

        Session::flash('message', 'Значение атрибута добавлено в справочник');

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $attribute = AttributesDirectoryValue::find($id);
        $formInput = $request->all();

        $attribute->update($formInput);

        Session::flash('message', 'Значения атрибута справочника изменено');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $attribute = AttributesDirectoryValue::find($id);
        $ProductGroupAttributesValue = ProductGroupAttributesValue::where('attributes_directory_values_id', $id)->delete();


        $attribute->delete();

        Session::flash('message', 'Значение справочника атрибута удаленно. 
        Удалены все "значения атрибутов товаров" связанные с этим справочником');

        return back();
    }
}
