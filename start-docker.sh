#!/bin/bash
# start test server
docker run --rm --name lamp -p 8080:80 -e LOG_STDOUT=true -e LOG_STDERR=true -e LOG_LEVEL=debug -v $PWD/src:/var/www/html fauria/lamp

