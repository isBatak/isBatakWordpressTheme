#!/usr/bin/env bash

# Use single quotes instead of double quotes to make it work with special-character passwords
PASSWORD='root'
PROJECTFOLDER='public'

# create project folder
sudo mkdir "/var/www/public_html/${PROJECTFOLDER}"

# update / upgrade
sudo apt-get update
sudo apt-get -y upgrade

# install apache 2.5 and php 5.5 and xdebug
sudo apt-get install -y apache2
sudo apt-get install -y php5
sudo apt-get install -y php5-xdebug

# xdebug Config
cat << EOF | sudo tee -a /etc/php5/mods-available/xdebug.ini
xdebug.remote_enable = on
xdebug.remote_connect_back = on
xdebug.idekey = "vagrant"
xdebug.scream=1
xdebug.cli_color=1
xdebug.show_local_vars=1
EOF

# install mysql and give password to installer
sudo debconf-set-selections <<< "mysql-server mysql-server/root_password password $PASSWORD"
sudo debconf-set-selections <<< "mysql-server mysql-server/root_password_again password $PASSWORD"
sudo apt-get -y install mysql-server
sudo apt-get install php5-mysql

# install phpmyadmin and give password(s) to installer
# for simplicity I'm using the same password for mysql and phpmyadmin
sudo debconf-set-selections <<< "phpmyadmin phpmyadmin/dbconfig-install boolean true"
sudo debconf-set-selections <<< "phpmyadmin phpmyadmin/app-password-confirm password $PASSWORD"
sudo debconf-set-selections <<< "phpmyadmin phpmyadmin/mysql/admin-pass password $PASSWORD"
sudo debconf-set-selections <<< "phpmyadmin phpmyadmin/mysql/app-pass password $PASSWORD"
sudo debconf-set-selections <<< "phpmyadmin phpmyadmin/reconfigure-webserver multiselect apache2"
sudo apt-get -y install phpmyadmin

# setup hosts file
VHOST=$(cat <<EOF
<VirtualHost *:80>
    DocumentRoot "/var/www/public_html/${PROJECTFOLDER}"
    ServerName ${PROJECTFOLDER}.dev
	ServerAlias www.${PROJECTFOLDER}.dev
	ErrorLog "/var/www/public_html/${PROJECTFOLDER}\error.log"
	CustomLog "/var/www/public_html/${PROJECTFOLDER}\access.log" combined
    <Directory "/var/www/public_html/${PROJECTFOLDER}">
        AllowOverride All
        Require all granted
    </Directory>
</VirtualHost>
EOF
)
echo "${VHOST}" > /etc/apache2/sites-available/000-default.conf

# setup php.ini file
post_max_size=800M
upload_max_filesize=800M
max_execution_time=5000
max_input_time=5000
memory_limit=1000M
for key in post_max_size upload_max_filesize max_execution_time max_input_time memory_limit
do
 sed -i.bak "s/^\($key\).*/\1 $(eval echo \${$key})/" /etc/php5/apache2/php.ini
done

# enable mod_rewrite
sudo a2enmod rewrite

# restart apache
service apache2 restart

# install git
sudo apt-get -y install git

# install Composer
curl -s https://getcomposer.org/installer | php
mv composer.phar /usr/local/bin/composer
