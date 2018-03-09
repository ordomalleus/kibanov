import React, { Component } from 'react';
import Modal from 'react-modal';

const customStyles = {
    content : {
        padding: 0
    }
};

/**
 * Компонент показа еденичного товара
 */
export default class ProductModal extends Component {
    constructor(props) {
        super(props);

        this.closeModal = this.closeModal.bind(this);
    }

    closeModal() {
        this.props.closeModal();
    }

    render() {
        return (
            <Modal
                isOpen={this.props.modalIsOpen}
                // onAfterOpen={this.afterOpenModal}
                // onRequestClose={this.closeModal}
                style={customStyles}
                contentLabel="Example Modal"
                ariaHideApp={false}
            >
                <p>{this.props.selectProduct && this.props.selectProduct.name}</p>
                <button onClick={this.closeModal}>sdsdsd</button>
            </Modal>
        );
    }
}