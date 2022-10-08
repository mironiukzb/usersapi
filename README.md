# usersapi

## Requirements

PHP 8.0

Symfony LTS (5.4.13) https://symfony.com/download

MySQL with client (phpmyadmin, MySQL Workbench) https://www.mysql.com/


## Installation

Open your terminal and clone repository 

```bash
git clone git@github.com:mironiukzb/usersapi.git
```

In .env file, change properties of database connection
Set username, password, port, dataase_name

```php
DATABASE_URL="mysql://usename:password@127.0.0.1:3306/database_name?serverVersion=5.7"

```

Create database

```bash
php bin/console doctrine:database:create

```

Run migrations (creating tables in database)

```bash

php bin/console doctrine:migrations:migrate

```

Run project

```bash

symfony serve:start
```

