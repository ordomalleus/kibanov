<li class="catalog-list-parent">
    {{--Если есть дети то покажем кнопку раскрытия--}}
    @if($category->child)
        {{--Иконка разворота--}}
        <div class="catalog-list-parent-toggle"></div>
    @endif

    {{--Если есть родитель то это мнею не 1 уровня--}}
    @if($category->parent_id)
        <a class="catalog-list-child-href{{!empty($title) && $category->id === $title->id ? ' active' : ''}}"
           href="{{url('catalog', $category->id)}}">
            {{$category->name}}
        </a>
    {{--Если нет родителя то это меню 1 уровня--}}
    @else
        {{--TODO: кастыль для Аксессуаров, подумать и исправить--}}
        @if($category->id === 31)
            <a class="catalog-list-child-href{{!empty($title) && $category->id === $title->id ? ' active' : ''}}"
               href="{{url('catalog', $category->id)}}">
                {{$category->name}}
            </a>
        @else
            <span class="catalog-list-parent-href">{{$category->name}}</span>
        @endif
    @endif

    @if($category->child)
        <ul class="catalog-list-child hidden">
            @foreach($category->child as $child)
                @include('kibanov.component.recursive-categories', ['category' => $child])
            @endforeach
        </ul>
    @endif
</li>
