@extends('admin.layout')

@section('style')
@endsection

@section('content')
    <h3>Страница заказа #{{$order->id}}</h3>

    <div>
        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Информация заказа</a></li>
            <li role="presentation"><a href="#product" aria-controls="profile" role="tab" data-toggle="tab">Товары</a></li>
            {{--<li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Messages</a></li>--}}
            {{--<li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Settings</a></li>--}}
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="home">
                @if($order->delivery === 0)
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Название</th>
                            <th>Значение</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr><th>Ф.И.О.</th><td>{{json_decode($order->orders_info_id)->fio}}</td></tr>
                        <tr><th>Магазин доставки</th><td>{{json_decode($order->orders_info_id)->city}}</td></tr>
                        <tr><th>E-mail</th><td>{{json_decode($order->orders_info_id)->mail}}</td></tr>
                        <tr><th>Контактный телефон</th><td>{{json_decode($order->orders_info_id)->phone}}</td></tr>
                        <tr><th>Комментарий</th><td>{{json_decode($order->orders_info_id)->comment}}</td></tr>
                        </tbody>
                    </table>
                @endif
                @if($order->delivery === 1)
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Название</th>
                                <th>Значение</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr><th>Ф.И.О.</th><td>{{json_decode($order->orders_info_id)->fio}}</td></tr>
                            <tr><th>Регион</th><td>{{json_decode($order->orders_info_id)->region}}</td></tr>
                            <tr><th>Район</th><td>{{json_decode($order->orders_info_id)->district}}</td></tr>
                            <tr><th>Населенный пункт</th><td>{{json_decode($order->orders_info_id)->town}}</td></tr>
                            <tr><th>Улица</th><td>{{json_decode($order->orders_info_id)->street}}</td></tr>
                            <tr><th>Дом</th><td>{{json_decode($order->orders_info_id)->house}}</td></tr>
                            <tr><th>Корпус</th><td>{{json_decode($order->orders_info_id)->building}}</td></tr>
                            <tr><th>Квартира</th><td>{{json_decode($order->orders_info_id)->apartment}}</td></tr>
                            <tr><th>Индекс</th><td>{{json_decode($order->orders_info_id)->code}}</td></tr>
                            <tr><th>E-mail</th><td>{{json_decode($order->orders_info_id)->mail}}</td></tr>
                            <tr><th>Контактный телефон</th><td>{{json_decode($order->orders_info_id)->phone}}</td></tr>
                            <tr><th>Комментарий</th><td>{{json_decode($order->orders_info_id)->comment}}</td></tr>
                        </tbody>
                    </table>
                @endif
            </div>
            <div role="tabpanel" class="tab-pane" id="product">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Товар</th>
                            <th>Модель</th>
                            <th>Количество</th>
                            <th>Цена за единицу</th>
                            <th>Итого</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach(collect(json_decode($order->orders_products_id))->sortBy('name') as $item)
                            <tr>
                                <td style="text-align: left">
                                    <div style="display: flex">
                                        <div style="width: 150px;max-height: 150px;display: flex;justify-content: center">
                                            <img style="height: 100%;width: 100px;" src="{{url('products/images', $item->options->product->img_name)}}" alt="">
                                        </div>
                                        <div>
                                            <a href="{{url('admin/product', $item->id)}}">
                                                {{$item->name}}
                                            </a>
                                            @foreach($item->options->selectAttributes as $attr)
                                                <div style="padding-left: 20px">
                                                    <span>- {{$attr->type}}: </span>
                                                    <span>{{$attr->val}}</span>
                                                    @if (isset($attr->options))
                                                        <span> | ({{$attr->options}})</span>
                                                    @endif
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </td>
                                <td>------</td>
                                <td>{{$item->qty}}</td>
                                <td>{{$item->price}} р.</td>
                                <td>{{$item->subtotal}} р.</td>
                            </tr>
                        @endforeach
                        <tr>
                            <td style="text-align: right" colspan="4">Итого:</td>
                            <td>
                                {{collect(json_decode($order->orders_products_id))->reduce(function ($carry, $item) {
                                  return $carry + $item->subtotal;
                                })}} р.
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            {{--<div role="tabpanel" class="tab-pane" id="messages">--}}

            {{--</div>--}}
            {{--<div role="tabpanel" class="tab-pane" id="settings">--}}

            {{--</div>--}}
        </div>
    </div>

@endsection
