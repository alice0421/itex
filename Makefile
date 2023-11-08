# git cloneした場合にのみ使用可能
.PHONY: init
init:
	@rm -rf ./db
	@cp ./api/.env.example ./api/.env
	@docker-compose up -d
	@docker-compose exec api composer install
	@docker-compose exec api php artisan key:generate
	@docker-compose exec frontend npm install
	@docker-compose down

.PHONY: up
up:
	@docker-compose up

.PHONY: down
down:
	@docker-compose down

.PHONY: api
api:
	@docker-compose exec api bash

.PHONY: front
front:
	@docker-compose exec frontend bash

.PHONY: dev
dev:
	@docker-compose exec frontend npm run dev

.PHONY: build
build:
	@docker-compose exec frontend npm run build
