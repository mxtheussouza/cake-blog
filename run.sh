#!/usr/bin/env bash

#Run mysql container
docker run --name docker-mysql -v /home/matheus/Documentos/projects/mysql/:/var/lib/mysql -e MYSQL_ROOT_PASSWORD=k@ien123 --restart always -d mysql

#Run phpmyadmin container
docker run --name docker-phpmyadmin -d --link docker-mysql:db -p 8081:80 -d phpmyadmin/phpmyadmin 

#Building image
docker-compose build

#Run container
docker-compose up -d --build