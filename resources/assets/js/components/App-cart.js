import React, { Component } from 'react';
import ReactDOM from 'react-dom';

import ProductModal from './ProductModal';

export class AppCart extends Component {

    constructor() {
        super();

        // TODO: переделать хранилище на redux
        this.state = {
            // массив товаров на странице
            products: window.store.products,
            // выбранный товар
            selectProduct: null,
            // открыта модалка
            modalIsOpen: false
        };

        this.setCustomEventListener();

        this.closeModal = this.closeModal.bind(this);
    }

    // Находим выбранный товар и стора
    getClickProduct(id) {
        this.state.products.data.forEach((product) => {
            if (product.id === id) {
                this.setState({
                    selectProduct: product,
                    modalIsOpen: true
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

    closeModal() {
        this.setState({modalIsOpen: false})
    }

    render() {
        return (
            <div>
                <span>Корзина</span>
                <span className='basket-amount'>10</span>
                <ProductModal
                    modalIsOpen={this.state.modalIsOpen}
                    closeModal={this.closeModal}
                    selectProduct={this.state.selectProduct}
                />
            </div>
        );
    }
}

if (document.getElementById('app-cart')) {
    ReactDOM.render(<AppCart />, document.getElementById('app-cart'));
}
