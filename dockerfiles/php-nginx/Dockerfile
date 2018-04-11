FROM webdevops/php-nginx:7.2 as dev
COPY dockerfiles/php-nginx/conf/dev/vhost.conf /opt/docker/etc/nginx/vhost.conf
WORKDIR /app

FROM webdevops/php-nginx:7.2 as builder
COPY ./ /app
WORKDIR /app
ENV COMPOSER_ALLOW_SUPERUSER 1
RUN composer install
#
#FROM node:8 as node-builder
#COPY ./ /home/node/app
#ENV NODE_ENV=production
#WORKDIR /home/node/app
#RUN npm install

FROM webdevops/php-nginx:7.2 as prod
COPY dockerfiles/php-nginx/conf/prod/vhost.conf /opt/docker/etc/nginx/vhost.conf
COPY --from=builder /app /app
#COPY --from=node-builder /home/node/app/node_modules /app/node_modules
WORKDIR /app
RUN chown -R 1000:1000 ./ && \
    chmod -R 775 storage && \
    chmod -R 775 bootstrap/cache
