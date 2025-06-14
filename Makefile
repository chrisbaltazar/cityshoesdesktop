SHELL:=/bin/bash

build:
	docker-compose up -d --build

shell:
	docker exec -it cityshoesdesktop-app-1 bash

start:
	php artisan serve --port=9999 --host 0.0.0.0

db:
	php artisan migrate:fresh --seed
