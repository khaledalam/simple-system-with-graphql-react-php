NAME="simplesystem"
PORT=8002
PORT_INNER=80

PORT_SQL=3002
PORT_INNER_SQL=3306

DB_NAME="simplesystem"
REPO="git@github.com:khaledalam/simple-system-with-graphql-react-php.git"


sudo rm -rf ${NAME};
git clone ${REPO} ~/${NAME};


docker rm ${NAME} --force || true;

docker run -d \
	-p ${PORT}:${PORT_INNER} \
        -p ${PORT_SQL}:${PORT_INNER_SQL} \
	-v ~/${NAME}:/app \
        --name ${NAME} khaledalam/awesome-docker-lamp:latest-without-node

sleep 20;

docker exec -i ${NAME} mysql -uroot -e "create database ${DB_NAME};"

sleep 3;

docker exec -i ${NAME} bash -c "cd app \
	&& composer install -n \
        && yarn install \
        && yarn encore dev \
        && php bin/console doctrine:database:create \
        && php bin/console doctrine:schema:update --force -n \
        && php bin/console doctrine:fixtures:load -n \
	&& php bin/console server:start"
