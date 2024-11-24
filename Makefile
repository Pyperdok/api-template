create-network:
	docker network create laravel-network

create-volume:
	docker volume create --name mariadb_data

up-db:
	docker run -d --name mariadb \
	--env ALLOW_EMPTY_PASSWORD=yes \
	--env MARIADB_USER=bn_myapp \
	--env MARIADB_DATABASE=bitnami_myapp \
	--network laravel-network \
	--volume mariadb_data:/bitnami/mariadb \
	bitnami/mariadb:latest

up-app:
	docker run -d --rm --name laravel \
	-p 8000:8000 \
	--env DB_HOST=127.0.0.1 \
	--env DB_PORT=3306 \
	--env DB_USERNAME=bn_myapp \
	--env DB_DATABASE=bitnami_myapp \
	--network laravel-network \
	--volume ${PWD}:/app \
	bitnami/laravel:latest