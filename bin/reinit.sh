#!/usr/bin/env bash
set -x

if [ "$#" != 1 ]
then
    echo "Usage: reinit.sh env"
fi

if [ -z $1 ]
then
    env=${APP_ENV}
else
    env=$1
fi

cd /var/www/html/back

# if [ ${env} = "pr" ] || [ ${env} = "pp" ]
# then
# chown -Rf apache:apache ./
# else
# chown -Rf www-data:www-data ./
# fi

rm -Rf var/cache/*
rm -Rf var/log/*

php bin/console cache:warmup -e $1
php bin/console assets:install -e $1

php bin/console doctrine:database:drop --force -e $1
php bin/console doctrine:database:create -e $1
php bin/console doctrine:migration:migrate --no-interaction -e $1

# if [ ${env} != "test" ]
# then
#     if [ ${env} = "pr" ] || [ ${env} = "pp" ]
#     then
#     php -d memory_limit=2048M bin/console doctrine:database:import import/data.sql -e $1
#     else
#     php bin/console doctrine:database:import import/data.sql -e $1
#     fi
    
#     php bin/console app:chapters-family -e $1
#     php bin/console app:mapping-appro -e $1
#     php bin/console app:clean-id-zero -e $1    
# fi

# php bin/console app:create-platforms -e $1

php bin/console hautelook:fixtures:load --no-interaction --append -e $1