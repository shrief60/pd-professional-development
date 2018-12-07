import Vue from 'vue';
import Vuex from 'vuex';

import question from './modules/question';
import answer from './modules/answer';
import lesson from './modules/lesson';

Vue.use(Vuex);

export const store = new Vuex.Store({
    modules: {
        question,
        answer,
        lesson
    }
});
