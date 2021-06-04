# Please be aware that artifacts.aa.com/docker-all/library/ is added for proxying images in American Airlines.

FROM redis:6-alpine
COPY ./config/redis.conf /usr/local/etc/redis/redis.conf
CMD [ "redis-server", "/usr/local/etc/redis/redis.conf" ]