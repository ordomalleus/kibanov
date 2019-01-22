@extends('admin.layout')

@section('content')

    <h3>Значения атрибутов товаров</h3>

    {{--Добавление значения атрибута товаров--}}
    <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modalProductGroupAttributesValue">
        Добавить атрибут товара
    </button>
    <!-- Modal -->
    <div class="modal fade" id="modalProductGroupAttributesValue" tabindex="-1" role="dialog" aria-labelledby="modalProductGroupAttributesValueLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                {!! Form::open(['route' => 'product-group-attributes-value.store', 'method' => 'post']) !!}
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="modalProductGroupAttributesValueLabel">Добавить значение атрибута товара</h4>
                    </div>
                    <div class="modal-body">

                        <div class="form-group">
                            {{ Form::label('product_group_attributes_id', 'Атрибут товара') }}
                            {{ Form::select('product_group_attributes_id', $productGroupAttributes, null, ['class' => 'form-control']) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('attributes_directory_values_id', 'Атрибут значения справочника') }}
                            {{ Form::select('attributes_directory_values_id', $attributesDirectoryValue, null, ['class' => 'form-control']) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('price', 'Влияние на цену') }}
                            {{ Form::number('price', 0, ['class' => 'form-control']) }}
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

    {{--Показ справочника атрибутов--}}
    @if(!empty($groupsValue))
        <section>
            <h5>Значения атрибуты</h5>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Атрибут товара</th>
                        <th>Тип атрибута товара</th>
                        <th>Атрибут значения справочника</th>
                        <th>Влияние на цену</th>
                        <th>Действия</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($groupsValue as $groupValue)
                        <tr>
                            <td>{{$groupValue->id}}</td>
                            <td>{{$groupValue->productGroupAttributes->name}}</td>
                            <td>{{$groupValue->productGroupAttributes->type}}</td>
                            <td>{{$groupValue->attributesDirectoryValue->name}}</td>
                            <td>{{$groupValue->price}}</td>
                            <td>
                                {!! Form::open(['route' => ['product-group-attributes-value.destroy', $groupValue->id], 'method' => 'delete']) !!}
                                    <button type="submit" class="btn btn-danger">удалить</button>
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </section>
    @endif

@endsection