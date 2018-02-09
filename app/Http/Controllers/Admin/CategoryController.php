<?php

namespace App\Http\Controllers\Admin;

use App\Model\AttributesDirectory;
use App\Model\AttributesDirectoryValue;
use App\Model\Category;
use App\Model\Product;
use Session;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();

        return view('admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
//        $categories = Category::pluck('name', 'id');
//
//        return view('admin.category.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $formInput = $request->except('parent_id');

        // Если значение не строковый 'null' то добавим
        // TODO: переделать на более понятное (смущает строковый null)
        if($request->parent_id !== 'null') {
            $formInput['parent_id'] = $request->parent_id;
        }

        Category::create($formInput);

        Session::flash('message', 'Категория добавлена');

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
        $categories = Category::all();

        $products = Category::find($id)->products;

        // TODO: удалить
//        $foo = AttributesDirectory::find(1)->attributesDirectoryValues;
//        $foo = AttributesDirectoryValue::find(2)->attributesDirectory;

//        return view('admin.category.index', compact(['categories', 'products', 'foo']));
        return view('admin.category.index', compact(['categories', 'products']));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
