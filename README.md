# LinkTree Clone API

Done with guides from excellent tutorial at [John Weeks Dev](https://www.youtube.com/@johnweeksdev)'s YouTube channel.

## Steps needed to accomplish this app

### Create Laravel template project
```
composer create-project laravel/laravel linktree-clone-api
```

### Install Laravel Breeze

```
cd linktree-clone-api
composer require laravel/breeze --dev
```

### Publish resources
Publish the authentication views, routes, controllers, and other resources to your application
```
php artisan breeze:install
```
choose `api` option as frontend stack

### Run project
```
php artisan serve
```
