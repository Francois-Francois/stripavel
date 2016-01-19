## Stripavel

Stripavel is a ready to use application for Strip + Laravel projects. It include most part of Stripe objects, converted to Eloquent models.
When you recieve any webhook notification from your Stripe account, data is converted before insert/update in your database, and an event is send for your application.

## Official Documentation
### Environment
Open your .env file and complet new keys : 
```
STRIPE_SECRET=null
STRIPE_PUBLIC=null
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
Every models use the IsStripeEntity trait. This is the way we can use the createFromStripe method when a notification is send, and update the database.


### License

*GNU GENERAL PUBLIC LICENSE version 3* by [Free Software Foundation, Inc.](http://fsf.org/) converted to Markdown. Read the [original GPL v3](http://www.gnu.org/licenses/).

##Todo

Finish Order/Sku/Product/Bitcoin/Fee/Alipay objects

