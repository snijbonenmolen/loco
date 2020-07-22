#!/bin/bash

releasename=$1
webroot=$2

echo "Linking $releasename to $webroot"

ln -s /var/www/media "/var/www/releases/$releasename/media"
ln -s /var/www/common/env.php "/var/www/releases/$releasename/env.php"
rm $webroot
ln -s "/var/www/releases/$releasename" $webroot