FROM ubuntu:18.04 

LABEL maintainer 'Orlando Nascimento <orlandocorreia2@hotmail.com>'

WORKDIR /var/www

ENV DEBIAN_FRONTEND=noninteractive

RUN apt-get update && apt-get install -yq --no-install-recommends \
  nano \
  curl \
  git \
  unzip \
  iputils-ping \
  wget \
  openssl \
  graphicsmagick \
  imagemagick \
  ghostscript \
  mysql-client \
  locales \
  sqlite3 \
  ca-certificates \
  cron \
  && apt-get clean

RUN apt-get install -y apache2

RUN apt-get install -y apt-transport-https software-properties-common \
  && add-apt-repository -y ppa:ondrej/php \
  && apt-get install -y php8.0 libapache2-mod-php8.0 \
  && apt-get clean

RUN apt-get install -y php8.0-amqp \
    php8.0-common \
    php8.0-gd \
    php8.0-ldap \
    php8.0-odbc \
    php8.0-readline \
    php8.0-sqlite3 \
    php8.0-xsl \
    php8.0-curl \
    php8.0-gmp \
    php8.0-mailparse \
    php8.0-opcache \
    php8.0-redis \
    php8.0-sybase \
    php8.0-yac \
    php8.0-ast \
    php8.0-dba \
    php8.0-igbinary \
    php8.0-mbstring \
    php8.0-pgsql \
    php8.0-rrd \
    php8.0-tidy \
    php8.0-yaml \
    php8.0-bcmath \
    php8.0-dev \
    php8.0-imagick \
    php8.0-memcached \
    php8.0-smbclient \
    php8.0-uuid \
    php8.0-zip \
    php8.0-bz2 \
    php8.0-ds \
    php8.0-imap \
    php8.0-pspell \
    php8.0-snmp \
    php8.0-xdebug \
    php8.0-zmq \
    php8.0-cgi \
    php8.0-enchant \
    php8.0-interbase \
    php8.0-mysql \
    php8.0-psr \
    php8.0-soap \
    php8.0-xhprof \
    php8.0-fpm \
    php8.0-intl \
    php8.0-xml \
  && apt-get clean

RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
  && HASH="$(wget -q -O - https://composer.github.io/installer.sig)"\
  && php -r "if (hash_file('SHA384', 'composer-setup.php') === '$HASH') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;" \
  && php composer-setup.php --install-dir=/usr/local/bin --filename=composer \
  && apt-get clean

RUN composer global require laravel/installer \
  && apt-get clean

RUN a2enmod rewrite

EXPOSE 80

CMD [ "apachectl -D FOREGROUND" ]
