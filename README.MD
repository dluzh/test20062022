
## About

Laravel app grabbing rss feeds by scheduler


## Running the App
To run the app clone it from git:
`git clone https://github.com/dluzh/test20062022.git`

Then build, up, migrate & seed:
1. `make all`

The Makefile has the following targets:
```
make all	    runs everything
make build	    builds a Docker images
make up		    run the Docker images
make migrate	runs migration and database seeding
make supervisor runs supervisor
```

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
5. Seed more db tables
