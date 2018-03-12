import React, { Component } from 'react';
import Modal from 'react-modal';
import Axios from 'axios';
import ProductAttributes from './ProductAttributes'

const customStyles = {
    content : {
        padding: '0 0 30px 0',
        width: 600,
        maxHeight: '100%',
        overflow: 'auto'
    }
};

// Путь до картинок
const pathToImagesProduct = window.location.origin + '/products/images/';

/**
 * Компонент показа еденичного товара
 */
export default class ProductModal extends Component {
    constructor(props) {
        super(props);

        // TODO: переделать хранилище на redux
        this.state = {
            // колличество товара
            amount: 1,
            // массив выбранных атрибутов
            selectAttributes: [],
            // окончательная цена
            price: null
        };

        this.closeModal = this.closeModal.bind(this);
    }

    // Закрываем модалку
    closeModal() {
        this.setState({
            amount: 1
        });
        this.props.closeModal();
    }

    // Срабатывае при выборе значения атрибута
    selectAttributes(arr) {
        this.setState({
            selectAttributes: arr,
            price: this.calcPrice(arr) * this.state.amount
        })
    }

    // Пересчитывает стоимость
    calcPrice(arr) {
        let result = this.props.selectProduct.price;
        arr.map((val) => {
            result = result + val.price;
        });
        return result;
    }

    // Срабатывает при изменении колличества товара / пересчитывает стоимость
    amountClick(val) {
        if (val) {
            this.setState({
                amount: this.state.amount + 1,
                price: this.state.price + this.calcPrice(this.state.selectAttributes)
            })
        } else {
            if (this.state.amount > 1) {
                this.setState({
                    amount: this.state.amount - 1,
                    price: this.state.price - this.calcPrice(this.state.selectAttributes)
                })
            }
        }
    }

    apiCartAdd(productCar) {
        return Axios.post('/cart/add', productCar);
        // return Axios.get('api/qwe');
    }

    // срабатывает при добовлении товара в карзину
    async addProductToCart() {
        // формируем объект для карзины
        const productCar = {
            ...this.state,
            id: this.props.selectProduct.id,
            product: {...this.props.selectProduct},
            priceOne: this.calcPrice(this.state.selectAttributes),
        };
        const response = await this.apiCartAdd(productCar);
        console.log(response);
    }

    render() {

        // позиция картинок в модалке
        const productImgStyle = {
            backgroundImage: this.props.selectProduct && 'url(' + pathToImagesProduct + this.props.selectProduct.img_name + ')',
            backgroundPosition: '50% 50%',
            backgroundRepeat: 'no-repeat',
            backgroundSize: 'cover',
            // backgroundSize: 'contain',
            width: '100%',
            height: '400px'
            // height: '250px'
        };

        return (
            <Modal
                isOpen={this.props.modalIsOpen}
                style={customStyles}
                ariaHideApp={false}
                className="modal-product"
                overlayClassName="overlay-product"
            >
                <div className="modal-product-content">
                    <div
                        className="modal-product-img"
                        style={productImgStyle}>
                    </div>
                    <div className="modal-product-info">
                        <h4 className="modal-product-name">{this.props.selectProduct && this.props.selectProduct.name}</h4>
                        <p className="modal-product-description">
                            {this.props.selectProduct && this.props.selectProduct.description}
                        </p>
                    </div>
                    { this.props.selectProduct ? (
                        <ProductAttributes
                            attributes={this.props.selectProduct.attributes}
                            onSelectAttributs={this.selectAttributes.bind(this)}
                        />) : ''
                    }
                    <div className='modal-product-control'>
                        <span className='modal-product-price'>{this.state.price} Р</span>
                        <div className='modal-product-amount'>
                            <span
                                className="modal-product-amount-procedure glyphicon-minus"
                                onClick={this.amountClick.bind(this, false)}
                            />
                            <span className="modal-product-amount-text">{this.state.amount}</span>
                            <span
                                className="modal-product-amount-procedure glyphicon-plus"
                                onClick={this.amountClick.bind(this, true)}
                            />
                        </div>
                        <div className='modal-product-cart'
                            onClick={this.addProductToCart.bind(this)}>
                            В коризину
                        </div>
                    </div>
                    <div className='modal-product-close' onClick={this.closeModal}/>
                </div>
            </Modal>
        );
    }
}