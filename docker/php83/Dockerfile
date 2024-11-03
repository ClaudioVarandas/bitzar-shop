############################################
# Base Image
############################################
FROM serversideup/php:8.3-fpm-nginx AS base

############################################
# Development Image
############################################
FROM base AS development

COPY --chmod=755 ./entrypoint.d/99-laravel.sh /etc/entrypoint.d/99-laravel.sh

# Switch to root so we can do root things
USER root

# As root, run the docker-php-serversideup-s6-init script
RUN docker-php-serversideup-s6-init

# Save the build arguments as a variable
ARG USER_ID
ARG GROUP_ID

ENV NODE_VERSION=20

# Use the build arguments to change the UID
# and GID of www-data while also changing
# the file permissions for NGINX
RUN docker-php-serversideup-set-id www-data $USER_ID:$GROUP_ID && \
    \
    # Update the file permissions for our NGINX service to match the new UID/GID
    docker-php-serversideup-set-file-permissions --owner $USER_ID:$GROUP_ID --service nginx

# Install base dependencies
RUN apt update && apt install -y -q --no-install-recommends \
        apt-transport-https \
        build-essential \
        ca-certificates \
        curl \
        libssl-dev

RUN curl -fsSL https://deb.nodesource.com/setup_20.x | bash - && apt install nodejs -y

RUN mkdir "${COMPOSER_HOME}/.cache" && chown -R www-data:www-data "${COMPOSER_HOME}" && chmod -R 775 "${COMPOSER_HOME}"

# Drop back to our unprivileged user
USER www-data

WORKDIR /var/www/html

############################################
# Production Image
############################################

# Since we're calling "base", production isn't
# calling any of that permission stuff
FROM base AS production

# Copy our app files as www-data (33:33)
COPY --chown=www-data:www-data . /var/www/html
