export default {

    state: {
        player: null,
    },

    getters: {
        getVideoPlayer: (state) => {
            return state.player
        },

    },

    mutations: {
        setVideoPlayer: (state, player) => {
            state.player = player;
        },

    }
}
