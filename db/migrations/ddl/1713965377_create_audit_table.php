<?php

declare(strict_types=1);

use Db\migrations\IMigration;
use Laminas\Db\Adapter\AdapterInterface;
use Laminas\Db\Sql\Ddl\Column\Integer;
use Laminas\Db\Sql\Ddl\Column\Timestamp;
use Laminas\Db\Sql\Ddl\Column\Varchar;
use Laminas\Db\Sql\Ddl\Constraint\PrimaryKey;
use Laminas\Db\Sql\Ddl\CreateTable;
use Laminas\Db\Sql\Ddl\DropTable;

return new class() implements IMigration {
    public function up(AdapterInterface $adapter): void
    {
        $table = new CreateTable('audit');
        $table->addColumn(new Integer('id', true));
        $table->addColumn(new Varchar('user_id', 255, false));
        $table->addColumn(new Varchar('aggregate_id', 255, false));
        $table->addColumn(new Varchar('event_id', 255));
        $table->addColumn(new Timestamp('created_at'));
        $table->addColumn(new Timestamp('updated_at'));
        $table->addColumn(new Timestamp('archived_at'));
        $table->addColumn(new Timestamp('deleted_at'));
        $table->addColumn(new Varchar('action', 15));
        $table->addColumn(new Integer('version_increment', false));

        $table->addConstraint(new PrimaryKey('id'));

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
