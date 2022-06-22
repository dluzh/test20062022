git clone ------------------
docker-compose -f ./docker/docker-compose.yml build
docker-compose -f ./docker/docker-compose.yml up -d
docker exec -i docker_www_1 php artisan migrate --seed