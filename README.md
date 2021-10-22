## Development environment
Homestead @ Vagrant <br />
PHP 8 <br />
MySQL8 <br />
Laravel v8.66.0 <br />

## How to run this demo
This demo use migration to create table and seeder to generate demo data. <br />
```
php artisan make:model PhoneBook --all
php artisan migrate // create table
php artisan db:seed // insert 10 fake rows
```

## Files related
app/Http/Controllers/PhoneBookController.php <br />
app/Http/Requests/PhoneBookRequest.php <br />
app/Http/Models/PhoneBook.php <br />
database/migrations/2021_10_22_010714_create_phone_books_table.php <br />
database/seeders/PhoneBookSeeder.php <br />
resources/views/*
routes/web.php

## The database dump file
database/sql/cd.sql
