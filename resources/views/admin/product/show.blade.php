@extends('admin.layout')

@section('style')
@endsection

@section('content')
    <h3>Страница товара</h3>

    <pre>{{$product}}</pre>

    {{--Добавление атрибут--}}
    <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modalAttribute">
        Добавить атрибут
    </button>
    <!-- Modal -->
    <div class="modal fade" id="modalAttribute" tabindex="-1" role="dialog" aria-labelledby="modalAttributeLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                {!! Form::open(['route' => 'product.store', 'method' => 'post']) !!}
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="modalAttributeLabel">Добавление атрибута</h4>
                </div>
                <div class="modal-body">
                    {{--<div class="form-group">--}}
                        {{--{{ Form::label('name', 'Название категории') }}--}}
                        {{--{{ Form::text('name', null, ['class' => 'form-control']) }}--}}
                    {{--</div>--}}

                    {{--<div class="form-group">--}}
                        {{--{{ Form::label('parent_id', 'Родитель категории') }}--}}
                        {{--{{ Form::select('parent_id', collect(['null' => 'нет'])->merge($categories->pluck('name', 'id')) , null, ['class' => 'form-control']) }}--}}
                    {{--</div>--}}
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
                        {{ Form::select('category_id', $categories, null, ['class' => 'form-control']) }}
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
@endsection