<?php

declare(strict_types=1);

use Db\migrations\IMigration;
use Laminas\Db\Adapter\AdapterInterface;
use Laminas\Db\Sql\Ddl\Column\Boolean;
use Laminas\Db\Sql\Ddl\Column\Integer;
use Laminas\Db\Sql\Ddl\Column\Varchar;
use Laminas\Db\Sql\Ddl\Constraint\PrimaryKey;
use Laminas\Db\Sql\Ddl\Constraint\UniqueKey;
use Laminas\Db\Sql\Ddl\CreateTable;
use Laminas\Db\Sql\Ddl\DropTable;

return new class() implements IMigration {
    public function up(AdapterInterface $adapter): void
    {
        $table = new CreateTable('users');
        $table->addColumn(new Integer('id', true));
        $table->addColumn(new Varchar('name', 100));
        $table->addColumn(new Varchar('email', 255));
        $table->addColumn(new Varchar('password', 255));
        $table->addColumn(new Boolean('active', false, 0));

        $table->addConstraint(new PrimaryKey('id'));
        $table->addConstraint(new UniqueKey(['email']));

        $adapter->query(
            $table->getSqlString($adapter->getPlatform()),
            $adapter::QUERY_MODE_EXECUTE
        );
    }

    public function down(AdapterInterface $adapter): void
    {
        $table = new DropTable('users');

        $adapter->query(
            $table->getSqlString($adapter->getPlatform()),
            $adapter::QUERY_MODE_EXECUTE
        );
    }
};
