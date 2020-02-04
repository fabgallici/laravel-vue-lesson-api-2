require('./bootstrap');

window.Vue = require('vue');

$ = require('jquery');

function init() {
  
  new Vue({
    el: "#app"
  });

  console.log('hello world');



};

$(document).ready(init);