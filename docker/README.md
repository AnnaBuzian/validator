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
docker-compose up -d --build
````

This builds the containers and runs them in the background, while this
````
docker-compose up
````

Deployment of the project:
````
docker-compose exec app composer install
docker-compose exec app npm install
````