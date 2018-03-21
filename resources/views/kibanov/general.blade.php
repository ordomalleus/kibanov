@extends('kibanov.layout.app')

@section('store')
    <script>
        window.store = {};
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
                <p>Танцуйте, а мы вам поможем!</p></div>
        </div>
    </section>
    <section id="general-2">
        <div class="container">
            <div class="row m-b-30">
                <div class="col-md-4"><span class="rise-text">И</span><span>стория товарной марки "Кибанов" началась в 1995 году, когда поклонник танца Андрей Кибанов организовал мастерскую "Балетная обувь от Кибанова". Основываясь на традициях и мастерстве цехов Пермского театра оперы и балета, бережно сохраняя классические технологии изготовления танцевальной обуви и в то же время развивая и совершенствуя их, применительно к современности, Андрею Кибанову удалось в сравнительно небольшой срок перерасти из мелкого ремесленника в фабриканта.</span>
                </div>
                <div class="col-md-8">
                    <div class="product">
                        <div class="product-img"><img src="img/general-section-2-bal-1.jpg"></div>
                        <div class="product-info"><p class="product-info-title">Балетки для танцев МБО</p>
                            <p class="product-info-price">410 Р</p></div>
                    </div>
                </div>
            </div>
            <div class="row m-b-30">
                <div class="col-md-4">
                    <div class="product">
                        <div class="product-img"><img src="img/general-section-2-bal-2.jpg"></div>
                        <div class="product-info"><p class="product-info-title">Балетки для танцев МБО</p>
                            <p class="product-info-price">410 Р</p></div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="product">
                        <div class="product-img"><img src="img/general-section-2-bal-3.jpg"></div>
                        <div class="product-info"><p class="product-info-title">Балетки для танцев МБО</p>
                            <p class="product-info-price">410 Р</p></div>
                    </div>
                </div>
                <div class="col-md-4">
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
                <div class="col-md-8 m-t-30"><span class="rise-text">Ф</span><span>абрика Кибанова выпускает богатый ассортимент обуви для исполнителей самых разных жанров: для классического танца, народно-характерную, джазовую, для степа и фламенко, бальную, для цирковых представлений и шоу. Обувь "От Кибанова" отличается высоким качеством, комфортностью, и, что очень важно, доступна по цене. Производится только из натуральных материалов, позволяющих дышать ногам — главному инструменту всех танцоров.</span>
                </div>
            </div>
        </div>
    </section>
    <section id="general-3">
        <div class="section-gradient"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-8 m-b-30 general-text-3"><span class="rise-text">К</span><span>аждому танцующему необходимо не только красиво передавать действо, но и грамотно выстраивать положение корпуса, рук и ног. Правильная работа корпуса, рук, головы зависит в большей степени от стараний, усилий, физических возможностей актера, а вот правильная постановка стопы возможна только в качественной профессиональной обуви для танцев. Причем специальная обувь нужна не только для выступления, но и для тренировок.</span>
                </div>
            </div>
        </div>
    </section>
    <section id="general-4">
        <div class="container">
            <div class="row m-b-30">
                <div class="col-md-6">
                    <div class="product">
                        <div class="product-img"><img src="img/general-section-4-bal-1.jpg"></div>
                        <div class="product-info"><p class="product-info-title">Джазовые полуботинки</p>
                            <p class="product-info-price">5500 Р</p></div>
                    </div>
                </div>
                <div class="col-md-6">
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
                <div class="col-md-5 general-5-text-left">Государственный театр оперы и балета «Астана Опера»<br/>
                    Муниципальный театр балета "Щелкунчик" г. Екатеринбург<br/> Екатеринбургский государственный
                    академический театр оперы и балета<br/> Государственный театр оперы и балета Удмуртии город
                    Ижевск<br/>
                    Марийский государственный театр оперы и балета им. Эрика Сапаева<br/> "Премьера" им. Л. Г. Гатова"
                    г.
                    Краснодар<br/> Театр " Балет Евгения Панфилова" г. Пермь<br/> Пермский театр оперы и балета им. П.И.
                    Чайковского<br/> Пермский театр юного зрителя
                </div>
                <div class="col-md-2"></div>
                <div class="col-md-5 general-5-text-right">Пермское государственное хореографическое училище<br/>
                    Самарский
                    академический театр оперы и балета<br/> Академия танца Бориса Эйфмана""Академия танца Бориса
                    Эйфмана<br/> Театр балета им. Л. Якобсона<br/> Академический театр Балета Бориса Эйфмана<br/>
                    Бурятский
                    государственный ордена Ленина академический театр оперы и балета им. н. а. СССР Г. Ц.
                    Цыдынжапова<br/>
                    Колледж- интернат Центр искусств для одаренных детей Севера г. Ханты-Мансийск<br/> Челябинский
                    государственный академический театр оперы и балета им. М.И. Глинки"
                </div>
            </div>
        </div>
    </section>
    <section id="general-6">
        <div class="container">
            <div class="row m-b-30">
                <div class="col-md-4">
                    <div class="product">
                        <div class="product-img"><img src="img/general-section-6-bal-1.jpg"></div>
                        <div class="product-info"><p class="product-info-title">Пуанты сувенирные</p>
                            <p class="product-info-price">5500 Р</p></div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="product">
                        <div class="product-img"><img src="img/general-section-6-bal-2.jpg"></div>
                        <div class="product-info"><p class="product-info-title">Ботинки клоуна</p>
                            <p class="product-info-price">5500 Р</p></div>
                    </div>
                </div>
                <div class="col-md-4 general-6-text"><span class="rise-text">К</span><span>нам обращаются не только танцоры, мы выполняем заказы на сценическую обувь для театров драмы, кукольных театров, ТЮЗов, также изготавливаем достаточно сложную, даже специфичную обувь для цирка. </span>
                    <p>Мы берём заказы на изготовление декораций, бутафории, шьём костюмы для балетных спектаклей и
                        коллективов народного танца.</p></div>
            </div>
        </div>
    </section>
    <section id="general-7">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-align-center title">Аксессуары</div>
                <div class="col-md-6">
                    <div class="product">
                        <div class="product-img"><img src="img/general-section-7-bal-1.jpg"></div>
                        <div class="product-info"><p class="product-info-title">Пуанты</p>
                            <p class="product-info-price">410 Р</p></div>
                    </div>
                </div>
                <div class="col-md-6">
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
                    <p>Несколько советов, которые помогут облегчить выбор:<br/> Обувь должна быть изготовлена из
                        натуральных
                        материалов – кожи, замши, нубука, сатина, прочего;<br/> пара обуви должна соответствовать
                        размеру
                        стопы – нога не должна «болтаться», но и не быть сильно стесненной;<br/> хорошо, если в области
                        пальцев у обуви будет застежка, позволяющая регулировать полноту и ремешок, окружающий ногу для
                        хорошего прилегания стопы;<br/> каблук должен быть наиболее комфортным (как правило, начинающие
                        танцоры берут обувь с 5-сантиметровым каблуком).</p>
                    <p>Наша театральная фабрика одевает и обувает вот уже много лет танцоров классического и
                        современного
                        танца, в нашей обуви артисты достигли самых высоких вершин танцевального искусства.</p></div>
                <div class="col-md-3">
                    <div class="product">
                        <div class="product-img"><img src="img/general-section-8-bal-1.jpg"></div>
                        <div class="product-info"><p class="product-info-title">Пуанты</p>
                            <p class="product-info-price">410 Р</p></div>
                    </div>
                </div>
                <div class="col-md-3">
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
                                    <br/>тел. +7(342) 212-83-41
                                    <br/>Мы "В контакте": vk.com/scena.perm
                                </span>
                            </div>
                        </li>
                        <li class="shops-li" data-gis-id="map-chelabinsk">
                            <span class="shops-li-title">г. Челябинск</span>
                            <div class="shops-li-text">
                                <span>
                                    г. Челябинск, пр. Ленина, д. 77
                                    <br/>тел. +7(351) 265-44-73
                                    <br/>Мы "В контакте": -------
                                </span>
                            </div>
                        </li>
                        <li class="shops-li" data-gis-id="map-spb">
                            <span class="shops-li-title">г. Санкт-Петербург</span>
                            <div class="shops-li-text">
                                <span>
                                    г. САНКТ-ПЕТЕРБУРГ, ул. Гороховая, д. 57
                                    <br/>тел. +7(911) 971-63-44
                                    <br/>Мы "В контакте": -----
                                </span>
                            </div>
                        </li>
                        <li class="shops-li" data-gis-id="map-moscou">
                            <span class="shops-li-title">г. Москва</span>
                            <div class="shops-li-text">
                                <span>
                                    г. Москва, ул. Героев Панфиловцев, д. 8к1
                                    <br/>тел. +7(495) 766-79-10
                                    <br/>Мы "В контакте": ----
                                </span>
                            </div>
                        </li>
                        <li class="shops-li" data-gis-id="map-ekb">
                            <span class="shops-li-title">г. Екатеринбург</span>
                            <div class="shops-li-text">
                                <span>
                                    г. Екатеринбург, ул. Мамина-Сибиряка, д. 102
                                    <br/>тел. +7(343) 355-23-08
                                    <br/>Мы "В контакте": vk.com/scenaekat
                                </span>
                            </div>
                        </li>
                    </ul>
                    <div>
                        <div id="map-perm" class="gis-map-container" style="width:100%; min-height:400px"></div>
                        <div id="map-chelabinsk" class="gis-map-container hidden" style="width:100%; min-height:400px"></div>
                        <div id="map-spb" class="gis-map-container hidden" style="width:100%; min-height:400px"></div>
                        <div id="map-moscou" class="gis-map-container hidden" style="width:100%; min-height:400px"></div>
                        <div id="map-ekb" class="gis-map-container hidden" style="width:100%; min-height:400px"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://maps.api.2gis.ru/2.0/loader.js?pkg=full&lazy=true"></script>
@endsection
