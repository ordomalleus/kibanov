import {createStore, combineReducers, applyMiddleware, compose} from 'redux'
import freeze from 'redux-freeze';

import {FormReducer} from "./reducers/form.reducer";
import {CardReducer} from "./reducers/card.reducer";

const combineStore = combineReducers({
    card: CardReducer,
    form: FormReducer
});

const composeEnhancers = window.__REDUX_DEVTOOLS_EXTENSION_COMPOSE__ || compose;

const logger = function ({dispatch, getState}) {
    return next => action => {

        return next(action);
    }
};

export const store = createStore(combineStore, composeEnhancers(applyMiddleware(logger, freeze)));
