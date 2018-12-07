export default {
    state: {
        text: null,
        type: null,
        all: [],
        modal: null
    },

    getters: {
        getQuestionType: state => {
            return state.type
        },
        getQuestions: state => {
            return state.all
        },
        getQuestionsTimes: state => {
            return state.all.map(question => {
                return {
                    time: question.time,
                    showed: false
                };
            });
        },
        getQuestionModal: state => {
            return state.modal;
        }
    },

    mutations: {

        setTQuestionText: (state, text) => {
            state.text = text;
        },

        setQuestionType: (state, type) => {
            state.type = type;
        },

        setQuestions: (state, questions) => {
            state.all = questions;
        },

        getQuestionsByTime: (state, time) => {
            return state.all.find(question => question.time == time);
        },

        removeQuestion: (state, index) => {
            state.all.splice(index, 1);
        }
    }
}
