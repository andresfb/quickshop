# Quick Shop
A simple Shopping Cart built in PHP 7.2 with Laravel 5.7 framework.

## Installation
After cloning the repo rename the `.en.mysql` in the root to `.env`. Update the variables to your desired values, create and run the docker container with:

```
docker-compose up -d
```

Wait for the images to build, and the containers to start then go into `.src/` folder rename the `.env.example` to `.env` and edit the `DB_` section to match the values used in the previous step.

Go into the root directory and run the following commands to get the Laravel environment ready.

```
docker-compose exec app composer install

docker-compose exec app php artisan key:generate

docker-compose exec app php artisan config:cache

docker-compose exec app php artisan migrate:fresh --seed
```

Point your browser to `http://127.0.0.1` to access the application. Optionally you can add an entry to your hosts file for a local domain as:

````
127.0.0.1   quickshop.local
````

And access the app through `http://quickshop.local`.

Laravel Telescope is also configured and can be accessed through `http://127.0.0.1/telescope`

Lastly, the PHPMyAdmin is also configured as a Container and can be accessed from `http://127.0.0.1:8080/`
