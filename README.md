# Описание проекта

**Микросервис по получению погоды для городов**

Этот микросервис позволяет добавлять города и получать их текущую погоду через API. Он построен с использованием Laravel
и работает в Docker-контейнере.

Стек:
- PHP 8.2
- Laravel
- Nginx
- SQLite
- Docker

Дополнительно:
- Swagger
- Тесты

## Пошаговое руководство

### Общее

Перед запуском проекта, необходимо добавить следующие переменные в файл `.env`:
```env
APP_KEY=
DB_DATABASE=/var/www/database/database.sqlite
OPENWEATHER_API_KEY=
WEATHER_UPDATE_SCHEDULE="30 * * * *"  # Обновление погоды каждые 30 минут
```

### 1. Сборка проекта в Docker

```bash
docker compose build
```

### 2. Запуск проекта в Docker

```bash
docker compose up -d
```

### 3. Доступ к API и документации

После запуска проекта перейдите по следующим ссылкам для взаимодействия с API и просмотра документации:

Swagger-документация:

```bash
http://localhost:8000/api/documentation
```

Проверить наличие городов (GET):

```bash
http://localhost:8000/api/cities
```

Добавить город (POST):

```bash
http://localhost:8000/api/cities
```

Пример данных для добавления города:

```
{
    "name": "Moscow",
    "latitude": 55.7558,
    "longitude": 37.6173
}
```

Запросить погоду для города (по ID) (GET):

```bash
http://localhost:8000/api/weather/{city}
```

### 4. Прогон тестов

Для запуска тестов в контейнере, выполните следующие команды:

```bash
docker exec -it laravel_app bash
php artisan test
```

### Проверка очереди выполнения команд:

```bash
docker exec -it laravel_app bash
php artisan schedule:list
```

Вот и всё!
