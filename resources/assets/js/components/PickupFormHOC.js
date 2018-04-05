import React from 'react';

import {form} from 'react-validation';

const Form = ({ getValues, validate, validateAll, showError, hideError, children, ...props }) => (
    <form {...props}>{children}</form>
);

export const PickupFormHOC = form(Form);