<!DOCTYPE html>
<html>
<head>
    <title>Admin Area</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body style="height: 600px;padding: 0;margin: 0">
<div class="page-content" style="background-color: #333;height: 600px">
    <div class="row">
        <div style="height: 50px"></div>
        <div style="color: #fff">
            <h1 style="text-align: center">Сеть магазинов "СЦЕНА"</h1>
        </div>
        <div style="text-align: center">
            <div style="height: 100px"></div>
        </div>
        <div style="height: 50px"></div>
        <div style="color: #fff;text-align: center">
            Сформирован заказ №{{$order->id}}
        </div>
        <div style="text-align: center;margin-top: 40px">
            <a href="{{url('orders/showUserStatus?') . http_build_query(['unique_id' => $order->unique_id])}}"
               style="padding: 10px 20px; background: #58cbba;color: #fff;text-decoration: none">
                Перейти к заказу
            </a>
        </div>
    </div>
</div>
</body>
</html>
