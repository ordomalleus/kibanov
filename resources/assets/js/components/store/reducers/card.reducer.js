import {CardActionsTypes} from "../actions/card.action";

const initialState = {
    baz: 0,
    fooBar: true
};

export function CardReducer(state = initialState, actions) {
    const {type, payload} = actions;

    switch (type) {
        case CardActionsTypes.baz:
            return {...state, baz: state.baz + 1};
        case CardActionsTypes.fooBar:
            return {...state, fooBar: payload};
        default:
            return {...state}
    }
}
