## Deployment
- Copy .env.example to another new file, put it .env

You must run these commands to deploy the project successfully

- composer install
- php artisan key:generate
- php artisan migrate
- php artisan jwt:secret
- php artisan db:seed

After run last command, you will have a user to access through MoneyXChange Landing Project:

- email: testy@moneyxchange.io
- password: secret