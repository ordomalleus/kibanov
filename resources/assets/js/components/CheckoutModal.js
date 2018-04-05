import React, {Component} from 'react';
import Modal from 'react-modal';

import {required, email, lt} from './../validations/validations';
// https://www.npmjs.com/package/react-validation
import Form from 'react-validation/build/form';
import Input from 'react-validation/build/input';
import Textarea from 'react-validation/build/textarea';
import Button from 'react-validation/build/button';
import Select from 'react-validation/build/select';
import {MailFormHOC} from './MailFormHOC';
import {PickupFormHOC} from './PickupFormHOC';
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

        this.form = {};
        this.state = {
            // способы доставки список
            delivery: [
                {
                    name: 'Самовывоз',
                    select: false,
                    val: 0
                },
                {
                    name: 'Доставка почтой',
                    select: true,
                    val: 1
                },
                // {
                //     name: 'Заказной доставкой',
                //     select: false,
                //     val: 2
                // }
            ],
            // выбранный способ доставки. по умолчанию почтой.
            selectDelivery: {
                name: 'Доставка почтой',
                select: true,
                val: 1
            }
        };

        this.closeModal = this.closeModal.bind(this);
        this.handleSubmit = this.handleSubmit.bind(this);
        this.getForm = this.getForm.bind(this);
    }

    // Закрываем модалку
    closeModal() {
        this.props.closeModal();
    }

    handleSubmit(event) {
        const delivery = this.state.selectDelivery.val;
        event.preventDefault();
        this.props.sendCheckout(this.form[delivery].getValues(), delivery);
    }

    getForm(node) {
        this.form[this.state.selectDelivery.val] = node;
    }

    selectDelivery(val) {
        if (this.state.selectDelivery.val === val.val) {
            return;
        }

        this.setState({
            delivery: [...this.state.delivery.map((value) => {
                return {...value, select: val.val === value.val ? true : false}
            })],
            selectDelivery: val
        });
    }

    renderForm() {
        switch (this.state.selectDelivery.val) {
            case 0:
                return <PickupFormHOC
                    className="modal-checkout-form"
                    ref={this.getForm}
                    onSubmit={this.handleSubmit}>
                    <div className="modal-checkout-form-group-one">
                        <label>
                            <span className="required">*</span>Ф.И.О.
                            <Input value='' name='fio' validations={[required]}/>
                        </label>
                    </div>
                    <div className="modal-checkout-form-group-one">
                        <div className='label-form'>
                            <span className="required">*</span>Выбор магазина
                            <Select name='city' value='' validations={[required]}>
                                <option value=''>Не выбран</option>
                                <option value='г. Пермь,  ул. Советская, 22'>г. Пермь, ул. Советская, 22</option>
                                <option value='г. Челябинск, пр.Ленина, 77'>г. Челябинск, пр.Ленина, 77</option>
                                <option value='г. Санкт-Петербург,  ул. Крылова, 2'>г. Санкт-Петербург, ул. Крылова, 2
                                </option>
                                <option value='г. Казань, ул. Карла Маркса, 48'>г. Казань, ул. Карла Маркса, 48</option>
                                <option value='г. Краснодар,  ул. Ленина, 51'>г. Краснодар, ул. Ленина, 51</option>
                                <option value='г. Екатеринбург,  ул. Мамина-Сибиряка, 102'>г. Екатеринбург, ул.
                                    Мамина-Сибиряка, 102
                                </option>
                                <option value='г. Йошкар-Ола,  ул. Комсомольская, 130'>г. Йошкар-Ола, ул. Комсомольская,
                                    130
                                </option>
                            </Select>
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
                </PickupFormHOC>
            case 1:
                return <MailFormHOC
                    className="modal-checkout-form"
                    ref={this.getForm}
                    onSubmit={this.handleSubmit}>
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
                </MailFormHOC>
                break;
        }
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
                    <div className='modal-checkout-select'>
                        {this.state.delivery.map((val, i) => {
                            return <div key={i} className='modal-checkout-select-group'
                                        onClick={this.selectDelivery.bind(this, val)}>
                                <div className={'modal-checkout-select-group-flag' + (val.select ? ' select' : '')}>
                                    <div className='modal-checkout-select-group-flag-outer-circle'></div>
                                    <div className='modal-checkout-select-group-flag-inner-circle'></div>
                                </div>
                                <div className='modal-checkout-select-group-name'>{val.name}</div>
                            </div>
                        })}
                    </div>
                    {this.renderForm()}
                    <div className='modal-checkout-close' onClick={this.closeModal}/>
                </div>
            </Modal>
        );
    }
}
