/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require("./bootstrap");

window.Vue = require("vue");

//moment js
import moment from "moment";
// moment().format();
Vue.filter("timeformat", function(arg) {
    return moment(arg).format("MMM Do YY");
});

import InstantSearch from 'vue-instantsearch';

Vue.use(InstantSearch);

// import Turbolinks from "turbolinks";
// Turbolinks.start();

// document.addEventListener("turbolinks:load", () => {
//     new Vue({
//         el: "#app",

//         beforeMount() {
//             if (this.$el.parentNode) {
//                 document.addEventListener(
//                     "turbolinks:visit",
//                     () => this.$destroy(),
//                     { once: true }
//                 );

//                 this.$originalEl = this.$el.outerHTML;
//             }
//         },
//         destroyed() {
//             this.$el.outerHTML = this.$originalEl;
//         }
//     });
// });

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component(
    "example-component",
    require("./components/ExampleComponent.vue").default
);
// Vue.component("tweet", require("./components/Tweet.vue").default);
// Vue.component("addcommemt", require("./components/AddComment.vue").default);
// Vue.component("getcommemt", require("./components/GetComment.vue").default);
Vue.component(
    "notifications",
    require("./components/Notifications.vue").default
);

Vue.component(
    "instant-search",
    require("./components/InstantSearch.vue").default
);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

document.addEventListener("turbolinks:load", () => {
    const app = new Vue({
        el: "#app"
    });
});
