# https://hub.docker.com/_/mysql/
sudo docker run --name herokuwp-db -v $HOME/Projects/deep-change-preview/support/vagrant/root/etc/mysql:/etc/mysql -e MYSQL_ROOT_PASSWORD=password -d mysql

# https://hub.docker.com/r/xqdocker/ubuntu-nginx/
sudo docker run --name herokuwp-web -v $HOME/Projects/deep-change-preview/support/vagrant/root/etc/nginx/sites-enabled:/etc/nginx/sites-enabled:ro -d xqdocker/ubuntu-nginx
