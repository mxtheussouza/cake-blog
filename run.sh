#!/usr/bin/env bash

#Run mysql container
docker run --name docker-mysql -v /home/go/Documents/mysql/:/var/lib/mysql -e MYSQL_ROOT_PASSWORD=k@ien123 --restart always -d mysql:5.7

#Run phpmyadmin container
docker run --name docker-phpmyadmin -d --link docker-mysql:db -p 8081:80 -d phpmyadmin/phpmyadmin 

#Building image
docker-compose build

#Run container
docker-compose up -d --build
