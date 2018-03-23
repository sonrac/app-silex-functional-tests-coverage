<?php

declare(strict_types=1);

namespace Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;
use Doctrine\DBAL\Types\Type;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180323131359 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        $table = $schema->createTable('users');
        $table->addColumn('id', Type::INTEGER)
            ->setAutoincrement(true);
        $table->addColumn('username', Type::STRING)
            ->setLength(255);
        $table->addColumn('password', Type::STRING)
            ->setLength(2000);
    }

    public function down(Schema $schema)
    {
        $schema->dropTable('users');
    }
}
