require('./bootstrap');

window.Vue = require('vue');

import VueRouter from 'vue-router';
Vue.use(VueRouter);

import VueAxios from 'vue-axios';
import axios from 'axios';

import App from './App.vue';
Vue.use(VueAxios, axios);

import SkillIndexComponent from './components/skill/Index.vue';
import SkillCreateComponent from './components/skill/Create.vue';
import SkillEditComponent from './components/skill/Edit.vue';

const routes = [
    {
        name: 'skill.index',
        path: '/',
        component: SkillIndexComponent
    },
    {
        name: 'skill.create',
        path: '/create',
        component: SkillCreateComponent
    },
    {
        name: 'skill.edit',
        path: '/edit/:id',
        component: SkillEditComponent
    }
];
const router = new VueRouter({
    mode: 'history',
    routes: routes
});

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);

const app = new Vue(Vue.util.extend({ router }, App)).$mount('#app');

