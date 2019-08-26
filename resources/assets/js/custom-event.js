// Вешаем кастомное событие при клике на товар для вызова модалки с показом товара
const elements = document.getElementsByClassName('product');
for (let element of elements) {
    element.addEventListener('click', (event) => {
        // Создаем кастомное событие
        // const newEvent = new Event('showProduct', {bubbles: true, cancelable: true});
        // TODO: для ie11
        const newEvent = new CustomEvent('showProduct', {bubbles: true, cancelable: true});

        // кидаем событие с нужного элемента
        event.target.dispatchEvent(newEvent);
    });
}

//======================================================================================================================
// js для меню каталога кликер
const toggles = document.getElementsByClassName('catalog-list-parent-toggle');
for(let toggle of toggles) {
    // вешаем обработчик клика
    toggle.addEventListener('click', (event) => {
        // Поднимимся до родителя и найдем прямого потомка на 1 уровень ниже меню
        const catalogListChild = toggle.parentElement.getElementsByClassName('catalog-list-child');
        // Найдем только непосредственного потомка 1 уровня
        const childCatalogListChild = Array.prototype.filter.call(catalogListChild, (elem) => {
            return elem.parentElement === event.target.parentElement;
        })[0];
        // Если нашли (хотя всегда должны найти) то переключем у него клас hidden
        if (childCatalogListChild) {
            childCatalogListChild.classList.toggle('hidden');
        }
    });
}

// js для меню каталога уберем скрытые при заходе на страницу
const catalogs = document.getElementsByClassName('catalog-list-parent');
for(let catalog of catalogs) {
    // удаляем класс hidden если попали в дочернюю категорию
    const li = catalog.getElementsByClassName('active');
    if (li.length > 0) {
        const hidden = catalog.getElementsByClassName('hidden');
        if (hidden.length > 0) {
            hidden[0].classList.remove('hidden');
        }
    }
}
//======================================================================================================================

// js для переключения карт
const mapArr = [
    {
        id: 'map-perm',
        centerMap: [58.01732, 56.24686],
        centerPopup: [58.01732, 56.24686],
        popupText: 'г. Пермь, ул. Советская, д. 22',
        map: null
    },
    {
        id: 'map-chelabinsk',
        centerMap: [55.159117, 61.377238],
        centerPopup: [55.159117, 61.377238],
        popupText: 'г. Челябинск, пр. Ленина, д. 77',
        map: null
    },
    {
        id: 'map-spb',
        centerMap: [59.933700, 30.333821],
        centerPopup: [59.932624, 30.333821],
        popupText: 'г. САНКТ-ПЕТЕРБУРГ, ул. Крылова, д. 2',
        map: null
    },
    {
        id: 'map-kazan',
        centerMap: [55.79574, 49.128767],
        centerPopup: [55.79574, 49.128767],
        popupText: 'г. Казань, ул. Карла Маркса, д. 48',
        map: null
    },
    {
        id: 'map-ekb',
        centerMap: [56.835394, 60.619246],
        centerPopup: [56.835394, 60.619246],
        popupText: 'г. Екатеринбург, ул. Мамина-Сибиряка, д. 102',
        map: null
    },
    {
        id: 'map-eshkarola',
        centerMap: [56.633311, 47.890007],
        centerPopup: [56.633311, 47.890007],
        popupText: 'г. Йошкар-Ола, ул. Комсомольская, д. 130',
        map: null
    },
    {
        id: 'map-krasnodar',
        centerMap: [45.023034, 38.973993],
        centerPopup: [45.023034, 38.973993],
        popupText: 'г. Краснодар, ул. Ленина, д. 54',
        map: null
    }
];
const crateMap = (id = 'map-perm') => {
    const targetId = mapArr.filter((item) => {
        if (item.id === id) {
            return item;
        }
    })[0];

    if (window.DG) {
        DG.then(function () {
            let map;

            // логика для предотврощени повтороного создания карты
            // TODO: покапать апи и найти метод удаления, чтоб по нормальному перестраивать карту
            if (targetId.map !== null) {
                map = targetId.map;
            } else {
                map = targetId.map = DG.map(targetId.id, {
                    center: targetId.centerMap,
                    // если карта Питера то отдалим зум
                    zoom: id === 'map-spb' ? 16 : 17
                });

                DG.marker(targetId.centerPopup).addTo(map);
                DG.popup()
                    .setLatLng(targetId.centerPopup)
                    .setContent(targetId.popupText)
                    .openOn(map);
            }
        });
    }
};
const map = document.getElementsByClassName('shops-li');
for (let element of map) {
    element.addEventListener('click', (event) => {
        // убираем активный класс
        document.getElementsByClassName('shops-li active')[0].classList.remove('active');
        // добавляем текущей ноде активный класс
        event.currentTarget.classList.add('active');

        // получаем id контейнера карты
        const mapId = event.currentTarget.dataset.gisId;

        // добавляем всем контейнерам
        const mapContainer = document.getElementsByClassName('gis-map-container');
        for (let elemCon of mapContainer) {
            if(!elemCon.classList.contains('hidden')) {
                elemCon.classList.add('hidden');
            }
        }
        // удаляем у одного контейнера скрытие
        document.getElementById(mapId).classList.remove('hidden');
        // по новой строит карту
        crateMap(mapId);
    });
}
// первичный вызов карты
crateMap();



// переключения меню в мобильной версии
const menu = document.getElementById('toggle-menu');
menu.addEventListener('click', (event) => {
    document.getElementsByClassName('nav-menu-left')[0].classList.toggle('hidden-menu-sm');
    document.getElementsByClassName('nav-menu')[0].classList.toggle('background-nav-menu-sm');
});
