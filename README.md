# LinkTree Clone API

Done with guides from excellent tutorial at [John Weeks Dev](https://www.youtube.com/@johnweeksdev)'s YouTube channel.
Original project code is [here](https://github.com/John-Weeks-Dev/linktree-clone-api)

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


### App Setup (locally)
Install project dependencies
```
composer install 
```
Add project environment settings:
```
cp .env.example .env 
```
Create a DATABASE. Make sure the DB_DATABASE in the .env file is the same and then Run DB migrations:
```
php artisan migrate
```
Generate app key
```
php artisan key:generate
```
Run project
```
php artisan serve
```
