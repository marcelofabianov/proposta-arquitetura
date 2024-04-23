<?php

declare(strict_types=1);

namespace Db\migrations;

use App\Core\Database\Postgres;
use Dotenv\Dotenv;
use Laminas\Db\Adapter\Adapter;

require __DIR__.'/../../vendor/autoload.php';

$dotenv = Dotenv::createImmutable(dirname(__DIR__, 2));
$dotenv->load();

$config = Postgres::fromEnv();

$adapter = new Adapter($config->toArray());

$files = glob(__DIR__.'/ddl/*.php');

foreach ($files as $file) {
    $class = require $file;
    if (is_object($class)) {
        $class->down($adapter);
    }
}
