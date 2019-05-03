install:
	mkdir -p config/jwt
	openssl genrsa -passout env:JWT_PASSPHRASE -out config/jwt/private.pem -aes256 4096
	openssl rsa -passin env:JWT_PASSPHRASE -pubout -in config/jwt/private.pem -out config/jwt/public.pem
	composer install

create_db_docker:
	docker run --name mysql_sf4b_5.7 -e MYSQL_USER=${DB_USER} -e MYSQL_DATABASE=${DB_NAME} -e MYSQL_PASSWORD=${DB_PASSWORD} -e MYSQL_ROOT_PASSWORD=${MYSQL_ROOT} -p 3306:3306 -d mysql:5.7

create_db:
	./bin/console doctrine:database:create --env=test

drop_db:
	./bin/console doctrine:database:drop --env=test --force

build_db:
	#./bin/console doctrine:database:create --env=test
	./bin/console doctrine:schema:update --env=test --force
	./bin/console doctrine:fixtures:load --env=test --no-interaction

server:
	./bin/console server:run

unitest:
	./bin/phpunit --testdox

