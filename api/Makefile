help:
	@echo "do a cat!"

setup-dev:
	bin/console doctrine:schema:update --force

debug:
	export PHP_IDE_CONFIG="serverName=form3.localhost"

cs:
	php-cs-fixer fix --verbose

cs_dry_run:
	php-cs-fixer fix --verbose --dry-run

up:
	composer install

tests:
	make unit

unit:
	./vendor/bin/phpunit

unit-coverage:
	./vendor/bin/phpunit --coverage-html build/coverage/phpunit
