# Simple Site Catalog


# Простой каталог сайтов

Просто показать как работать с laravel



# Установка


`git clone https://github.com/bolnikh/site-catalog-laravel.git project-name`

`cd project-name`

`composer install --no-dev`

copy .env.example to .env

create database

set db access

`php artisan migrate`

`php artisan key:generate`

optionally for test 
`php artisan db:seed`


## Sphinx for search

set connect to sphinx `config/sphinx.php`

index db data

doc/sphinx/sphinx.conf.example  - example of sphinx config 

