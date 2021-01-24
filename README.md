<p align="center">
    <h1 align="center">Минимизатор URL</h1>
</p>

<p>Тестовое задание "Реактор": минимизатор URL.<br> 
Задача выполнена с Yii 2 Basic Project Template.
</p>

DIRECTORY STRUCTURE
-------------------

      assets/             contains assets definition
      commands/           contains console commands (controllers)
      config/             contains application configurations
      controllers/        contains Web controller classes
      mail/               contains view files for e-mails
      models/             contains model classes
      runtime/            contains files generated during runtime
      tests/              contains various tests for the basic application
      vendor/             contains dependent 3rd-party packages
      views/              contains view files for the Web application
      web/                contains the entry script and Web resources



REQUIREMENTS
------------

PHP => 5.6


INSTALLATION
------------

Склонируйте себе проект

~~~
git clone 
~~~

Пройдите настройку базы данных


CONFIGURATION
-------------

### База данных

Отредактируйте файл `config/db.php`, например:

```php
return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=reactor',
    'username' => 'root',
    'password' => '1234',
    'charset' => 'utf8',
];
```

**NOTES:**
- Базу данных нужно создать самому, потом применить миграции.
- Команда для миграций:
    ```
    php yii migrate
    ```