
run:
	@php artisan serve

docker-up:
	@docker-compose up -d

docker-down:
	@docker-compose down -d

db-connect:
	@docker exec -it laravel-storage psql -U root -d laravel

migrate-up:
	@php artisan migrate

migrate-down:
	@php artisan migrate:rollback

migrate-status:
	@php artisan migrate:status

migrate-fresh:
	@php artisan migrate:fresh