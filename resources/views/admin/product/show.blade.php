@extends('admin.layout')

@section('style')
@endsection

@section('content')
    <h3>Страница товара</h3>

    <div>
        <h3>{{$product->name}}</h3>
        <img src="{{url('products/images', $product->img_name)}}" style="max-height: 300px;margin-bottom: 20px"
             class="img-thumbnail" alt="Responsive image">
        <p>{{$product->description}}</p>
        <p>{{$product->price}}</p>

        {{--Добавление атрибут--}}
        <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modalAttribute">
            Добавить атрибут
        </button>
        <!-- Modal -->
        <div class="modal fade" id="modalAttribute" tabindex="-1" role="dialog" aria-labelledby="modalAttributeLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    {!! Form::open(['action' => ['Admin\ProductController@addAttribute', $product->id], 'method' => 'post']) !!}
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="modalAttributeLabel">Добавление атрибута</h4>
                    </div>
                    <div class="modal-body">

                        <div class="form-group">
                            {{ Form::label('product_group_attributes_id', 'Атрибут товара') }}
                            {{ Form::select('product_group_attributes_id', $productGroupAttributes->pluck('name', 'id') , null, ['class' => 'form-control']) }}
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                        <button type="submit" class="btn btn-primary">Сохранить</button>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>

        {{--Редактирование товара--}}
        <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modalProduct">
            Редактировать товар
        </button>
        <!-- Modal -->
        <div class="modal fade" id="modalProduct" tabindex="-1" role="dialog" aria-labelledby="modalProductLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    {!! Form::open(['route' => ['product.update',  $product->id], 'method' => 'put', 'files' => true]) !!}
                    {{--{!! Form::open() !!}--}}
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="modalProductLabel">Редактировать товар</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            {{ Form::label('name', 'Название товара') }}
                            {{ Form::text('name', $product->name, ['class' => 'form-control']) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('description', 'Описание товара') }}
                            {{ Form::text('description', $product->description, ['class' => 'form-control']) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('category_id', 'id - категории') }}
                            {{ Form::select('category_id', $categories, $product->category_id, ['class' => 'form-control']) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('price', 'Цена') }}
                            {{ Form::text('price', $product->price, ['class' => 'form-control']) }}
                        </div>

                        <div class="form-group">

                            {{--если есть картинка покажем ее, новая картинка заменит старую--}}
                            @if($product->img_name)
                                <div>
                                    <img src="{{url('products/images', $product->img_name)}}" alt="" style="width: 200px">
                                </div>
                            @endif

                            {{ Form::label('img_name', 'Картинка для товара') }}
                            {{ Form::file('img_name', ['class' => 'form-control']) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('show', 'Видимость товара на сайте') }}
                            {{ Form::select('show', [1 => 'показать товар', 0 => 'спрятать товар'], $product->show, ['class' => 'form-control']) }}
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                        <button type="submit" class="btn btn-primary">Сохранить</button>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>

        {{--Таблица с атрибутами товара--}}
        @if(!empty($product->attributes))
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Атрибуты товара</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($product->attributes as $attribute)
                    <tr>
                        <td>
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>{{$attribute->productGroupAttributes->name}}</th>
                                        <th>
                                            {!! Form::open(['action' => ['Admin\ProductController@deleteAttribute', $attribute->id],
                                            'method' => 'delete', 'style' =>'display: inline-block']) !!}
                                            <button type="submit" class="btn btn-danger">удалить</button>
                                            {!! Form::close() !!}
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($attribute->productGroupAttributes->productGroupAttributesValue as $productGroupAttributesValue)
                                    <tr>
                                        <td colspan="2" style="padding-left: 50px; text-align: left">{{$productGroupAttributesValue->attributesDirectoryValue->name}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    @endif
@endsection