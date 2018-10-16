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

## Login using CURL

### Request

```bash
> POST /api/login_check HTTP/1.1
> Content-Type: application/json
> {
>    "username" : "username@example.com",
>    "password" : "password"
> }
```

### Response

```bash
> Content-Type: application/json
< HTTP/1.1 200 OK
< {"token":"eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJpYXQiOjE1Mzk2Njk5NDAsImV4cCI6MTUzOTY3MzU0MCwicm9sZXMiOlsiUk9MRV9VU0VSIl0sInVzZXJuYW1lIjoic2Vuc29yYXJpb0BleGFtcGxlLmNvbSJ9.CETPRQ5SwtfVWfJbCD93kcuU8r2PPFnS-7jCzysJJ4gRiPTH-svOv_xK3re58Us4Eq76KWV0HYPl7EgxfgeyhGZSjgkViVteihYpIYxlIS4hWBHbVjvyNP3Cw7NJc_f0xtwO7q1dZB6MoC5A_MJR498UcbrE5S6OIvb3QaS2JFFyeqZ9S-B4wyKnMXaSNbcbDj_pm7HbsmytOfeVcAcLWCkgdMaEM71YGvu9M6p7C5l5JNddGu7miLRXujLmLdvdxNSpE_JaejKW-gPO3avsKlFlmtJv37w6CdQd_BPdB6pd__wblFLNBT64BV3gvEq6NKwqGHI4RkolB_5DGAn28FXQ2rIEamz0YAygzN0KDWqMsCZnnr4iRpbiWnHfh2qgB-bk6crLt4t0yvdtFZhN7Rz2D4LF97Z7EqOzCpA4uPTQ70JGa2W17Y6D9-IDdNB7j05S_IfHhHu5B8Y6nk0Z-omKO4VVMHk8jHi6gOsaMNOgxGZ_qgwNRPDE_I0Tcvjamx6Y2Eg0AozbsVzyeyvTFGQeiscx6vdkUr_4r8oyzpiF23RYYBXFnc8rKbgqnziUFqk1ff7IQ1uD0Eyp3SGK-TR9cmNa_0uP9bDcop87AbHWMCxS7PL471qcpAIT71F3SI7xrnvEXe9KNVNqoyhRhoROrGl3bTScLfSLhi5fJQA"}
```

### CURL command

```bash
POST -H 'Content-type: application/json' http://localhost:8000/api/login_check -d '{"username":"sensorario@example.com","password":"password"}'
```
