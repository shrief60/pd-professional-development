export default {

    state: {
        token: localStorage.getItem('access_token') || null,
    },

    getters: {
        auth: state => {
            return state.token !== null;
        },
        guest: (_, getters) => {
            return !getters.auth;
        }
    },
    mutations: {
        retrieveToken: (state, token) => {
            state.token = token;
            axios.defaults.headers.common['Authentication'] = token; // for all requests
        },

        destroyToken: (state) => {
            state.token = null;
            axios.defaults.headers.common['Authentication'] = null; // for all requests
        }
    },

    actions: {
        retrieveToken: (context, credentials) => {
            return new Promise((resolve, reject) => {
                if (context.getters.auth) resolve();

                let {
                    username,
                    password
                } = credentials;
                axios.post('/api/login', {
                        username,
                        password
                    })
                    .then(response => {
                        const token = response.data.access_token;
                        localStorage.setItem('access_token', token);
                        context.commit('retrieveToken', token);
                        resolve();
                    })
                    .catch(error => {
                        console.log(error);
                        reject();
                    });
            })
        },

        destroyToken: (context) => {

            return new Promise((resolve, reject) => {
                if (context.getters.guest) resolve();
                axios.post('/api/logout')
                    .then(_ => {
                        localStorage.removeItem('accessToken')
                        context.commit('destroyToken');
                        resolve();
                    })
                    .catch(error => {
                        console.log(error);
                        reject();
                    })

            });

        }
    }
};
