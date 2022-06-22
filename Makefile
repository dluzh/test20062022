git clone https://github.com/dluzh/test20062022.git
cd test20062022
docker-compose -f ./docker/docker-compose.yml build
docker-compose -f ./docker/docker-compose.yml up -d
docker exec -i docker_www_1 php artisan migrate:fresh --seed