import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import Axios from 'axios';

import ProductModal from './ProductModal';
import CartModal from './CartModal';
import CheckoutModal from './CheckoutModal';

export class AppCart extends Component {

    constructor() {
        super();

        // TODO: переделать хранилище на redux
        this.state = {
            // массив товаров на странице
            products: window.store && window.store.products,
            // выбранный товар
            selectProduct: null,
            // открыта модалка
            modalIsOpen: false,
            // массив карзины
            cartContent: window.store && window.store.cart ? window.store.cart : [],
            // открыта модалка карзины
            modalCartIsOpen: false,
            // открыта модалка формы
            modalCheckoutIsOpen: false
        };

        // Устанавливаем слушатель кастомного события
        this.setCustomEventListener();

        this.closeProductModal = this.closeProductModal.bind(this);
        this.closeCartModal = this.closeCartModal.bind(this);
        this.openCartModal = this.openCartModal.bind(this);
        this.changeAmountCart = this.changeAmountCart.bind(this);
        this.changeDeleteCart = this.changeDeleteCart.bind(this);
        this.sendCheckoutCart = this.sendCheckoutCart.bind(this);
        this.closeCheckoutModal = this.closeCheckoutModal.bind(this);
        this.sendCheckout = this.sendCheckout.bind(this);
    }

    // Находим выбранный товар и стора
    getClickProduct(id) {
        this.state.products.data.forEach((product) => {
            if (product.id === id) {
                this.setState({
                    selectProduct: product,
                    modalProductIsOpen: true
                })
            }
        })
    }

    // Вешаем обработчик на кастомное событие
    setCustomEventListener() {
        document.addEventListener('showProduct', (event) => {
            // получаем id нажатого товара
            const id = +event.target.dataset.idProduct;
            this.getClickProduct(id)
        })
    }

    // Закрытие модалки продукта
    closeProductModal() {
        this.setState({modalProductIsOpen: false})
    }

    // Закрытие модалки карзины
    closeCartModal() {
        this.setState({modalCartIsOpen: false})
    }

    // Открытие модалки карзины
    openCartModal() {
        this.setState({modalCartIsOpen: true})
    }

    // Добавление товара в карзину
    addToCart(productCar) {
        this.setState((prevState) => {
            return {
                cartContent: [...prevState.cartContent, productCar]
            }
        });
    }

    /**
     * Изменение количества товара в корзине
     * @param product - товар
     * @param flag - флаг : добавить 1 / убрать 1
     * @returns {Promise.<void>}
     */
    async changeAmountCart(product, flag){
        // TODO: рефакторнуть, вынисти в одно условие
        if (flag) {
            // Запрос в АПИ на добовление 1 товара
            const response = await Axios.post('/cart/plus', product);
            this.setState({
                cartContent: response.data
            })
        } else {
            if (product.qty > 1) {
                // Запрос в АПИ на списание 1
                const response = await Axios.post('/cart/minus', product);
                this.setState({
                    cartContent: response.data
                })
            }
        }
    }

    /**
     * Удаление товара из корзины
     * @param rowId
     * @returns {Promise.<void>}
     */
    async changeDeleteCart(rowId) {
        // Запрос в АПИ на удаление
        const response = await Axios.post('/cart/delete', rowId);
        this.setState({
            cartContent: response.data
        })
    }

    closeCheckoutModal() {
        this.setState({
            modalCheckoutIsOpen: false
        })
    }

    // Сработает при нажатии "Купить" в карзине
    sendCheckoutCart() {
        this.setState({
            modalCartIsOpen: false,
            modalCheckoutIsOpen: true
        })
    }

    /**
     * Сработает при валидной форме и при нажатии подтверлдить заказ
     * @param formControl - данные с формы
     * @returns {Promise.<void>}
     */
    async sendCheckout(formControl) {
        console.log(formControl);
    }

    render() {
        return (
            <div className="basket-app">
                <span onClick={this.openCartModal}>
                    Корзина
                </span>
                <span className='basket-amount'>{this.state.cartContent.length}</span>
                <ProductModal
                    modalIsOpen={this.state.modalProductIsOpen}
                    closeModal={this.closeProductModal}
                    selectProduct={this.state.selectProduct}
                    addToCart={this.addToCart.bind(this)}
                />
                <CartModal
                    modalIsOpen={this.state.modalCartIsOpen}
                    closeModal={this.closeCartModal}
                    cartContent={this.state.cartContent}
                    changeAmountCart={this.changeAmountCart}
                    changeDeleteCart={this.changeDeleteCart}
                    sendCheckout={this.sendCheckoutCart}
                />
                <CheckoutModal
                    modalIsOpen={this.state.modalCheckoutIsOpen}
                    closeModal={this.closeCheckoutModal}
                    sendCheckout={this.sendCheckout}
                />
            </div>
        );
    }
}

if (document.getElementById('app-cart')) {
    ReactDOM.render(<AppCart />, document.getElementById('app-cart'));
}
