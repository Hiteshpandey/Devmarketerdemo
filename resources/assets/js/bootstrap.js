/*!
  * Bootstrap v4.1.1 (https://getbootstrap.com/)
  * Copyright 2011-2018 The Bootstrap Authors (https://github.com/twbs/bootstrap/graphs/contributors)
  * Licensed under MIT (https://github.com/twbs/bootstrap/blob/master/LICENSE)
  */

/* Custom Added*/
  window._ = require("lodash");

  try{
    window.$ = window.JQuery = require('jquery');
  }
catch(e){}

window.axios = require('axios');
window.axios.defaults.headers.common['X-Requested-Width'] = 'XMLHttpRequest';

let token = document.head.querySelector('meta[name="csrf-token"]');

if(token){
  window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
}
else{
  console.error('CSRF token not found: https://laravel.com/docs/5.6/csrf#csrf-x-csrf-token');
}
/* Custom Added*/
