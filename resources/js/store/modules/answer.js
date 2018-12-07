export default {

    state: {
        all: [],
        correctAnswer: '',
        answersCount: 2
    },

    getters: {

        getAnswers: (state) => {
            return state.all
        },

        getCorrectAnswer: state => {
            return state.correctAnswer
        },

        getAnswersCount: state => {
            return state.answersCount
        }
    },

    mutations: {
        addAnswer: (state, text) => {
            if (text) {
                state.all.push(text);
            }
        },

        removeAnswer: (state, text) => {
            state.all = state.all.filter(answer => answer !== text);
        },

        decreaseAnswersCount: (state) => {
            state.answersCount--;
        },

        setCorrectAnswer: (state, text) => {
            state.correctAnswer = state.all.find(answer => answer === text);
        },

        increaseAnswersCount: (state) => {
            state.answersCount++;
        }

    }
}
