build:
	./bin/console doctrine:database:drop --env=test --force
	./bin/console doctrine:database:create --env=test
	./bin/console doctrine:schema:update --env=test --force
	./bin/console doctrine:fixtures:load --env=test --no-interaction
	./bin/phpunit --testdox

