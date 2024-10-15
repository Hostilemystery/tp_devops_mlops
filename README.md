# tp_devops_mlops

TP 2 du cours devops &amp; mlops efrei

# Etape 1

creation du fichier docker-tp2 : mkdir docker-tp2

creation des fichier pour les differentes etapes : mkdir etape1 etape2 etape3 etape4

1. Creation du fichier dockerfile pour nginx

   FROM nginx:1.27
   COPY nginx.conf /etc/nginx/nginx.conf 2.

2. Creation du fichier dockerfile pour php
   FROM php:7.4-fpm
   WORKDIR /app
   COPY . /app

3. Construction et lancement des containers :

   docker build -t http-image -f http/Dockerfile .
   docker build -t php-image -f script/Dockerfile .
   docker network create tp2-network

   docker run -d --name script --network tp2-network script-image
   docker run -d --name http -p 8080:8080 --network tp2-network http-image

   tester dans le navigateur : http://localhost:8080/test_bdd.php

# Etape 2

docker run -d --name data --network tp2-network ^ -e MYSQL_ROOT_PASSWORD=rootpass ^ -e MYSQL_DATABASE=testdb ^ -e MYSQL_USER=testuser ^ -e MYSQL_PASSWORD=testpass ^ -v "%cd%\data\sql:/docker-entrypoint-initdb.d" ^ mariadb:latest
docker build -t http-image -f http/Dockerfile .
docker build -t php-image -f script/Dockerfile .

docker run -d --name script --network tp2-network script-image
docker run -d --name http -p 8080:8080 --network tp2-network http-image
tester dans le navigateur : http://localhost:8080/test_bdd.php

# Etape

Invoke-WebRequest -Uri "https://wordpress.org/latest.tar.gz" -OutFile "latest.tar.gz"

tar -xzf latest.tar.gz --strip-components=1

docker run -d --name data --network tp2-network ^
-e MYSQL_ROOT_PASSWORD=rootpass ^
-e MYSQL_DATABASE=testdb ^
-e MYSQL_USER=testuser ^
-e MYSQL_PASSWORD=testpass ^
-v "%cd%/data:/var/lib/mysql" ^
mariadb:latest

docker build -t script-image -f script/Dockerfile .
docker run -d --name script --network tp2-network script-image

docker build -t http-image -f http/Dockerfile .
docker run -d -p 8080:8080 --name http --network tp2-network http-image

http://localhost:8080/

# Etape4

recopie de l'étape 3 et création du docker compose yml

docker-compose up -d
