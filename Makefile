.PHONY: init up down destroy migrate seed backend.login web.login db.login db.console

DC = docker compose

init:
	@$(DC) up -d --build
	@$(DC) exec backend cp .env.example .env
	@$(DC) exec backend php artisan config:clear
	@$(DC) exec backend php artisan cache:clear
	@$(DC) exec backend php artisan key:generate
	@$(DC) exec backend php artisan migrate
	@$(DC) exec backend php artisan db:seed

up:
	@$(DC) up -d

down:
	@$(DC) down

destroy:
	@$(DC) down --rmi all --volumes

migrate:
	@$(DC) exec backend php artisan migrate

seed:
	@$(DC) exec backend php artisan db:seed

php:
	@$(DC) exec backend bash

frontend:
	@$(DC) exec frontend sh

db:
	@$(DC) exec db bash

db.console:
	@$(DC) exec db psql -U laravel -d laravel

cache clear:
	@$(DC) exec backend php artisan config:clear
	@$(DC) exec backend php artisan route:clear
	@$(DC) exec backend php artisan view:clear
	@$(DC) exec backend php artisan cache:clear
