deploy_dev:
	docker-compose up -d --build
	docker exec agenda chmod 777 -R /app

install_dep:
	composer install
	composer require laracasts/flash
