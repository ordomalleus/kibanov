import React from 'react';

import {button } from 'react-validation';

const Button = ({ hasErrors, formSubmitDisabled = false, ...props }) => {
    return (
        <button {...props} disabled={hasErrors || formSubmitDisabled} />
    );
};

export const ButtonFormHOC = button(Button);
