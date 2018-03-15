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