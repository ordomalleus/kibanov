import React, {Component} from 'react';
import Modal from 'react-modal';

import {required, email, lt} from './../validations/validations';
// https://www.npmjs.com/package/react-validation
import Form from 'react-validation/build/form';
import Input from 'react-validation/build/input';
import Textarea from 'react-validation/build/textarea';
import Button from 'react-validation/build/button';
import {InputFormHOC} from './InputFormHOC';

const customStyles = {
    content: {
        padding: '0',
        width: 500,
        maxHeight: '100%',
        overflow: 'auto'
    }
};

/**
 * Компонент показа формы заказа
 */
export default class CheckoutModal extends Component {
    constructor(props) {
        super(props);

        this.closeModal = this.closeModal.bind(this);
    }

    // Закрываем модалку
    closeModal() {
        this.props.closeModal();
    }

    handleSubmit(event) {
        event.preventDefault();
        this.props.sendCheckout(this.form.getValues());
    }

    render() {
        return (
            <Modal
                isOpen={this.props.modalIsOpen}
                style={customStyles}
                ariaHideApp={false}
                className="modal-checkout"
                overlayClassName="overlay-checkout"
            >
                <div className="modal-checkout-content">
                    {!(this.props.orderMessage === null) ?
                        <p className={['modal-checkout-message', this.props.orderMessage ? 'success' : 'error'].join(' ')}>
                            {this.props.orderMessage ? 'Заказ сформирован, с вами скоро свяжутся' : 'Не смогли сформировать заказ по техническим причинам'}
                        </p> : ''}
                    <div className='modal-checkout-title'>Куда доставить ?</div>
                    <Form
                        className="modal-checkout-form"
                        ref={c => { this.form = c }}
                        onSubmit={this.handleSubmit.bind(this)}>
                        <div className="modal-checkout-form-group-one">
                            <label>
                                <span className="required">*</span>Ф.И.О.
                                <Input value='' name='fio' validations={[required]}/>
                            </label>
                        </div>
                        <div className="modal-checkout-form-group">
                            <label>
                                Регион
                                <Input value='' name='region'/>
                            </label>
                            <label>
                                Район
                                <Input value='' name='district'/>
                            </label>
                        </div>
                        <div className="modal-checkout-form-group">
                            <label>
                                Населенный пункт
                                <Input value='' name='town'/>
                            </label>
                            <label>
                                Улица
                                <Input value='' name='street'/>
                            </label>
                        </div>
                        <div className="modal-checkout-form-group">
                            <div className="modal-checkout-form-group-child">
                                <label>
                                    Дом
                                    <Input value='' name='house'/>
                                </label>
                                <label>
                                    Корпус
                                    <Input value='' name='building'/>
                                </label>
                            </div>
                            <div className="modal-checkout-form-group-child">
                                <label>
                                    Квартира
                                    <Input value='' name='apartment'/>
                                </label>
                                <label>
                                    Индекс
                                    <Input value='' name='code'/>
                                </label>
                            </div>
                        </div>
                        <div className="modal-checkout-form-group">
                            <label>
                                <span className="required">*</span>E-mail
                                <Input value='' name='mail' validations={[required, email]}/>
                            </label>
                            <label>
                                <span className="required">*</span>Контактный телефон
                                <InputFormHOC
                                    value=''
                                    name="phone"
                                    minLength={18}
                                    maskChar=" "
                                    validations={[required, lt]}/>
                            </label>
                        </div>
                        <div className="modal-checkout-form-group">
                            <label>
                                Комментарий
                                <Textarea name='comment' value=''/>
                            </label>
                            <Button className="modal-checkout-form-buy">Купить</Button>
                        </div>
                    </Form>
                    <div className='modal-checkout-close' onClick={this.closeModal}/>
                </div>
            </Modal>
        );
    }
}
