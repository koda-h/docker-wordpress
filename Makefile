arg = arg

up:
	docker-compose up
up-no-log:
	docker-compose up -d
force-up:
	rm -f tmp/installed_wordpress
	docker-compose up -d
	@make logs-watch
force-up-no-log:
	rm -f tmp/installed_wordpress
	docker-compose up -d
build:
	docker-compose build --no-cache --force-rm
stop:
	docker-compose stop
down:
	docker-compose down --remove-orphans
restart:
	@make down
	@make up
destroy:
	docker-compose down --rmi all --volumes --remove-orphans
destroy-volumes:
	docker-compose down --volumes --remove-orphans
ps:
	docker-compose ps
logs:
	docker-compose logs
logs-watch:
	docker-compose logs --follow
log-web:
	docker-compose logs web
log-web-watch:
	docker-compose logs --follow web
log-app:
	docker-compose logs app
log-app-watch:
	docker-compose logs --follow app
log-db:
	docker-compose logs db
log-db-watch:
	docker-compose logs --follow db
web:
	docker-compose exec web bash
app:
	docker-compose exec app bash
db:
	docker-compose exec db bash
update-theme:
	cp -rp web/app/themes/ data/themes/
create-env:
	cp .env.example .env
