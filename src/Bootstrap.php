<?php declare(strict_types = 1);

namespace Example;

use \Whoops\Run;
use \Whoops\Handler\PrettyPageHandler;

require __DIR__ . '/../vendor/autoload.php';

error_reporting(E_ALL);

$environment = 'development';

$whoops = new Run;

if ($environment !== 'production') {
    $whoops->pushHandler(new PrettyPageHandler);
} else {
    $whoops->pushHandler(function($e) {
        echo 'TODO';
    });
}

$whoops->register();
