# sf4-boilerplate

## Install

``` bash
$ git clone git@github.com:studiomado/sf4-boilerplate PROJECT
$ cd PROJECT
$ mkdir -p config/jwt
$ openssl genrsa -out config/jwt/private.pem -aes256 4096
$ openssl rsa -pubout -in config/jwt/private.pem -out config/jwt/public.pem
$ composer install
```

## Edit .env file:

 - JWT_PASSPHRASE used generating SSH keys
 - database configuration

## Create test database

```bash
./bin/console doctrine:database:create --env=test
```

## Run tests

```bash
$ make
```

## Run server

```bash
 ./bin/console server:run
```

## Try to login

Login with

 - username: sensorario@example.com
 - password: password
