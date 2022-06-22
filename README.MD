
## About

Laravel app grabbing rss feeds by scheduler


## Running the App
To run the app clone it from git:

`git clone https://github.com/laravel/laravel.git .`

Then build, up, migrate & seed:

1. `docker-compose -f ./docker/docker-compose.yml build`
2. `docker-compose -f ./docker/docker-compose.yml up -d`
3. `docker exec -i docker_www_1 php artisan migrate --seed`

If you want to start scheduled task, enter following commands in docker_www_1 containers CLI:

4. `/usr/bin/supervisord`

Note: task scheduled to launch everyminute for development purposes


The app will be running on `http://localhost/entry`.

## API docs:

https://documenter.getpostman.com/view/20788869/UzBpKRh6  


## Rss feed used for tests
https://lifehacker.com/rss


## TODO
1. Validate user input
2. Add authorisation for UI and API
3. Write unit tests
4. Check for vulnerabilities using Snyk
