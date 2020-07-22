#!/bin/bash

releasename=$1

echo "Creating folder for release $releasename"

mkdir "/var/www/releases/$releasename"

echo "$releasename, release created" >> "/var/www/common/releases.log"