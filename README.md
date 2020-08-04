git clone https://github.com/sahartak2025/laravel_test.git
composer install
create .env file from .env.example
create database and put credantials to .env file
put your api key to .env file (API_KEY)
put your MAIL_USERNAME and MAIL_PASSWORD values in .env file
create virtual host for project 
run migrations - php artisan migrate
run seeds - php artisan db:seed



api Urls  (Use this header  ['Authorization' => 'YOUR_API_KEY'])

For getting all users list send Get request to http://YourDomain/api/all-users 
For getting user details send Get request to http://YourDomain/api/user/{userId}
For creating new user send Post request to http://YourDomain/api/user with params (name, surname, email, event_id)
For updating user details send Put request to http://YourDomain/api/user/{userId} with updating params (name, surname, email, event_id)
For delating user send Delete request to http://YourDomain/api/user/{userId} 


run Tests - php vendor/phpunit/phpunit/phpunit
run queues - php artisan queue:work

