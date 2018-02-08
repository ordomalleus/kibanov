@extends('admin.layout')

@section('style')
@endsection

@section('content')
    <h3>Список товаров</h3>

    @foreach ($products->chunk(3) as $chunk)
        <div class="row admin-products">
            @foreach($chunk as $product)
                <div class="col-md-4">
                    <div class="admin-product">
                        <h4>{{$product->name}}</h4>
                        <div class="img" style="background-image: url('{{url('products/images', $product->img_name)}}')">
                            {{--<img src="{{url('products/images', $product->img_name)}}" alt="{{$product->name}}">--}}
                        </div>
                        <p>цена: {{$product->description}}</p>
                        <p>цена: {{$product->price}}</p>
                    </div>
                </div>
            @endforeach
        </div>
    @endforeach
@endsection