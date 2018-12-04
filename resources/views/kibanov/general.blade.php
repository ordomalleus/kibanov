@extends('kibanov.layout.app')

@section('store')
    <script>
        window.store = {
            products: {}
        };
        window.store.products.data = @json($products);
        window.store.cart = @json($cart);
    </script>
@endsection

@section('content')
    <section class="section-full" id="general-1">
        <div class="section-gradient"></div>
        @include('kibanov.component.menu')
        <div class="slogan">
            <div class="slogan-logan"><p>Театральная</p>
                <p>фабрика</p>
                <p>Кибанова</p></div>
            <div class="slogan-text"><p>Производим обувь и одежду для занятий танцами.</p>
                <p>Танцуйте, а мы Вам поможем!</p></div>
        </div>
    </section>
    <section id="general-2">
        <div class="container">
            <div class="row m-b-30">
                <div class="col-md-4"><span class="rise-text">И</span><span>стория товарной марки "Кибанов" началась в 1995 году, когда поклонник танца Андрей Кибанов организовал мастерскую "Балетная обувь от Кибанова". Основываясь на традициях и мастерстве цехов Пермского театра оперы и балета, бережно сохраняя классические технологии изготовления танцевальной обуви и в то же время развивая и совершенствуя их. Андрею Кибанову удалось в сравнительно небольшой срок перерасти из мелкого ремесленника в фабриканта.</span>
                </div>
                <div class="col-md-8">
                    {{--<div class="product">--}}
                        {{--<div class="product-img"><img src="img/general-section-2-bal-1.jpg"></div>--}}
                        {{--<div class="product-info"><p class="product-info-title">Балетки для танцев МБО</p>--}}
                            {{--<p class="product-info-price">410 Р</p></div>--}}
                    {{--</div>--}}

                    <div class="product">
                        <div class="product-img">
                            <img src="{{url('products/images/', $products[0]->img_name)}}">
                        </div>
                        <div class="product-info">
                            <p class="product-info-title" data-id-product="{{$products[0]->id}}">{{$products[0]->name}}</p>
                            <p class="product-info-price">{{$products[0]->price}} Р</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row m-b-30">
                <div class="col-md-4 col-sm-6 col-xs-6">
                    {{--<div class="product">--}}
                        {{--<div class="product-img"><img src="img/general-section-2-bal-2.jpg"></div>--}}
                        {{--<div class="product-info"><p class="product-info-title">Балетки для танцев МБО</p>--}}
                            {{--<p class="product-info-price">410 Р</p></div>--}}
                    {{--</div>--}}

                    <div class="product">
                        <div class="product-img">
                            <img src="{{url('products/images/', $products[1]->img_name)}}">
                        </div>
                        <div class="product-info">
                            <p class="product-info-title" data-id-product="{{$products[1]->id}}">{{$products[1]->name}}</p>
                            <p class="product-info-price">{{$products[1]->price}} Р</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-6">
                    <div class="product">
                        <div class="product-img"><img src="img/general-section-2-bal-3.jpg"></div>
                        <div class="product-info"><p class="product-info-title">Балетки для танцев МБО</p>
                            <p class="product-info-price">410 Р</p></div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-6">
                    <div class="product">
                        <div class="product-img"><img src="img/general-section-2-bal-4.jpg"></div>
                        <div class="product-info"><p class="product-info-title">Балетки для танцев МБО</p>
                            <p class="product-info-price">410 Р</p></div>
                    </div>
                </div>
            </div>
            <div class="row m-b-30">
                <div class="col-md-4">
                    <div class="product">
                        <div class="product-img"><img src="img/general-section-2-bal-5.jpg"></div>
                        <div class="product-info"><p class="product-info-title">Балетки для танцев МБО</p>
                            <p class="product-info-price">410 Р</p></div>
                    </div>
                </div>
                <div class="col-md-8 m-t-30"><span class="rise-text">Ф</span><span>абрика Кибанова выпускает богатый ассортимент обуви для исполнителей самых разных жанров: классического танца, народно-характерного, джаза, степа и фламенко, бального танца, цирковых представлений и шоу. Обувь "От Кибанова" отличается высоким качеством, комфортностью, производится только из натуральных материалов, позволяющих дышать ногам — главному инструменту всех танцоров,  и, что очень важно, доступна по цене.</span>
                </div>
            </div>
        </div>
    </section>
    <section id="general-3">
        <div class="section-gradient"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-8 m-b-30 general-text-3"><span class="rise-text">К</span><span>аждому танцующему необходимо не только красиво передавать действо, но и грамотно выстраивать положение корпуса, рук и ног. Правильная работа корпуса, рук, головы зависит, в большей степени, от стараний, усилий, физических возможностей актера, а вот правильная постановка стопы возможна только в качественной профессиональной обуви для танцев. Надо отметить, специальная обувь нужна не только для выступления, но и для тренировок.</span>
                </div>
            </div>
        </div>
    </section>
    <section id="general-4">
        <div class="container">
            <div class="row m-b-30">
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="product">
                        <div class="product-img"><img src="img/general-section-4-bal-1.jpg"></div>
                        <div class="product-info"><p class="product-info-title">Джазовые полуботинки</p>
                            <p class="product-info-price">5500 Р</p></div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="product">
                        <div class="product-img"><img src="img/general-section-4-bal-2.jpg"></div>
                        <div class="product-info"><p class="product-info-title">Джазовые полуботинки текстильные</p>
                            <p class="product-info-price">5500 Р</p></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="general-5">
        <div class="section-gradient"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-align-center general-5-title">Ведущие заказчики:</div>
                <div class="col-md-5 general-5-text-left">
                    Государственный театр оперы и балета «Астана Опера»
                    <br/>Муниципальный театр балета "Щелкунчик" г. Екатеринбург
                    <br/>Екатеринбургский государственный академический театр оперы и балета
                    <br/>Государственный театр оперы и балета Удмуртии город Ижевск
                    <br/>Марийский государственный театр оперы и балета им. Эрика Сапаева
                    <br/>"Премьера" им. Л. Г. Гатова" г. Краснодар
                    <br/>Театр " Балет Евгения Панфилова" г. Пермь
                    <br/>Пермский театр оперы и балета им. П.И. Чайковского
                    <br/>Пермский театр юного зрителя
                </div>
                <div class="col-md-2"></div>
                <div class="col-md-5 general-5-text-right">
                    Пермское государственное хореографическое училище
                    <br/>Самарский академический театр оперы и балета
                    <br/>Академия танца Бориса Эйфмана
                    <br/>Театр балета им. Л. Якобсона
                    <br/>Академический театр Балета Бориса Эйфмана
                    <br/>Бурятский государственный ордена Ленина академический театр оперы и балета им. н. а. СССР Г. Ц. Цыдынжапова
                    <br/>Колледж- интернат Центр искусств для одаренных детей Севера г. Ханты-Мансийск
                    <br/>Челябинский государственный академический театр оперы и балета им. М.И. Глинки"
                </div>
            </div>
        </div>
    </section>
    <section id="general-6">
        <div class="container">
            <div class="row m-b-30">
                <div class="col-md-4 col-sm-6 col-xs-6">
                    <div class="product">
                        <div class="product-img"><img src="img/general-section-6-bal-1.jpg"></div>
                        <div class="product-info"><p class="product-info-title">Пуанты сувенирные</p>
                            <p class="product-info-price">5500 Р</p></div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-6">
                    <div class="product">
                        <div class="product-img"><img src="img/general-section-6-bal-2.jpg"></div>
                        <div class="product-info"><p class="product-info-title">Ботинки клоуна</p>
                            <p class="product-info-price">5500 Р</p></div>
                    </div>
                </div>
                <div class="col-md-4 general-6-text">
                    <span class="rise-text">К</span>
                    <span>нам обращаются не только танцоры, наша компания выполняет заказы на сценическую обувь для театров драмы, кукольных театров, ТЮЗов, также изготавливаем достаточно сложную, специфичную обувь для цирка. </span>
                    <p>Мы берём заказы на изготовление декораций, бутафории, шьём костюмы для балетных спектаклей и коллективов народного танца.</p></div>
            </div>
        </div>
    </section>
    <section id="general-7">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-align-center title">Аксессуары</div>
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="product">
                        <div class="product-img"><img src="img/general-section-7-bal-1.jpg"></div>
                        <div class="product-info"><p class="product-info-title">Пуанты</p>
                            <p class="product-info-price">410 Р</p></div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="product">
                        <div class="product-img"><img src="img/general-section-7-bal-2.jpg"></div>
                        <div class="product-info"><p class="product-info-title">Пуанты</p>
                            <p class="product-info-price">410 Р</p></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="general-8">
        <div class="container">
            <div class="row">
                <div class="col-md-6 general-8-text"><p>как выбирать танцевальную обувь</p>
                    <p>Несколько советов, которые помогут облегчить выбор:</p>
                    <ul>
                        <li>обувь должна быть изготовлена из натуральных материалов – кожи, замши, нубука, сатина, прочего</li>
                        <li>пара обуви должна соответствовать размеру стопы – нога не должна «болтаться», но и не быть сильно стесненной</li>
                        <li>хорошо, если в области пальцев у обуви будет застежка, позволяющая регулировать полноту и ремешок, окружающий ногу для хорошего прилегания стопы</li>
                        <li>каблук должен быть наиболее комфортным (например, начинающие танцоры выбирают обувь с небольшим каблуком)</li>
                    </ul>
                    <p>Театральная фабрика Кибанова одевает и обувает вот уже много лет танцоров классического и современного танца, в нашей обуви артисты достигли самых высоких вершин танцевального искусства.</p>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-6">
                    <div class="product">
                        <div class="product-img"><img src="img/general-section-8-bal-1.jpg"></div>
                        <div class="product-info"><p class="product-info-title">Пуанты</p>
                            <p class="product-info-price">410 Р</p></div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-6">
                    <div class="product">
                        <div class="product-img"><img src="img/general-section-8-bal-1.jpg"></div>
                        <div class="product-info"><p class="product-info-title">Пуанты</p>
                            <p class="product-info-price">410 Р</p></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section-full" id="general-9">
        <div class="section-gradient"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-align-center title">Адреса магазинов</div>
                <div class="col-md-12 shops-container-ul">
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
        </div>
    </section>
    <script src="https://maps.api.2gis.ru/2.0/loader.js?pkg=full&lazy=true"></script>
@endsection
