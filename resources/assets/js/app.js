
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */


 
Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('pop-form', require('./components/PopForm.vue'));
Vue.component('slider-component', require('./components/SliderComponentOne.vue'));

// Vue.component('slider-component-2', require('./components/SliderComponentOne.vue'));

Vue.prototype.$eventHub = new Vue(); // Global event bus

const app = new Vue({
    el: '#app',
    data: {
        slides:[
            {id:'1', title:'in questo momento ci sono', text:'[n° random, > 100] visitatori sul sito', img:'data.png'},
            {id:'2', title:'in data [data odierna]', text:'rimangono soltanto [n° random < 10] prodotti <br/> a prezzo scontato.', img:'calendar.png'},
            {id:'3', title:'data di scadenza della promozione online:', text:'[data odierna]', img:'calendar.png'},
            {id:'4', title:'in [data odierna]', text:'hanno acquistato [n° random > 30]', img:'calendar.png'},
            {id:'5', title:'un ordine è appena stato effettuato da', text:'[città random italiana]', img:'check.png'},   
            {id:'6', title:'alla scadenza della promozione di oggi mancano', text:'[countdown, qualche ora ,\
                <12h]', img:'count.png'},    
    ]
    }
});
