INTRODUCTION
============================

fana.com.br is based on Yii 2 Basic Project Template.

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

The minimum requirement by this project template that your Web server supports PHP 5.4.0.


INSTALLATION
------------

http://www.yiiframework.com/doc-2.0/guide-start-installation.html

CONFIGURATION
-------------

### Database

Edit the file `config/params.php` with real data, for example:

```php
return [
    'adminEmail' => '',
    'cookieValidationKey' => '',
    'db_user' => '',
    'db_pass' => '',
    'db_host' => '',
    'db_base' => '',
];
```

**NOTES:**
- Yii won't create the database for you, this has to be done manually before you can access it.
- Check and edit the other files in the `config/` directory to customize your application as required.
- Refer to the README in the `tests` directory for information specific to basic application tests.
