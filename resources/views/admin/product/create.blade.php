@extends('admin.layout')

@section('content')

    <h3>Добавить товар</h3>

    <div class="row">
        <div class="col-md-6 col-md-offset-3">

            {!! Form::open(['route' => 'product.store', 'method' => 'post', 'files' => true]) !!}

                <div class="form-group">
                    {{ Form::label('name', 'Название товара') }}
                    {{ Form::text('name', null, ['class' => 'form-control']) }}
                </div>

                <div class="form-group">
                    {{ Form::label('description', 'Описание товара') }}
                    {{ Form::text('description', null, ['class' => 'form-control']) }}
                </div>

                <div class="form-group">
                    {{ Form::label('category_id', 'id - категории') }}
                    {{ Form::select('category_id', $categories, null, ['class' => 'form-control']) }}
                </div>

                {{--<div class="form-group">--}}
                    {{--{{ Form::label('attributes_id', 'id - атрибута') }}--}}
                    {{--{{ Form::text('attributes_id', null, ['class' => 'form-control']) }}--}}
                {{--</div>--}}

                <div class="form-group">
                    {{ Form::label('price', 'Цена') }}
                    {{ Form::text('price', null, ['class' => 'form-control']) }}
                </div>

                <div class="form-group">
                    {{ Form::label('img_name', 'Картинка для товара') }}
                    {{ Form::file('img_name', ['class' => 'form-control']) }}
                </div>

                <div class="form-group">
                    {{ Form::label('show', 'Видимость товара на сайте') }}
                    {{ Form::select('show', [1 => 'показать товар', 0 => 'спрятать товар'], null, ['class' => 'form-control']) }}
                </div>

                {{ Form::submit('Создать', ['class' => 'btn btn-default']) }}

            {!! Form::close() !!}

        </div>
    </div>

@EndSection

