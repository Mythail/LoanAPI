# API для подачи и обработки заявки на займ

Тестовое задание для компании Wiam Group.
Затраченное время на выполнение задания: 5 часов.

## Стек технологий

- Docker Compose
- PHP 8.4
- Nginx
- Yii2 Framework
- PostgreSQL 17

## Требования

- [Docker](https://www.docker.com/products/docker-desktop/)
- Docker Compose

## Установка и запуск

1. Клонировать репозиторий:
   ```shell
   git clone https://github.com/Mythail/LoanAPI.git
   cd LoanAPI
   ```
2. Создать файл `.env` в корневой директории проекта и скопировать в него содержимое файла `.env.example`.
   В нем содержатся переменные среды и данные для подключения к базе данных.
3. Собрать и запустить Docker-контейнеры:
   ```shell
   docker compose up --build
   ```
4. Установить зависимости Composer в контейнере `loan-api-app`:
   ```shell
   docker compose exec app composer install --no-dev --optimize-autoloader
   ```
5. Выполнить миграции для создания структуры базы данных:
   ```shell
   docker compose exec app php yii migrate --interactive=0
   ```
6. Проект будет доступен по адресу http://localhost/.
