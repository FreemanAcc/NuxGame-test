# NuxGame Test Project

## Описание

Этот проект представляет собой веб-приложение с регистрационной формой и уникальной ссылкой для пользователя, которая действует в течение 7 дней. После регистрации пользователю предоставляется доступ к специальной странице, на которой можно сгенерировать новый уникальный линк, деактивировать текущий и воспользоваться функцией "I'm Feeling Lucky". 

## Требования

- PHP >= 8.0
- Composer
- WAMP (или другой сервер, поддерживающий PHP)
- Расширение SQLite для PHP

## Установка и настройка

### 1. Клонируйте репозиторий

```bash
git clone https://github.com/FreemanAcc/NuxGame-test.git
cd nuxgame-test

DB_CONNECTION=sqlite
DB_DATABASE=/full/path/to/your/project/database/database.sqlite

CACHE_DRIVER=file

QUEUE_CONNECTION=sync

php artisan migrate

php artisan serve
http://localhost:8000