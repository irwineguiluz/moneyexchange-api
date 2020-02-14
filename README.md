## Deployment
- Copy .env.example to another new file, call it .env. Later, you have to create your database and set it in the file created previously.

You must run these commands to deploy the project successfully

- composer install
- php artisan key:generate
- php artisan migrate
- php artisan jwt:secret
- php artisan db:seed

After run last command, you will have a user to access through MoneyXChange Landing Project:

- email: testy@moneyxchange.io
- password: secret