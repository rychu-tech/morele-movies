#!/bin/bash

# Exit script on any error
set -e

# Define the name of your Docker Compose project
PROJECT_NAME="morele_project"

# Bring up the Docker containers (in detached mode)
echo "Starting Docker containers..."
docker-compose -p $PROJECT_NAME up -d

# Wait for the database to be ready (optional, you may adjust the sleep time if needed)
echo "Waiting for the database to be ready..."
sleep 10

# Run the migrations
echo "Running migrations..."
docker-compose -p $PROJECT_NAME exec -T app php artisan migrate

# Optionally, keep the containers running (usually `docker-compose up` is enough for serving the app)
# This line can be used to ensure that the app container is up and running
echo "Serving the app..."
docker-compose -p $PROJECT_NAME up

# Optionally, bring down the containers after serving the app
# Uncomment the following line if you want to stop and remove the containers after serving
# docker-compose -p $PROJECT_NAME down

echo "Application is now running."
