<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## Installation
```
laravel new Project
cd Project
npm install

npm install jquery
npm install @fortawesome/fontawesome-free
npm install vue
npm install vue-template
```
## webpack.mix.js
```
mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .browserSync({
        proxy: 'localhost:8000',
        open: false,
        notify: false
    });
```   
## check package.json dependencies
```
"dependencies": {
    "@fortawesome/fontawesome-free": "^5.12.0",
```  
## import fontawesome scss
```
@import '~@fortawesome/fontawesome-free/scss/fontawesome';
@import '~@fortawesome/fontawesome-free/scss/regular';
@import '~@fortawesome/fontawesome-free/scss/solid';
@import '~@fortawesome/fontawesome-free/scss/brands';
```
## launch
```
npm run watch
php artisan serve
```
## search for album.genre on click
Vue interagisce con degli eventi per il passaggio dei parametri tra componenti. 

Nel componente album:

this.$emit('input', search); // emette un evento input e passiamo search come parametro

In albums ritroviamo l'evento @input che chiama la funzione update passando il parametro search ricevuto dal componente album.

Quando non è definito un parametro tra parentesi "decide" l'evento cosa passare.

la funzione update aggiorna il valore di search.
