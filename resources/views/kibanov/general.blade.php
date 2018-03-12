@extends('kibanov.layout.app')

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
        <div class="container-fluid">
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
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4 col-md-offset-8 m-b-30 general-text-3"><span class="rise-text">К</span><span>аждому танцующему необходимо не только красиво передавать действо, но и грамотно выстраивать положение корпуса, рук и ног. Правильная работа корпуса, рук, головы зависит в большей степени от стараний, усилий, физических возможностей актера, а вот правильная постановка стопы возможна только в качественной профессиональной обуви для танцев. Причем специальная обувь нужна не только для выступления, но и для тренировок.</span>
                </div>
            </div>
        </div>
    </section>
    <section id="general-4">
        <div class="container-fluid">
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
        <div class="container-fluid">
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
        <div class="container-fluid">
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
        <div class="container-fluid">
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
        <div class="container-fluid">
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
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 text-align-center">Адреса магазинов</div>
            </div>
        </div>
    </section>
@endsection
