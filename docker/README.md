VALIDATOR APP
 ------------
 
This setup contains:
 * PHP-FPM (PHP 7.2)
 * NGINX 1.10
 * Redis 5.0
 
Go to docker folder:
````
cd docker/ 
````
 
Build and run the Docker containers
````
docker-compose rm --stop --force
docker-compose up -d --build
````

Start:
````
docker-compose start
````

Stop:
````
docker-compose stop
````

Deploy:
````
docker-compose exec app php composer install
````

This builds the containers and runs them in the background, while this
````
docker-compose up
````

Deployment of the project:
````
docker-compose exec app composer install
docker-compose exec app npm install
docker-compose exec app bash -c \
    "sudo chown -R www-data:www-data /home/www-data \
    && npm install \
    && npm dev"
````