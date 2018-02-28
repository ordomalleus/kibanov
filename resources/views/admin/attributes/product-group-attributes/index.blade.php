@extends('admin.layout')

@section('content')

    <h3>Атрибуты товаров</h3>

    {{--Добавление атрибута товаров--}}
    <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modalProductGroupAttributes">
        Добавить атрибут товара
    </button>
    <!-- Modal -->
    <div class="modal fade" id="modalProductGroupAttributes" tabindex="-1" role="dialog" aria-labelledby="modalProductGroupAttributesLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                {!! Form::open(['route' => 'product-group-attributes.store', 'method' => 'post']) !!}
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="modalProductGroupAttributesLabel">Добавить атрибут товара</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            {{ Form::label('name', 'Название атрибута товара') }}
                            {{ Form::text('name', null, ['class' => 'form-control']) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('attributes_directories_id', 'Название из справочника атрибутов') }}
                            {{ Form::select('attributes_directories_id', $attributesDirectories, null, ['class' => 'form-control']) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('type', 'Тип атрибута товара') }}
                            {{ Form::select('type', $type, null, ['class' => 'form-control']) }}
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
    @if(!empty($groups))
        <section>
            <h5>Значения атрибуты</h5>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Название</th>
                        <th>Название из справочника</th>
                        <th>Тип</th>
                        <th>Действия</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($groups as $group)
                        <tr>
                            <td>{{$group->id}}</td>
                            <td>{{$group->name}}</td>
                            <td>{{$group->attributesDirectory->name}}</td>
                            <td>{{$group->type}}</td>
                            <td>
                                {!! Form::open(['route' => ['product-group-attributes.destroy',
                                $group->id], 'method' => 'delete', 'style' =>'display: inline-block']) !!}
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