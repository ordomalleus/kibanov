import React from 'react';

import {control} from 'react-validation';
// https://www.npmjs.com/package/react-input-mask
import InputMask from 'react-input-mask';

// HOC компонент оборачивает валидацию и маску
const Input = ({error, isChanged, isUsed, ...props}) => (
    <div>
        {/*http://sanniassin.github.io/react-input-mask/demo.html*/}
        <InputMask {...props} mask="+7 (999) 999-99-99"/>
        {isChanged && isUsed && error}
    </div>
);

export const InputFormHOC = control(Input);