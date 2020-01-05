# test-products

## Task BACK

You must make a very basic CRUD API for products.

Database must be Mysql.

Fields: id, product name, price in Argentine pesos.
You must do money conversion with dollar, but it can be hardcoded.

You need to resposne, pesos and dollar price for each product:

#### Response fields:
```
{
    "id": 1,
    "name": "Arroz",
    "price": 45.00,
    "dollarPrice": 1.00
}
```

## Project

#### Folder structure
This project is built using Docker and PHP 7.2 with a DDD approach. 
This leads to three main folders: (https://en.wikipedia.org/wiki/Domain-driven_design)
* *Application*: services to interact with the domain of the application.
* *Domain*: entities, domain exceptions and interfaces to handle domain layer.
* *Infrastructure*: concrete implementations of the domain.

#### Requirements
In order to run this project you will need:

* PHP 7.2
* Mysql
* Working Webserver (nginx, apache, other)
* Composer

#### First time instructions:

###### Linux
1) Create products empty database
2) Create .env file using .env.example info (Modify paths if needed)
3) Execute ``` composer install```
4) Apply database dump, in project root run ``` php bin/console orm:schema-tool:update --force ```
5) Create ``` cache ``` and ``` logs ``` folders. By Default must be created inside /public but you can change the path in .env file.
6) ``` chmod -R 777 public/cache ``` and ``` chmod -R 777 public/logs ```

#### Endpoints

Base url: ``` http://localhost/test-products/api/v1 ```

Postman collection: ``` https://www.getpostman.com/collections/efe402f989ebb08c7c20 ```

###### Get Products
[GET] ```/product```

Response:
```json
[
    {
        "id": 1,
        "name": "Arroz",
        "price": 45.00,
        "dollarPrice": 1.00
    },
    {
          "id": 2,
          "name": "Cereal",
          "price": 45.00,
          "dollarPrice": 1.00
    },
    ...
]
```

###### Add Product
[POST] ```/product```

Body:
```json
{
    "name": "Arroz",
    "price": 45.00
}
```

###### Update Product
[PUT] ```/product/{id}```

Body:
```json
{
    "name": "Arroz",
    "price": 45.00
}
```

###### Delete Product
[DELETE] ```/product/{id}```

Body:
```json
```

#### Running test
This project is tested under PHPUnit and includes a unit test suite:
```
php vendor/bin/phpunit
```
