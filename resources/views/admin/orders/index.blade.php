@extends('admin.layout')

@section('style')
@endsection

@section('content')
    <h3>Список Заказов</h3>

    <table class="table table-bordered">
        <thead>
        <tr>
            <th>
                <a href="{{url('admin/orders') . '?orderBy=id&' . (request()->input('asc') == 'asc' ? 'asc=desc' : 'asc=asc')}}">
                    № заказа
                </a>
            </th>
            <th>Имя покупателя</th>
            <th>Итого</th>
            <th>
                <a href="{{url('admin/orders') . '?orderBy=created_at&' . (request()->input('asc') == 'asc' ? 'asc=desc' : 'asc=asc')}}">
                    Дата создания
                </a>
            </th>
            <th>Действие</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($orders as $order)
            <tr>
                <td><a href="{{url('admin/orders', $order->id)}}">{{$order->id}}</a></td>
                <td>{{json_decode($order->orders_info_id)->fio}}</td>
                <td>
                    {{collect(json_decode($order->orders_products_id))->reduce(function ($carry, $item) {
                      return $carry + $item->subtotal;
                    })}} р.
                </td>
                <td>{{date($order->created_at)}}</td>
                <td>
                    <a href="{{url('admin/orders', $order->id)}}" title="Подробней" class="glyphicon glyphicon-search"></a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{$orders->appends(Request::capture()->except('page'))->render()}}
@endsection