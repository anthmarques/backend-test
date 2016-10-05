#!/usr/bin/env bash

echo "Starting setup"

docker-compose -f "./project/docker-compose.yml" up -d --build
docker-compose -f "./nginx/docker-compose.yml" up -d --build

docker exec catho-search /bin/sh -c "composer install"

echo "Done setup"

