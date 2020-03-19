/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
// import '../css/app.css';

// Need jQuery? Install it with "yarn add jquery", then uncomment to import it.
const $ = require('jquery');
window.$ = $;
global.$ = $;
global.jQuery = $;
window.jQuery = $;


require('bootstrap/dist/js/bootstrap');
require('bootstrap-suggest/dist/bootstrap-suggest');

console.log('Hello Webpack Encore! Edit me in assets/js/app.js');

$(document).ready(() => {
  var users = [
    {username: 'lodev09', fullname: 'Jovanni Lo'},
    {username: 'foo', fullname: 'Foo User'},
    {username: 'bar', fullname: 'Bar User'},
    {username: 'twbs', fullname: 'Twitter Bootstrap'},
    {username: 'john', fullname: 'John Doe'},
    {username: 'jane', fullname: 'Jane Doe'},
  ];

  $('.tag-suggestions').suggest('#', {
    data: users,
    map: function(user) {
      return {
        value: user.username,
        text: '<strong>'+user.username+'</strong> <small>'+user.fullname+'</small>'
      }
    }
  });

  console.log('En document ready')
});
