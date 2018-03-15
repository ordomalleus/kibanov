@extends('kibanov.layout.app')

@section('store')
    <script>
        window.store = {};
        window.store.products = @json($products);
        window.store.cart = @json($cart);
    </script>
@endsection


@section('content')
    <section class="menu-container">
        @include('kibanov.component.menu')
    </section>
    <section id="catalog"}>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4">
                    <div class="title">Каталог</div>
                    <ul class="catalog-list">
                        @foreach($categories as $category)
                            @if($category->child)
                                <li class="catalog-list-parent">
                                    <span class="catalog-list-parent-href">{{$category->name}}</span>
                                    <ul class="catalog-list-child hidden">
                                        @foreach($category->child as $child)
                                            <li calss="catalog-list-child-li">
                                                <a class="catalog-list-child-href{{!empty($title) && $child->id === $title->id ? ' active' : ''}}" href="{{url('catalog', $child->id)}}">
                                                    {{$child->name}}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                            @else
                                {{--TODO: кастыль для Аксессуаров, подумать и исправить--}}
                                @if($category->id === 31)
                                    <li calss="catalog-list-parent">
                                        <a class="catalog-list-parent-href" href="{{url('catalog', $category->id)}}">{{$category->name}}</a>
                                    </li>
                                @else
                                    <li calss="catalog-list-parent">
                                        <span class="catalog-list-parent-href">{{$category->name}}</span>
                                    </li>
                                @endif
                            @endif
                        @endforeach
                    </ul>
                </div>
                <div class="col-md-8">
                    <div class="col-md-12">
                        @if(!empty($title))
                            <div class="text-align-center title">{{$title->name}}</div>
                        @else
                            <div class="text-align-center title">Популярные</div>
                        @endif
                    </div>
                    @foreach ($products as $product)
                        <div class="col-md-6">
                            <div class="product">
                                <div class="product-img" style="background-image: url('{{url('products/images', $product->img_name)}}')">
{{--                                <div class="product-img" style="background-image: url('{{url('products/images', $product->img_name)}}')">--}}
                                    <img src="{{url('products/images', $product->img_name)}}">
                                </div>
                                <div class="product-info">
                                    <p class="product-info-title" data-id-product="{{$product->id}}">{{$product->name}}</p>
                                    <p class="product-info-price">{{$product->price}} Р</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4 col-md-offset-8 text-align-right">
                    {{$products->render()}}
                </div>
            </div>
        </div>
    </section>
@endsection
