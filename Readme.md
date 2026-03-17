# TaskMarket

Веб-приложение для размещения заданий и взаимодействия между заказчиками и исполнителями.

Пользователь может публиковать задания, откликаться на них, выбирать исполнителей и оставлять отзывы после завершения работы.

Проект разработан в рамках дипломной работы.

---

## Технологии

- PHP 8.1
- Yii2
- MySQL 8
- Docker / Docker Compose
- Яндекс ID OAuth
- Яндекс Геокодер API

---

## Функционал

- Регистрация и авторизация (форма + Яндекс ID)
- Роли пользователей: заказчик и исполнитель
- Публикация и просмотр заданий
- Отклик на задание, выбор исполнителя
- Управление статусами задания
- Отзывы и рейтинг исполнителей
- Геокодирование адресов через Яндекс API

---

## Запуск через Docker

### Требования

- Docker
- Docker Compose

### Установка

Клонировать репозиторий:

```bash
git clone https://github.com/AnastasiiaXX/diploma.git
cd diploma
```

Создать файл `.env` на основе `.env.example`:

```bash
cp .env.example .env
```

Заполнить `.env`:

```
MYSQL_ROOT_PASSWORD=root
MYSQL_DATABASE=task_force
MYSQL_USER=app
MYSQL_PASSWORD=

YANDEX_CLIENT_ID=
YANDEX_CLIENT_SECRET=
YANDEX_GEOCODER_API_KEY=
```

Запустить контейнеры:

```bash
docker-compose up -d
```

Применить схему базы данных:

```bash
docker-compose exec -T mysql mysql -u root -proot task_force < sql/schema.sql
```

Заполнить справочники:

```bash
docker-compose exec -T mysql mysql -u root -proot task_force < sql/locations.sql
docker-compose exec -T mysql mysql -u root -proot task_force < sql/categories.sql
```

Инициализировать роли RBAC:

```bash
docker-compose exec php php yii rbac/init
```

Приложение будет доступно по адресу: **https://taskmarket.space**

---

## Структура проекта

```
assets/        — frontend-ресурсы
commands/      — консольные команды
config/        — конфигурация приложения
controllers/   — контроллеры
models/        — модели
services/      — сервисный слой
sql/           — SQL-скрипты
views/         — представления
web/           — точка входа (public)
```

---

## Автор

Анастасия Кононова
