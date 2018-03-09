@extends('kibanov.layout.app')

@section('store')
    <script>
        window.store = {};
        window.store.products = @json($products)
    </script>
@endsection


@section('content')
    <section style="background-color: blue;padding-top: 10px">
        @include('kibanov.component.menu')
    </section>
    <section>
        <div class="container-fluid">
            <div class="row">
                @foreach ($products as $product)
                    <div class="col-md-4" style="color: #333">
                        <div class="catalog-product">
                            <h4 class="product-price-name" data-id-product="{{$product->id}}" style="min-height: 40px">
                                {{$product->name}}
                            </h4>
                            <div class="img" style="background-image: url('{{url('products/images', $product->img_name)}}')">
                            </div>
                            <h5>Описание</h5>
                            <p style="height: 50px; overflow: hidden">{{$product->description}}</p>
                            <p>цена: {{$product->price}}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <section>
        {{$products->render()}}
    </section>
@endsection
