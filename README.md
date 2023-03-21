# apinotebook

**Задание**

https://github.com/fugr-ru/php-laravel

Разработать REST API для записной книжки . Примерная структура методов:
+ 1.1. GET /api/v1/notebook/
+ 1.2. POST /api/v1/notebook/
+ 1.3. GET /api/v1/notebook/<id>/
+ 1.4. POST /api/v1/notebook/<id>/
+ 1.5. DELETE /api/v1/notebook/<id>/

Поля для POST запискной книжки:
1. ФИО (обязательное)
2. Компания
3. Телефон (обязательное)
4. Email (обязательное)
5. Дата рождения 
6. Фото
  
**Выполнение**
  
Swagger для отображения методов api (https://app.swaggerhub.com/apis/TiZir/notebook/0.0.1)
  
Инструменты:
+ Apache Server version: Apache/2.4.52 (Ubuntu)
+ mysql Ver 8.0.32-0ubuntu0.22.04.2 for Linux on x86_64 ((Ubuntu))
+ PHP 8.1.2-1ubuntu2.11 (cli)
  (NTS)Copyright (c) The PHP Group
  Zend Engine v4.1.2, Copyright (c) Zend Technologieswith Zend OPcache v8.1.2-1ubuntu2.11, Copyright (c), by Zend Technologies
+ hpmyadmin     4:5.1.1+dfsg1-5ubuntu1 all 
  
Тестирование:
+ Тестировал свое api через Postman for Linux (Version 10.12.4). Post дополнительно проверял чрез БД,так как не смог сделать отправку изображения через json (encode decode base64), пришлось через $_FILES
  
Файлы:
  + api/.htaccess - настройки сервера apache (получения query url)
  + api/config.php - конфигурация подключения к mysql
  + api/requiredb.php - запросы к БД
  + api/v1 - работа api
  + index.html - документ с формой
  + main.js - функции получения get для формы и отправки delete из формы
  + api.sql - дамп БД
  
Установка:
  Установить Apache  для запуска локального сервера
  Установить mysql  для БД
  Создать базу данных под названием api, а в ней создать таблицу users. Не забыть поменять файл конфигурации api/config.php
  Все пути прописаны от http://localhost/ , порт стандартный (80)
  
Работа:
  Форма позволяет удалять и добавлять данные. После добавления требуется обновить страницу для отображения новых данных. При удалении список обновляется автоматический

