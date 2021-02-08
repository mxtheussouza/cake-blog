#!/bin/bash

# Run MySQL container
docker run --name docker-mysql -v /mysql:/var/lib/mysql -e MYSQL_ROOT_PASSWORD=1234 --restart always -d mysql:5.7

# Run phpmyadmin container
docker run --name docker-phpmyadmin -d --link docker-mysql:db -p 8180:80 -d phpmyadmin/phpmyadmin

# Run container
docker-compose up -d --build

# Install DebugKit
cd app/Plugin && git clone --single-branch --branch 2.2 git://github.com/cakephp/debug_kit.git DebugKit
