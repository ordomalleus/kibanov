// Вешаем кастомное событие при клике на товар для вызова модалки с показом товара
const elements = document.getElementsByClassName('product-info-title');
for (let element of elements) {
    element.addEventListener('click', (event) => {
        // Создаем кастомное событие
        const newEvent = new Event('showProduct', {bubbles: true, cancelable: true});
        // кидаем событие с нужного элемента
        event.target.dispatchEvent(newEvent);
    });
}

// js для меню каталога
const catalogs = document.getElementsByClassName('catalog-list-parent');
for(let catalog of catalogs) {
    // вешаем обработчик клика
    catalog.addEventListener('click', (event) => {
        // если нажали именно на родительском каталоге
        if(event.target.classList.contains('catalog-list-parent-href')) {
            const ulChild = catalog.getElementsByClassName('catalog-list-child');
            ulChild[0].classList.toggle('hidden')
        }
    });
    // удаляем класс hidden если попали в дочернюю категорию
    const li = catalog.getElementsByClassName('active');
    if (li.length > 0) {
        const hidden = catalog.getElementsByClassName('hidden');
        hidden[0].classList.remove('hidden');
    }
}