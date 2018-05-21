import React, { Component } from 'react';


// Путь до картинок
const pathToImagesProduct = window.location.origin + '/products/images/_x400/';

export default class ProductImages extends Component {
    constructor(props) {
        super(props);

        // TODO: переделать хранилище на redux
        this.state = {
            // массив всех картинок
            allImages: [],
            selectImage: 0
        };
    }

    componentWillReceiveProps(nextProps) {
        if (nextProps.selectProduct) {
            this.setState({
                allImages: [nextProps.selectProduct.img_name, ...nextProps.selectProduct.product_images.map((img) => {
                    return img.img_name;
                })]
            })
        }
    }

    selectImages(i) {
        this.setState({
            selectImage: i
        })
    }

    render() {
        // позиция картинки
        const productImgStyle = {
            backgroundImage: this.props.selectProduct &&
            this.state.allImages.length &&
            'url(' + pathToImagesProduct + this.state.allImages[this.state.selectImage] + ')',
            backgroundPosition: '50% 50%',
            backgroundRepeat: 'no-repeat',
            backgroundSize: 'cover',
            width: '100%',
            height: '400px'
        };

        return (
            <div className="modal-product-img" style={productImgStyle}>
                <div className="modal-product-img__lists">
                    {this.state.allImages.map((name, i) => {
                        return <div key={i}
                                    className="lists__container"
                                    style={{
                                        backgroundImage: 'url(' + pathToImagesProduct + name + ')',
                                        backgroundPosition: '50% 50%',
                                        backgroundRepeat: 'no-repeat',
                                        backgroundSize: 'cover',
                                        width: '75px',
                                        height: '75px'
                                    }}
                                    onClick={this.selectImages.bind(this, i)}>
                        </div>
                    })}
                </div>
            </div>
        );
    }
}
