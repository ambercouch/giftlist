
/**
 * First we will load all of this project's JavaScript dependencies which
 * include Vue and Vue Resource. This gives a great starting point for
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example', require('./components/Example.vue'));

Vue.component('giftlistlist', require('./components/GiftListsLists.vue'));
Vue.component('giftlist', require('./components/GiftList.vue'));
Vue.component('gift', require('./components/Gift.vue'));
Vue.component('flashmessage', require('./components/FlashMessage.vue'));
Vue.component('addgift', require('./components/AddGift.vue'));
Vue.component('addgiftlist', require('./components/AddGiftList.vue'));

Vue.component(
    'passport-clients',
    require('./components/passport/Clients.vue')
);

Vue.component(
    'passport-authorized-clients',
    require('./components/passport/AuthorizedClients.vue')
);

Vue.component(
    'passport-personal-access-tokens',
    require('./components/passport/PersonalAccessTokens.vue')
);

Vue.http.interceptors.push((request, next ) => {
    next((response) => {
    if( 'Content-Type' in response.headers
        && response.headers['Content-Type'] == 'application/json' ){
        if( typeof response.data != 'object' ){
            response.data = JSON.parse( response.data );
        }
    }

    if( 'content-type' in response.headers
        && response.headers['content-type'] == 'application/json' ){
        if( typeof response.data != 'object' ){
            response.data = JSON.parse( response.data );
        }
    }
});
});



var store = {
    debug: true,
    state:{
        giftlists: [],
        giftlist: [],
        gift : [],
        flashMessage : ''
    },
    // updateState: function () {
    //     //this.state[prop] = value;
    //     console.log('update that state');
    // },
    // setGiftlistsAction: function (newValue) {
    //     this.debug && console.log('setMessageAction triggered with', newValue)
    //     this.state.giftlists = newValue
    // },
    // clearMessageAction: function () {
    //     // this.debug && console.log('clearMessageAction triggered')
    //     // this.state.message = ''
    // }
}





const app = new Vue({
    el: '#app',
    data: {
        shared: store,
    },
    methods: {
        updateGiftLists: function (giftLists) {
            this.shared.state.giftlists = giftLists;
            console.log('update gls');
        },
        refreshGiftList: function (giftList) {
            var self = this;
            this.$http.get('api/giftlists')
                .then(response => {
                    self.shared.state.giftlists = response.data.data.data;
                });
        },
        updateGiftList: function (giftList) {
            this.shared.state.giftlist = giftList;
        },
        updateFlashMessage: function (message) {
            this.shared.state.flashMessage = message;
            console.log('update fm');
        },
    }
});


