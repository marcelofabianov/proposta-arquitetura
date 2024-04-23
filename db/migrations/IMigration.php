<?php

namespace Db\migrations;

use Laminas\Db\Adapter\AdapterInterface;

interface IMigration
{
    public function up(AdapterInterface $adapter): void;

    public function down(AdapterInterface $adapter): void;
}
