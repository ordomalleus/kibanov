@extends('admin.layout')

@section('content')
    {{--Вывод категорий--}}
    <h3>Категории</h3>
    {{--<pre>{{$categories->groupBy('parent_id')}}</pre>--}}
    <div class="navbar">
        <ul class="nav navbar-nav">
            @foreach($categories as $category)
                <li>
                    <a href="{{url('admin/category', $category->id)}}">{{$category->name}}</a>
                </li>
            @endforeach
        </ul>
    </div>

    {{--Добавление категорию--}}
    <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modalCategory">
        Добавить категорию
    </button>
    <!-- Modal -->
    <div class="modal fade" id="modalCategory" tabindex="-1" role="dialog" aria-labelledby="modalCategoryLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                {!! Form::open(['route' => 'category.store', 'method' => 'post']) !!}
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="modalCategoryLabel">Добавление категории</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            {{ Form::label('name', 'Название категории') }}
                            {{ Form::text('name', null, ['class' => 'form-control']) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('parent_id', 'Родитель категории') }}
                            {{ Form::select('parent_id', collect(['нет' => 'null'])->merge($categories->pluck('id', 'name'))->flip(), null, ['class' => 'form-control']) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('priority', 'Порядковый номер') }}
                            {{ Form::number('priority', 0, ['class' => 'form-control']) }}
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

    {{--Показ товаров в категории--}}
    @if(!empty($products))
        <section>
            <h4>Категория: {{$selectCategory->name}}</h4>

            {{--Редактировать категорию--}}
            <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modalCategoryEdit">
                Редактировать категорию
            </button>
            <!-- Modal -->
            <div class="modal fade" id="modalCategoryEdit" tabindex="-1" role="dialog" aria-labelledby="modalCategoryEditLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        {!! Form::open(['route' => ['category.update', $selectCategory->id], 'method' => 'put']) !!}
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="modalCategoryLabel">Добавление категории</h4>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                {{ Form::label('name', 'Название категории') }}
                                {{ Form::text('name', $selectCategory->name, ['class' => 'form-control']) }}
                            </div>

                            <div class="form-group">
                                {{ Form::label('parent_id', 'Родитель категории') }}
                                {{ Form::select('parent_id', collect(['нет' => 'null'])->merge($categories->pluck('id', 'name'))->flip(), $selectCategory->parent_id, ['class' => 'form-control']) }}
                            </div>

                            <div class="form-group">
                                {{ Form::label('priority', 'Порядковый номер') }}
                                {{ Form::number('priority', $selectCategory->priority, ['class' => 'form-control']) }}
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

            <h5>Товар</h5>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Название Товар</th>
                        <th>Цена</th>
                        <th>Видимость на сайте</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td>{{$product->name}}</td>
                            <td>{{$product->price}}</td>
                            <td>{{$product->show}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </section>
    @endif

@endsection