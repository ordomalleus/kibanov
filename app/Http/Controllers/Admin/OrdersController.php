<?php

namespace App\Http\Controllers\Admin;

use App\Model\Orders;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrdersController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        if ($request->has('orderBy')) {
            $orderBy = $request->input('orderBy');
            $ask = $request->input('asc');
            $orders = Orders::where('id', '>', 0)->orderBy($orderBy, $ask === 'asc' ? 'asc' : 'desc')->paginate(5);
        } else {
            $orders = Orders::where('id', '>', 0)->orderBy('id', 'desc')->paginate(5);
        }

        return view('admin.orders.index', compact('orders'));
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
//        $formInput = $request->except('parent_id');
//
//        // Если значение не строковый 'null' то добавим
//        // TODO: переделать на более понятное (смущает строковый null)
//        if ($request->parent_id !== 'null') {
//            $formInput['parent_id'] = $request->parent_id;
//        }
//
//        Category::create($formInput);
//
//        Session::flash('message', 'Категория добавлена');

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
        $order = Orders::find($id);

        return view('admin.orders.show', compact(['order']));
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
