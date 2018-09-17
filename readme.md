schema.sql - схема базы данных

queries.sql - запросы из тз


Развертывание
-
- composer install
- Создать файл .env, указать параметры подключения к БД postgresql
- выполнить команду "php artisan migrate:refresh --seed" либо накатить дамп из файла dump.sql
- запустить сервер php artisan serve
 