FROM debian:jessie

RUN apt-get update && apt-get install -y \
	sudo \ 
	git  \
	curl \
	nginx \
	vim \
	php5 \
	php5-cli \
	php5-mysql \
	php5-curl \
	php5-gd \
	php5-mcrypt \
	php5-fpm \
	php5-cgi \
	php5-xdebug

RUN curl -sL https://deb.nodesource.com/setup_6.x | bash -
RUN apt-get install -y \ 
  nodejs \ 
  build-essential

RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
RUN php -r "if (hash_file('SHA384', 'composer-setup.php') === '669656bab3166a7aff8a7506b8cb2d1c292f042046c5a994c43155c0be6190fa0355160742ab2e1c88d40d5be660b410') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
RUN php composer-setup.php
RUN php -r "unlink('composer-setup.php');"

RUN mv composer.phar /usr/local/bin/composer

### CHANGE HERE YOUR GROUP ID TO DEVELOPMENT
ENV PERM_GROUP_ID 1000

### CHANGE HERE YOUR USER ID TO DEVELOPMENT
ENV PERM_USER_ID 1000

### CREATE GROUP FOR DEVELOPMENT
RUN groupadd --gid ${PERM_GROUP_ID} deploy

### CREATE USER FOR DEVELOPMENT
RUN echo "%sudo ALL=(ALL) NOPASSWD: ALL" >> /etc/sudoers && \
   useradd -u ${PERM_USER_ID} -G users,www-data,sudo -g deploy -d /deploy --shell /bin/bash -m deploy && \
   echo "secret\nsecret" | passwd deploy


### IMPORT FILES TO ENVIRONMENT
COPY ./bash.bashrc       /deploy/.bashrc
COPY ./docker-entrypoint.sh /etc/entrypoint.sh
COPY ./nginx.conf /etc/nginx/nginx.conf
COPY ./xdebug.ini /etc/php5/mods-available/xdebug.ini
COPY ./www.conf /etc/php5/fpm/pool.d/www.conf

RUN chmod +x /etc/entrypoint.sh
RUN chown deploy:deploy /deploy/.bashrc
RUN composer self-update

### SET DEFAULT USER TO DEVELOPMENT
USER deploy
WORKDIR /var/www/gertask

EXPOSE 80
EXPOSE 9000

CMD ["/bin/bash"]
ENTRYPOINT ["/etc/entrypoint.sh"]
