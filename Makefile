THIS_FILE := $(lastword $(MAKEFILE_LIST))

.PHONY: help build up migrate

help:
	@echo "Makefile commands:"
	@echo "build"
	@echo "up"
	@echo "migrate"
	@echo "supervisor"
	@echo "all"
build:
	docker-compose -f ./docker/docker-compose.yml build $(c)
up:
	docker-compose -f ./docker/docker-compose.yml up -d $(c)
	echo "Waiting 20 seconds while gears are spinning"
	@sleep 20 $(c)
composer:
	docker exec -i docker_www_1 composer install $(c)
	docker exec -i docker_www_1 composer dump-autoload $(c)
migrate:
	docker exec -i docker_www_1 php artisan migrate:fresh --seed $(c)
supervisor:
	docker exec -i docker_www_1 /usr/bin/supervisord $(c)
all: build up composer migrate supervisor






