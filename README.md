# qiyukf
PHP SDK for qiyukf

## Installation  
```shell
composer require genepeng/qiyukf`
```

## Example for sending message
```php
use genepeng\qiyukf\Message\Text;
use genepeng\qiyukf\Foundation\ServiceContainer;

$config = [
    'app_key' => 'your-qiyu-key',
    'app_secret' => 'your-qiyu-secret',
    'http_timeout' => 5,
    'log_file' => '../var/logs/qiyu.log',
    'log_level' => 'debug',
    'debug' => true,
];
$qiyu = new ServiceContainer($config);
$message = new Text();
$message->setContent('test message via genepeng/qiyukf');
$message->setUid('user-id-of-your-app');
$qiyu->message->send($message);
```

