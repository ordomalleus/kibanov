import React, { Component } from 'react';

// Функция сортировки (ставит в начле если есть: Размер(списком) -> Цвет(списком) -> все остальное )
const sort = (a, b) => {
    if ((a.product_group_attributes.type === 'Размер одежды'
            || a.product_group_attributes.type === 'Размер одежды списком')
        && (b.product_group_attributes.type === 'Цвет'
            || b.product_group_attributes.type === 'Цвет списком')) {
        return -1;
    }
    if ((a.product_group_attributes.type === 'Цвет'
            || a.product_group_attributes.type === 'Цвет списком')
        && (b.product_group_attributes.type === 'Размер одежды'
            || b.product_group_attributes.type === 'Размер одежды списком')) {
        return 1;
    }
    if (a.product_group_attributes.type === 'Размер одежды'
        || a.product_group_attributes.type === 'Размер одежды') {
        return -1;
    }
    if (a.product_group_attributes.type === 'Цвет'
        || a.product_group_attributes.type === 'Цвет списком') {
        return -1;
    }
    if (b.product_group_attributes.type === 'Цвет'
        || b.product_group_attributes.type === 'Цвет списком') {
        return 1;
    }
    return a - b;
};


/**
 * Компонент показа атрибутов товара
 */
export default class ProductAttributes extends Component {
    constructor(props) {
        super(props);

        // TODO: переделать хранилище на redux
        this.state = {
            // сортируем артирбуты и добовляем новые поля
            attributes: [...this.props.attributes]
            .sort(sort)
            .map((val) => {
                const newAttrVal = val.product_group_attributes.product_group_attributes_value.map((valAttr, i) => {
                    // устанавливаем у 1 элемента выбор
                    const select = i === 0 ? true : false;
                    return { ...valAttr, select }
                });
                // заменяем масив новым
                // TODO: найти лучше решение
                val.product_group_attributes.product_group_attributes_value = newAttrVal;

                return val;
            })
        };

        // Устанаовим первичные значения
        this.selectAttributes();
    }

    // Пересчитаем атрибуты при выборе
    reselectAttribute(iVal, iAttrVal) {
        // находим выбраный атрибут и меняем его свойства
        this.setState({
            attributes: [...this.state.attributes.map((val, i) => {
                if (i === iVal) {
                    return {
                        ...val, product_group_attributes: {
                            ...val.product_group_attributes,
                            product_group_attributes_value: val.product_group_attributes.product_group_attributes_value
                            .map((attrVal, iAtVal) => {
                                return { ...attrVal, select: iAtVal === iAttrVal ? true : false };
                            })
                        }
                    }
                }
                return val;
            })]
        }, () => {
            // обновляем выбранные атрибуты
            this.selectAttributes();
        });
    }

    // Рендер единичного атрибута
    renderAttribute(val, iVal) {
        const groupAttributes = val.product_group_attributes;
        const groupAttributesValue = val.product_group_attributes.product_group_attributes_value;

        switch (val.product_group_attributes.type) {
            case 'Размер одежды':
            case 'Размер обуви':
                return <div key={val.id} className="product-attributes-container">
                    {/*<p className="product-attributes-container-name">{groupAttributes.type}</p>*/}
                    <p className="product-attributes-container-name">Размер</p>
                    <ul className="product-attributes-container-ul product-attributes-container-size">
                        {groupAttributesValue.map((attrVal, iAttrVal) => {
                            return <li key={attrVal.id}
                                       onClick={this.reselectAttribute.bind(this, iVal, iAttrVal)}
                                       className={'product-attributes-container-li' +
                                       (attrVal.select ? ' product-attributes-container-li-select' : '')}>
                                <span
                                    className='product-attributes-container-li-val'>
                                    {attrVal.attributes_directory_value.name}
                                </span>
                            </li>;
                        })}
                    </ul>
                </div>;
                break;
            case 'Цвет':
                return <div key={val.id} className="product-attributes-container">
                    <p className="product-attributes-container-name">{groupAttributes.type}</p>
                    <ul className="product-attributes-container-ul product-attributes-container-color">
                        {groupAttributesValue.map((attrVal, iAttrVal) => {
                            return <li key={attrVal.id}
                                       onClick={this.reselectAttribute.bind(this, iVal, iAttrVal)}
                                       className={'product-attributes-container-li' +
                                       (attrVal.select ? ' product-attributes-container-li-select' : '')}
                                       title={attrVal.attributes_directory_value.name}>
                                <span
                                    className='product-attributes-container-li-val'>
                                    <span
                                        style={{ backgroundColor: attrVal.attributes_directory_value.value }}
                                        className='product-attributes-container-li-val-color'
                                    />
                                </span>
                            </li>;
                        })}
                    </ul>
                </div>;
            default:
                const typeString = (type) => {
                    let result = '';
                    switch (type) {
                        case 'Цвет списком':
                            result = 'Цвет';
                            break;
                        case 'Размер одежды списком':
                        case 'Размер обуви списком':
                        case 'Размер аксессуаров':
                            result = 'Размер';
                            break;
                        default:
                            result = type
                    }
                    return result;
                };

                return <div key={val.id} className="product-attributes-container">
                    {/*<p className="product-attributes-container-name">{groupAttributes.type}</p>*/}
                    <p className="product-attributes-container-name">{typeString(groupAttributes.type)}</p>
                    <ul className="product-attributes-container-ul">
                        {groupAttributesValue.map((attrVal, iAttrVal) => {
                            return <li key={attrVal.id}
                                       onClick={this.reselectAttribute.bind(this, iVal, iAttrVal)}
                                       className={'product-attributes-container-li' +
                                       (attrVal.select ? ' product-attributes-container-li-select' : '')}>
                                {attrVal.attributes_directory_value.name}
                            </li>;
                        })}
                    </ul>
                </div>;
        }
    };

    // Формирует массив выбраных значений и отправляет на вверх через this.props.onSelectAttributs
    selectAttributes() {
        const result = [];

        this.state.attributes.map((val) => {
            let valAttrObj = null;

            val.product_group_attributes.product_group_attributes_value.map((valAttr) => {
                if (valAttr.select) {
                    valAttrObj = valAttr;
                }
            });

            const objResult = {
                type: val.product_group_attributes.type,
                name: val.product_group_attributes.name,
                val: valAttrObj.attributes_directory_value.name,
                price: valAttrObj.price,
                options: valAttrObj.attributes_directory_value.value
            };

            result.push(objResult);
        });

        this.props.onSelectAttributs(result);
    }

    render() {
        return (
            <div className="modal-product-attributes">
                {this.state.attributes.map((val, i) => {
                    return this.renderAttribute(val, i);
                })}
            </div>
        );
    }
}