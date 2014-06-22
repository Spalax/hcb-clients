<?php

namespace Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration,
    Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your need!
 */
class Version20140101010201_HcbClient extends AbstractMigration
{
    public function up(Schema $schema)
    {
        $this->addSql('INSERT IGNORE INTO `role` (`name`) VALUES ("client");');
        $this->addSql('INSERT IGNORE INTO `role_has_role` (`role_id`, `child_role_id`)  VALUES (LAST_INSERT_ID(), (SELECT id FROM role WHERE name = "user"));');
    }

    public function down(Schema $schema)
    {
        $this->addSql('DELETE FROM `role` WHERE `name` = "client"');
    }
}
