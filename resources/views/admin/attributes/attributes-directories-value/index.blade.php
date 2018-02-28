@extends('admin.layout')

@section('content')
    {{--Вывод справочника значений атрибутов--}}
    <h3>Справочник значений атрибутов</h3>

    {{--Добавление в справочник значений атрибутов--}}
    <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modalAtributesValue">
        Добавить значение атрибута
    </button>
    <!-- Modal Добавить атрибут-->
    <div class="modal fade" id="modalAtributesValue" tabindex="-1" role="dialog" aria-labelledby="modalAtributesValueLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                {!! Form::open(['route' => 'attributes-directories-value.store', 'method' => 'post']) !!}
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="modalAtributesValueLabel">Добавить в справочник атрибутов</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            {{ Form::label('name', 'Название атрибута') }}
                            {{ Form::text('name', null, ['class' => 'form-control']) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('type', 'Тип атрибута') }}
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
    @if(!empty($attributes))
        <section>
            <h5>Значения атрибуты</h5>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Название</th>
                        <th>Тип</th>
                        <th>Действия</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($attributes as $attribute)
                        <tr>
                            <td>{{$attribute->id}}</td>
                            <td>{{$attribute->name}}</td>
                            <td>{{$attribute->type}}</td>
                            <td>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAtributesValueEdit-{{$attribute->id}}">
                                    Редактировать
                                </button>
                                {!! Form::open(['route' => ['attributes-directories-value.destroy',
                                $attribute->id], 'method' => 'delete', 'style' =>'display: inline-block']) !!}
                                <button type="submit" class="btn btn-danger">удалить</button>
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </section>

        {{--TODO: отрефакторить модалки в одну--}}
        @foreach($attributes as $attribute)
            <!-- Modal Редактировать атрибут-->
            <div class="modal fade" id="modalAtributesValueEdit-{{$attribute->id}}" tabindex="-1" role="dialog" aria-labelledby="modalAtributesValueEditLabel-{{$attribute->id}}">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        {!! Form::open(['route' => ['attributes-directories-value.update', $attribute->id], 'method' => 'put']) !!}
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="modalAtributesValueEditLabel-{{$attribute->id}}">Добавить в справочник атрибутов</h4>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                {{ Form::label('name', 'Название атрибута') }}
                                {{ Form::text('name', $attribute->name, ['class' => 'form-control']) }}
                            </div>

                            <div class="form-group">
                                {{ Form::label('type', 'Тип атрибута') }}
                                {{ Form::select('type', $type, $attribute->type, ['class' => 'form-control']) }}
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
        @endforeach
    @endif

@endsection