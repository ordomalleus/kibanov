{{-- Side Navigation --}}
<div class="col-md-2">
    <div class="sidebar content-box" style="display: block;">
        <ul class="nav">
            <!-- Main menu -->
            <li class="current"><a href="{{route('admin.index')}}"><i class="glyphicon glyphicon-home"></i>
                    Управление</a></li>
            <li class="submenu">
                <a href="#">
                    <i class="glyphicon glyphicon-list"></i> Заказы
                    <span class="caret pull-right"></span>
                </a>
                <!-- Sub menu -->
                <ul>
                    <li><a href="{{url('admin/orders')}}">Все заказы</a></li>
                </ul>
            </li>
            <li class="submenu">
                <a href="#">
                    <i class="glyphicon glyphicon-list"></i> Товар
                    <span class="caret pull-right"></span>
                </a>
                <!-- Sub menu -->
                <ul>
                    <li><a href="{{url('admin/product/create')}}">Добавить товар</a></li>
                    <li><a href="{{url('admin/product')}}">Просмотр товара</a></li>
                    {{--<li><a href="#">Товар на главной странице</a></li>--}}
                </ul>
            </li>
            <li class="submenu">
                <a href="#">
                    <i class="glyphicon glyphicon-list"></i> Категории
                    <span class="caret pull-right"></span>
                </a>
                <!-- Sub menu -->
                <ul>
                    <li><a href="{{url('admin/category')}}">Просмотр категорий</a></li>
                </ul>
            </li>
            <li class="submenu">
                <a href="#">
                    <i class="glyphicon glyphicon-list"></i> Атрибты
                    <span class="caret pull-right"></span>
                </a>
                <!-- Sub menu -->
                <ul>
                    <li><a href="{{url('admin/product-group-attributes')}}">Атрибуты товаров</a></li>
                    <li><a href="{{url('admin/product-group-attributes-value')}}">Значения атрибутов</a></li>
                    {{--<li><a href="{{url('admin/attributes')}}">Привязка атрибутов к товару</a></li>--}}
                    <li role="separator" class="divider"></li>
                    <li><a href="{{url('admin/attributes-directories')}}">Справочник атрибутов</a></li>
                    <li><a href="{{url('admin/attributes-directories-value')}}">Справочник значений атрибутов</a></li>
                </ul>
            </li>
        </ul>
    </div>
</div> <!-- ADMIN SIDE NAV-->