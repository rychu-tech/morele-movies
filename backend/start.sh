#!/bin/bash

set -e

PROJECT_NAME="morele_project"

echo "Starting Docker containers..."
docker-compose -p $PROJECT_NAME up -d

echo "Waiting for the database to be ready..."
sleep 10

echo "Running migrations..."
docker-compose -p $PROJECT_NAME exec -T app php artisan migrate

echo "Running unit tests..."
docker-compose -p $PROJECT_NAME exec -T app php artisan test

echo "Serving the app..."
docker-compose -p $PROJECT_NAME up

echo "Application is now running, and tests have been executed."
