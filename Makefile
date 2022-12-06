deploy:
	git pull
	docker-compose php-fpm composer install
