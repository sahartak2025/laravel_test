git clone https://github.com/sahartak2025/laravel_test.git<br>
composer install<br>
create .env file from .env.example<br>
create database and put credantials to .env file<br><br>
put your api key to .env file (API_KEY)<br>
put your MAIL_USERNAME and MAIL_PASSWORD values in .env file<br>
create virtual host for project <br>
run migrations - php artisan migrate<br>
run seeds - php artisan db:seed<br><br>



api Urls  (Use this header  ['Authorization' => 'YOUR_API_KEY'])<br>

For getting all users list send Get request to http://YourDomain/api/all-users <br><br>
For getting user details send Get request to http://YourDomain/api/user/{userId}<br>
For creating new user send Post request to http://YourDomain/api/user with params (name, surname, email, event_id)<br>
For updating user details send Put request to http://YourDomain/api/user/{userId} with updating params (name, surname, email, event_id)<br>
For delating user send Delete request to http://YourDomain/api/user/{userId} <br>
<br>

run Tests - php vendor/phpunit/phpunit/phpunit<br>
run queues - php artisan queue:work<br>

