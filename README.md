- Steps for Project Setup:

- git clone this repo
- composer install (Make sure composer is latest 2.x)
- set .env
- copy prevendor to vendor


- Steps for Apache Config:

- Add Virtualhost for SSL
- Set domains as app.upview.localhost pointing to Upview/public  & admin.upview.localhost pointing to Upview/public
- Enable rewrite and ssl modules of apache2
    # a2enmod rewrite
    # a2enmod ssl

- Add .htaccess permissions for directory inside vhost file:

    <VirtualHost app.upview.localhost:443>

	ServerAdmin webmaster@app.upview.localhost
	DocumentRoot /var/www/html/Upview/public/

	<Directory /var/www/html/Upview/public/>
             Options -Indexes +FollowSymLinks +MultiViews
             AllowOverride All
             Require all granted
	</Directory>


	ServerName app.upview.localhost

	ErrorLog ${APACHE_LOG_DIR}/error.log
	CustomLog ${APACHE_LOG_DIR}/access.log combined


	SSLEngine on
	SSLCertificateFile /home/jimmy/ssl_upview/79865261_app.upview.localhost.cert
	SSLCertificateKeyFile /home/jimmy/ssl_upview/79865261_app.upview.localhost.key


</VirtualHost>



- Steps for Git Setup:

- add git command to ignore file chmod changes & make folder 777: 
    $ git config core.fileMode false
    #  chmod -R 777 Upview 
    
- Set local git config for username & email


List of PHP Extensions required:

- php-gd
- php-mongod
