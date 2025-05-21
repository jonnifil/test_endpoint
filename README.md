Инструкция локального развёртывания (если установлен docker и docker-compose):
Клонируем репу
Копируем содержимое папки docker-example в корень проекта
Выполняем docker-compose up -d --build (возможно придётся изменить проброс портов в docker-compose.yml, если указанные у вас заняты)
Выполняем docker-compose exec app composer install (проверяем, что создан файл .env и его содержимое аналогично .env.example)
Выполняем docker-compose exec app php artisan migrate

Роут доступен по адресу POST http://localhost:288/api/set-message
