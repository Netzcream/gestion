php bin/console assets:install
php bin/console cache:clear --env=dev
php bin/console cache:clear --env=prod --no-debug
yarn encore dev