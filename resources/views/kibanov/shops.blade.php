@extends('kibanov.layout.app')

@section('store')
    <script>
        window.store = {};
        window.store.cart = @json($cart);
    </script>
@endsection

@section('content')
    <section class="menu-container">
        @include('kibanov.component.menu')
    </section>
    <section class="section-full" id="shops">
        <div class="section-gradient"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-6">В магазинах "Сцена" вы найдёте не только нашу  собственную продукцию, но и товары  российских и зарубежных производителей: "Sansha Production Ltd" , "Соло", "Р-КЛАСС", "Baltic Bridge", "Кorri" и многих других кампаний.</div>
                <div class="col-md-6">Наши магазины - это место, где профессионалы мира танца  и начинающие танцоры всегда смогут подобрать для себя модель, отвечающую их потребностям и вкусу.</div>
            </div>
            <div class="row">
                <div class="col-md-12 text-align-center title">Адреса магазинов</div>
                <div class="col-md-12 shops-container-ul m-b-30">
                    <ul class="shops-ul">
                        <li class="shops-li active" data-gis-id="map-perm">
                            <span class="shops-li-title">г. Пермь</span>
                            <div class="shops-li-text">
                                <span>
                                    г. Пермь, ул. Советская, д. 22
                                    <br/>Пн-Пт:10-19 Сб:11-18 Вс:11-16
                                    <br/>тел. +7(342) 212-83-41
                                    <br/>Мы во "ВКонтакте": <a href="https://vk.com/scena.perm" target="_blank">https://vk.com/scena.perm</a>
                                </span>
                            </div>
                        </li>
                        <li class="shops-li" data-gis-id="map-spb">
                            <span class="shops-li-title">г. Санкт-Петербург</span>
                            <div class="shops-li-text">
                                <span>
                                    г. САНКТ-ПЕТЕРБУРГ, ул. Крылова, д. 2
                                    <br/>Пн-Пт:11-21 Сб-Вс:11-18
                                    <br/>тел. +7(911) 971-63-44
                                    <br/>Мы во "ВКонтакте": <a href="https://vk.com/vse.dlia.tanca" target="_blank">https://vk.com/vse.dlia.tanca</a>
                                </span>
                            </div>
                        </li>
                        <li class="shops-li" data-gis-id="map-ekb">
                            <span class="shops-li-title">г. Екатеринбург</span>
                            <div class="shops-li-text">
                                <span>
                                    г. Екатеринбург, ул. Мамина-Сибиряка, д. 102
                                    <br/>Пн-Пт:10-20 Сб:11-18 Вс:11-16
                                    <br/>тел. +7(343) 355-23-08
                                    <br/>Мы во "ВКонтакте": <a href="https://vk.com/scenaekat" target="_blank">https://vk.com/scenaekat</a>
                                </span>
                            </div>
                        </li>
                        <li class="shops-li" data-gis-id="map-kazan">
                            <span class="shops-li-title">г. Казань</span>
                            <div class="shops-li-text">
                                <span>
                                    г. Казань, ул. Карла Маркса, д. 48
                                    <br/>Пн-Пт:10-20 Сб-Вс:11-18
                                    <br/>тел. +7(987) 406-38-19
                                    <br/>Мы во "ВКонтакте": <a href="https://vk.com/vach.tanec" target="_blank">https://vk.com/vach.tanec</a>
                                </span>
                            </div>
                        </li>
                        <li class="shops-li" data-gis-id="map-chelabinsk">
                            <span class="shops-li-title">г. Челябинск</span>
                            <div class="shops-li-text">
                                <span>
                                    г. Челябинск, пр. Ленина, д. 77
                                    <br/>Пн-Пт:10-20 Сб-Вс:11-18
                                    <br/>тел. +7(351) 265-44-73
                                    <br/>Мы во "ВКонтакте": <a href="https://vk.com/scena.cheliabinsk" target="_blank">https://vk.com/scena.cheliabinsk</a>
                                </span>
                            </div>
                        </li>
                        <li class="shops-li" data-gis-id="map-eshkarola">
                            <span class="shops-li-title">г. Йошкар-Ола</span>
                            <div class="shops-li-text">
                                <span>
                                    г. Йошкар-Ола, ул. Комсомольская, д. 130
                                    <br/>Пн-Пт:10-19 Сб:11-18 Вс:11-17
                                    <br/>тел. +7(987) 704-97-27
                                    <br/>Мы во "ВКонтакте": <a href="https://vk.com/scenajoshkarola" target="_blank">https://vk.com/scenajoshkarola</a>
                                </span>
                            </div>
                        </li>
                        <li class="shops-li" data-gis-id="map-krasnodar">
                            <span class="shops-li-title">г. Краснодар</span>
                            <div class="shops-li-text">
                                <span>
                                    г. Краснодар, ул. Ленина, д. 54
                                    <br/>Пн-Пт:10-20 Сб-Вс:11-18
                                    <br/>тел. +7(918) 019-18-42
                                    <br/>Мы во "ВКонтакте": <a href="https://vk.com/scenakrasnodar" target="_blank">https://vk.com/scenakrasnodar</a>
                                </span>
                            </div>
                        </li>
                    </ul>
                    <div>
                        <div id="map-perm" class="gis-map-container" style="width:100%; min-height:400px"></div>
                        <div id="map-spb" class="gis-map-container hidden" style="width:100%; min-height:400px"></div>
                        <div id="map-ekb" class="gis-map-container hidden" style="width:100%; min-height:400px"></div>
                        <div id="map-kazan" class="gis-map-container hidden" style="width:100%; min-height:400px"></div>
                        <div id="map-chelabinsk" class="gis-map-container hidden" style="width:100%; min-height:400px"></div>
                        <div id="map-eshkarola" class="gis-map-container hidden" style="width:100%; min-height:400px"></div>
                        <div id="map-krasnodar" class="gis-map-container hidden" style="width:100%; min-height:400px"></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 m-b-30">
                    Если у Вас нет возможности приобрести понравившуюся модель непосредственно в одном из наших магазинов, можно оформить заказ  прямо на сайте. Минимальная сумма заказа составляет 1400 рублей.  Мы осуществляем доставку по всей России.
                </div>
            </div>
        </div>
    </section>
    <script src="https://maps.api.2gis.ru/2.0/loader.js?pkg=full&lazy=true"></script>
@endsection