schema.sql - схема базы данных

queries.sql - запросы из тз


Развертывание
-
- composer install
- Создать файл .env из .env.example, указать параметры подключения к БД postgresql
- выполнить команду "php artisan migrate:refresh --seed" либо накатить дамп из файла dump.sql
- выполнить команду "php artisan key:generate"
- запустить сервер командой "php artisan serve"
 