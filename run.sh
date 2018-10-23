#!/bin/bash

docker build -t username/my-php-app .
docker run --name translate-webapp -d -p 80:80 username/my-php-app

