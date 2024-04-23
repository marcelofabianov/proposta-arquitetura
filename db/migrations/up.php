<?php

declare(strict_types=1);

namespace Db\migrations;

use App\Core\Database\Connection;
use Dotenv\Dotenv;

require __DIR__.'/../../vendor/autoload.php';

$dotenv = Dotenv::createImmutable(dirname(__DIR__, 2));
$dotenv->load();

$adapter = (new Connection())->getAdapter();

$files = glob(__DIR__.'/ddl/*.php');

foreach ($files as $file) {
    $class = require $file;
    if (is_object($class)) {
        $class->up($adapter);
    }
}
