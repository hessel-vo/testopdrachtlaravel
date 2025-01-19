## Laravel Product CRUD Application

This code implements a simple CRUD application for a "Product" model using Laravel. Authentication is provided by Laravel Breeze.

## Installation

Clone the repository:\
`git clone https://github.com/hessel-vo/testopdrachtlaravel.git`

Install node and vendor files:\
`cd .\testopdrachtlaravel`\
`composer install`\
`npm install`

Copy `.env.example` and rename to `.env`.\
Configure `.env` file as needed.

Ensure database configuration matches `.env`.\
Default database is `sqlite`, requires creating a `"database.\sqlite"` file in `\testopdrachtlaravel\database\`. 

Generate app key:\
`php artisan key:generate`

Run migrations and seed database:\
`php artisan migrate --seed`

Note: This creates 1 user in the database with login info: `email='test@example.com'`,`password='password'`, and creates 20 products in the product table.

Run build or dev:\
`npm run build`\
or\
`npm run dev`

The application can now be served. In Laravel Herd link `\testopdrachtlaravel` as an existing project.
The URL provided by Laravel Herd can be used to access the application.

---

## Usage

**UI and CRUD operations**

The application implements a simple UI based on Laravel Breeze default site.\
Welcome page with **Login** and **Register** options.\
After login the default Laravel Breeze dashboard is shown, with additional navigation option for Products page.\
The Products page shows index of all products.\
Product CRUD operations can be executed with **Add New Product**, **View**, **Edit**, and **Delete** buttons.

**Job commands**

The application has commands for an `IncreaseProductPrices` job and a `DecreaseProductPrices` job.\
Example:\
`php artisan products:price-increase 10` queues job to increase all product prices by 10%.\
`php artisan products:price-decrease 20` queues job to decrease all product prices by 20%.

**Tests**

Tests cases have been implemented for the product CRUD functionality.\
Run tests with:\
`php artisan test`, runs all tests (including product tests and default Laravel Breeze tests)

Tests are currently configured to use the same default `database.sqlite` file as testing database. Database will be reset after tests and will need to be seeded again.

---
Note: By default the application uses the Eloquent implementation of database management for products. To use the plain sql implementation, in `\app\Providers\AppServiceProvider.php`, switch `EloquentProductRepository` to `PlainSqlProductRepository`.