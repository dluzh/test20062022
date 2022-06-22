
## About

Laravel app grabbing rss feeds by scheduler


## Running the App
To run the app clone it from git:

`git clone https://github.com/dluzh/test20062022.git`

Then build, up, migrate & seed:
1. `cd test20062022`
2. `docker-compose -f ./docker/docker-compose.yml build`
3. `docker-compose -f ./docker/docker-compose.yml up -d`
4. `docker exec -i docker_www_1 php artisan migrate:fresh --seed`

If you want to start scheduled task, run the following commands in docker_www_1 container:

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
