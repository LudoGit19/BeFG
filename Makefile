run:
	docker-compose up

stop:
	docker-compose down

composer-install:
	docker-compose run web composer install

symfony-check:
	docker-compose run web symfony check:requirements

build:
	USER_ID=`id -u` GROUP_ID=`id -g` docker-compose build

db-migrate:
	docker-compose run web php bin/console doctrine:migrations:migrate

db-create:
	docker-compose run web php bin/console make:migration

db-fixture:
	docker-compose run web php bin/console doctrine:fixture:load