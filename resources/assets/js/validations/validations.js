import React from 'react';
import validator from 'validator';

export const required = (value) => {
    if (!value.toString().trim().length) {
        return <span className="has-error">обязательный</span>;
    }
};

export const email = (value) => {
    if (!validator.isEmail(value)) {
        return <span className="has-error">Е-mail адрес введён неверно!</span>
    }
};

export const lt = (value, props) => {
    if (value.toString().trim().length < props.minLength) {
        return <span className="has-error">Неверное количество цифр</span>
    }
};

export const password = (value, props, components) => {
    if (value !== components['confirm'][0].value) {
        return <span className="has-error">Passwords are not equal.</span>
    }
};