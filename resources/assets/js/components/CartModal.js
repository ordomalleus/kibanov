import React, {Component} from 'react';
import Modal from 'react-modal';

const customStyles = {
    content: {
        padding: '0 0 30px 0',
        width: 800,
        maxHeight: '100%',
        overflow: 'auto'
    }
};

// Путь до картинок
const pathToImagesProduct = window.location.origin + '/products/images/';

/**
 * Компонент показа карзины
 */
export default class CartModal extends Component {
    constructor(props) {
        super(props);

        // TODO: переделать хранилище на redux
        this.state = {};

        this.closeModal = this.closeModal.bind(this);
    }

    // Закрываем модалку
    closeModal() {
        this.props.closeModal();
    }

    // Срабатывает при изменении колличества товара
    amountClick(product, flag) {
        this.props.changeAmountCart(product, flag)
    }

    deleteClick(rowId) {
        this.props.changeDeleteCart({rowId: rowId});
    }

    totalPrice() {
        return this.props.cartContent.reduce((sum, val) => {
            return sum + val.subtotal;
        }, 0)
    }

    render() {
        console.log(this.props.cartContent);
        // позиция картинок в модалке
        const productImgStyle = (val) => {
            const product = val.options.product;

            return {
                backgroundImage: product && 'url(' + pathToImagesProduct + product.img_name + ')',
                backgroundPosition: '50% 50%',
                backgroundRepeat: 'no-repeat',
                backgroundSize: 'cover',
                // backgroundSize: 'contain',
                width: '120px',
                height: '120px'
            }
        };

        return (
            <Modal
                isOpen={this.props.modalIsOpen}
                style={customStyles}
                ariaHideApp={false}
                className="modal-cart"
                overlayClassName="overlay-cart"
            >
                <div className="modal-cart-content">
                    <div className='modal-cart-title'>Корзина</div>
                    {this.props.cartContent.map((val, i) => {
                        return <div key={i} className="modal-cart-product">
                            <div
                                className="modal-cart-product-img"
                                style={productImgStyle(val)}/>
                            <div className="modal-cart-product-info">
                                <div className="modal-cart-product-info-name">{val.name}</div>
                                <div className="modal-cart-product-info-attributes">
                                    {val.options.selectAttributes.map((selAttr, i) => {
                                        return <div
                                            key={i}
                                            className="info-attribute-container">
                                            <span>- {selAttr.type}: </span>
                                            <span>{selAttr.val}</span>
                                        </div>
                                    })}
                                </div>
                                <div className="modal-cart-product-info-price">1 шт: {val.price} Р</div>
                            </div>
                            <div className="modal-cart-product-control">
                                <div className="modal-cart-product-subtotal">Итого: {val.subtotal} р</div>
                                <div className='modal-cart-product-amount'>
                                    <span
                                        className="modal-cart-product-amount-procedure glyphicon-minus"
                                        onClick={this.amountClick.bind(this, val, false)}
                                    />
                                    <span className="modal-cart-product-amount-text">{val.qty}</span>
                                    <span
                                        className="modal-cart-product-amount-procedure glyphicon-plus"
                                        onClick={this.amountClick.bind(this, val, true)}
                                    />
                                </div>
                                <div
                                    className='modal-cart-product-delete'
                                    onClick={this.deleteClick.bind(this, val.rowId)}>
                                    удалить
                                </div>
                            </div>
                        </div>;
                    })}
                    <div className="modal-cart-total">
                        <span className="modal-cart-total-price">{this.totalPrice()} Р</span>
                        <span className="modal-cart-total-buy">Купить</span>
                    </div>
                    <div className='modal-cart-close' onClick={this.closeModal}/>
                </div>
            </Modal>
        );
    }
}
