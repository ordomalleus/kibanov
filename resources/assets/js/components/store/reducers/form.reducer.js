import {FormActionsTypes} from "../actions/form.actions";

const initialState = {
    foo: 0,
    bar: true
};

export function FormReducer(state = initialState, actions) {
    const {type, payload} = actions;

    switch (type) {
        case FormActionsTypes.foo:
            return {...state, foo: state.foo + 1}
        case FormActionsTypes.bar:
            return {...state, bar: payload}
        default:
            return {...state}
    }
}
