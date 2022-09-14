default: run

run:
	- docker-compose up -d --build

clean: stop
	- docker rm cakeblog-web cakeblog-db
	- docker rmi cakeblog-php

status:
	- docker ps -f name=cakeblog-web
	- docker ps -f name=cakeblog-db

restart:
	- docker restart cakeblog-web cakeblog-db

start:
	- docker start cakeblog-web cakeblog-db

stop:
	- docker stop cakeblog-web cakeblog-db

bash:
	- docker exec -it cakeblog-web bash
