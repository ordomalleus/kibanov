@extends('admin.layout')

@section('content')
    {{--Вывод справочника атрибутов--}}
    <h3>Справочник атрибутов</h3>

    {{--Добавление в справочник атрибутов--}}
    <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modalAtributes">
        Добавить атрибут
    </button>
    <!-- Modal -->
    <div class="modal fade" id="modalAtributes" tabindex="-1" role="dialog" aria-labelledby="modalAtributesLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                {!! Form::open(['route' => 'attributes-directories.store', 'method' => 'post']) !!}
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="modalAtributesLabel">Добавить в справочник атрибутов</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            {{ Form::label('name', 'Название атрибута') }}
                            {{ Form::text('name', null, ['class' => 'form-control']) }}
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
            <h5>Атрибуты</h5>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Название</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($attributes as $attribute)
                        <tr>
                            <td>{{$attribute->id}}</td>
                            <td>{{$attribute->name}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </section>
    @endif

@endsection