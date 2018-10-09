# sf4-boilerplate

``` bash
$ git clone git@github.com:studiomado/sf4-boilerplate PROJECT
$ cd PROJECT
$ mkdir -p config/jwt
$ openssl genrsa -out config/jwt/private.pem -aes256 4096
$ openssl rsa -pubout -in config/jwt/private.pem -out config/jwt/public.pem
$ composer install
```

remember to edit .env file:

 - JWT_PASSPHRASE used generating SSH keys
 - database configuration

To test that everything is working

```bash
$ make
```

Login with

 - username: sensorario@example.com
 - password: password

## server ...

Remember to run server

```bash
 ./bin/console server:run
```
