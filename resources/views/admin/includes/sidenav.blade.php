{{-- Side Navigation --}}
<div class="col-md-2">
    <div class="sidebar content-box" style="display: block;">
        <ul class="nav">
            <!-- Main menu -->
            <li class="current"><a href="{{route('admin.index')}}"><i class="glyphicon glyphicon-home"></i>
                    Управление</a></li>
            <li class="submenu">
                <a href="#">
                    <i class="glyphicon glyphicon-list"></i> Товар
                    <span class="caret pull-right"></span>
                </a>
                <!-- Sub menu -->
                <ul>
                    {{--<li><a href="{{route('admin/product/create')}}">Добавить товар</a></li>--}}
                    <li><a href="{{url('admin/product/create')}}">Добавить товар</a></li>
                    <li><a href="{{url('admin/product')}}">Просмотр товара</a></li>
                </ul>
            </li>
        </ul>
    </div>
</div> <!-- ADMIN SIDE NAV-->