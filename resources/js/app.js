/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
import Vue from 'vue';

import TableComponent from './components/TableComponent';
import DeleteComponent from './components/DeleteComponent';

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/TableComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('table-component', TableComponent);
Vue.component('delete-component', DeleteComponent);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app'
});

const fileInput = document.querySelector('#file-pdf-nl input[type=file]');
fileInput.onchange = () => {
    if (fileInput.files.length > 0) {
        const fileName = document.querySelector('#file-pdf-nl .file-name');
        fileName.textContent = fileInput.files[0].name;
    }
};

const fileInputEn = document.querySelector('#file-pdf-en input[type=file]');
fileInputEn.onchange = () => {
    if (fileInputEn.files.length > 0) {
        const fileName = document.querySelector('#file-pdf-en .file-name');
        fileName.textContent = fileInputEn.files[0].name;
    }
};
