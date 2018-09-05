# https://hub.docker.com/_/mysql/
sudo docker run --name herokuwp-db --rm -p 127.0.0.1:3306:3306 \
  -v $PWD/support/vagrant/root/etc/mysql/conf.d:/etc/mysql/conf.d \
  -e MYSQL_ROOT_PASSWORD=password -e MYSQL_USER=herokuwp -e MYSQL_PASSWORD=password -e MYSQL_DATABASE=herokuwp \
  -d mysql:5

sudo docker run --name herokuwp-php --rm -p 127.0.0.1:9000:9000 \
  --link herokuwp-db:herokuwp \
  -v $PWD/bin:/app/bin:ro  -v $PWD/public.built:/app/public.built:ro  -v $PWD/vendor:/app/vendor:ro \
  -d php:7-fpm

# https://hub.docker.com/r/xqdocker/ubuntu-nginx/
sudo docker run --name herokuwp-web --rm -p 127.0.0.1:80:80  \
  --link herokuwp-db:herokuwp --link herokuwp-php:php \
  -v $PWD/support:/app/support:rw  -v $PWD/php:/app/php:ro -v $PWD/support/vagrant/root/etc/ssl:/etc/ssl:ro  -v $PWD/support/vagrant/root/etc/nginx/conf.d:/etc/nginx/conf.d:ro  -v $PWD/public.built:/app/public.built:ro  \
  -d xqdocker/ubuntu-nginx
gi