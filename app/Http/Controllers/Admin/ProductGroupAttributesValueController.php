<?php

namespace App\Http\Controllers\Admin;

use App\Model\AttributesDirectoryValue;
use App\Model\ProductGroupAttributes;
use App\Model\ProductGroupAttributesValue;
use Session;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductGroupAttributesValueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $groupsValue = ProductGroupAttributesValue::with([
            'productGroupAttributes',
            'attributesDirectoryValue'
        ])->orderBy('product_group_attributes_id')->get();

        $productGroupAttributes = ProductGroupAttributes::pluck('name', 'id');

        $attributesDirectoryValue = AttributesDirectoryValue::pluck('name', 'id');

        return view('admin.attributes.product-group-attributes-value.index',
            compact([
                'groupsValue',
                'productGroupAttributes',
                'attributesDirectoryValue'
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
        ProductGroupAttributesValue::create($request->all());

        Session::flash('message', 'Значение атрибута добавленно');

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
        //
    }
}
