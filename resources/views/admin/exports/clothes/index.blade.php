@extends('admin.layout')

@section('content')

    <h3>Экспорт одежды</h3>
    <p>Экспорт удалит весь товар, использовать только программисту</p>

    <div class="row">
        <div class="col-md-6 col-md-offset-3">

            {!! Form::open(['route' => 'admin.exports.clothes.begin', 'method' => 'post', 'files' => true]) !!}

            <div class="form-group">
                {{ Form::label('export_name', 'Файл') }}
                {{ Form::file('export_name', ['class' => 'form-control']) }}
            </div>

            {{ Form::submit('Экспорт', ['class' => 'btn btn-default']) }}

            {!! Form::close() !!}

        </div>
    </div>

@EndSection

