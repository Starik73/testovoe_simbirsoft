## Тестовое задание для SimbirSoft:
<p>
    Сделай четыре страницы: <br>
    - Страница регистрации пользователя, <br>
    - Cтраница с формой для ввода данных, закрытая авторизацией <br>
    - Cтраница с выводом данных, закрытая авторизацией <br>
    - Главная страница со ссылками на все остальные страницы, например в виде удобного меню
</p>
<p>
    Кроме стандартного класса регистрации сделай класс с двумя методами (название страниц ты можешь сделать любыми, на твой вкус)
</p>
<p>
    Логику методов мы видим такой: на одной странице будет форма отправки сообщений в RabbitMQ, на второй-вывод сообщений из очереди RabbitMQ на страницу.
</p>
<p>
    Оформляй клиент для отправки и получения сообщений из RabbitMQ в сервис-контейнер и подключай его через внедрение зависимостей (Dependencyinjection,DI).Если не знаешь, изучи, у нас такое придется использовать на каждом шагу
</p>
<p>
    Закрой страницу вывода сообщений из RabbitMQ авторизацией
</p>
<p>
    Форма с регистрацией должна единожды создавать только одного пользователявбд,дляпроверкивыводасообщений.Послерегистрации первого пользователя, закрывай страницу регистрации от всех дальнейших переходов. У пользователя должен быть доступ к странице вывода.
</p>
<p>
    Сделай все красиво и аккуратно, но без навороченного frontend`а (например, используй Twitter Bootstrap)
</p>

## Дла развертывания предложения необходимо:
0) Проверить настройки окружения:
- версия Laravel v8.76.2
- версия PHP v7.4.14
- версия mysql не ниже 5.7
- apache 2.4
- развернутый RabbitMQ 3.9.11 (в windows 10 + Erlang 24.2)
(не проверялась работоспособность на версиях ниже указанных)
1) Клонировать репозиторий в корень сайта
2) Если в окружении используется не apache, а nginx - настроить чтобы смотрел в папку public
3) Внести изменения в файл .env:
* Подключение к базе данных
* (в моем случае локально)
- DB_CONNECTION=mysql 
- DB_HOST=127.0.0.1
- DB_PORT=3306
- DB_DATABASE=testovoe_bd
- DB_USERNAME=root
- DB_PASSWORD=root
* Подключение к rabbitmq
* (в моем случае развернут локально, с дефолтным портом 5672)
- QUEUE_CONNECTION=rabbitmq
- RABBITMQ_HOST=localhost
- RABBITMQ_PORT=5672
- RABBITMQ_USER=guest
- RABBITMQ_PASSWORD=guest
- RABBITMQ_VHOST=/
- RABBITMQ_QUEUE=jobs
4) Запустить в терминале composer install для установки зависимостей (если composer у вас установлен глобально).
5) Выполнить npm install для установки зависимостей (если Node.js and NPM установлен).
6) После проверки корректного подключения к БД выполнить миграции : php artisan migrate
7) Зарегистрировать первого пользователя
8) Для запуска тестового consume-ра - выполнить команду php artisan queue:listen
9) Если при постановке в очередь консьюмер не был запущен - включить его и при получении данных из "кролика" - сервис автоматически добавит запись в БД и она будет доступна на странице вывода

PS .gitignore не редактировал - стандартный от Laravel 

Автор: Асташенков Алексей
