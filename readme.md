## Stripavel

Stripavel is a ready to use application for Stripe + Laravel projects. It include most part of Stripe objects, converted to Eloquent models : Migrations schemas, events, routes, controller and stuffs.
When you receive any webhook notification from your Stripe account, conversion is made before insert/update/delete (soft) data through your database, and an event is send for your application.
So you always have a perfect synchronisation between your app and your Stripe data.

##Documentation

###Composer
Run :
```
composer create-project --prefer-dist rikless/stripavel
```
### Environment
Open your .env file and complete new keys :
```
STRIPE_SECRET
STRIPE_PUBLIC
```
### Commands
cd into your app un run :
```
composer install
php artisan migrate
```
### Webhooks
Finaly, configure your stripe account with this webhooks url yourapp.com/webhooks/stripe.

##How it works
Every models use the App\Stripe\IsStripeEntity trait. This is the way we can use the createFromStripe method when a notification is send, and update the database.
All is ready to work with postgresql, but if your Mysql version support json data, it should works.
This tool is a laravel fork. So to complete your installation, just read [Laravel documentation](https://laravel.com/docs/5.2#configuration)


### License
*GNU GENERAL PUBLIC LICENSE version 3* by [Free Software Foundation, Inc.](http://fsf.org/)

##Todo
Finish Order/Sku/Bitcoin/Alipay objects
