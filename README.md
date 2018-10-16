# sf4-boilerplate

## Install

``` bash
$ git clone git@github.com:studiomado/sf4-boilerplate PROJECT
$ cd PROJECT
$ export JWT_PASSPHRASE=2d2e84d5385e7462590ec0bf73bfabb7
$ make install
```

## Edit .env file:

 - JWT_PASSPHRASE used generating SSH keys
 - database configuration

## Create test database

```bash
$ make create_db
```

or, if you want to use a database from scratch with docker:

```bash
$ export DB_NAME=db_name
$ export DB_USER=db_user
$ export DB_PASSWORD=db_password
$ export MYSQL_ROOT=root
$ make create_db_docker
```

then

```bash
$ make build_db
```

## Run tests

```bash
$ make unitest
```

## Run server

```bash
$ make server
```

## Try to login

Login with

 - username: sensorario@example.com
 - password: password
