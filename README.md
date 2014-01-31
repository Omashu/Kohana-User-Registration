Установка
=========

* Тянем репозиторий `git clone https://github.com/Omashu/Kohana-User-Registration.git omatest && cd omatest`
* Тянем субмодули `git submodule update --init --recursive`
* Создать базу данных
* Выполнить SQL запросы из файла `dump.sql`
* В конфигурации `www/application/config/database.php` указать данные для установки соединение с mysql сервером
* Запускаем веб-сервер `cd www && php -S localhost:8888 -t .` (для php >= 5.4)
* В адресной строке браузера набираем `http://localhost:8888/` - тестируем регистрацию