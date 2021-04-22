<?php

declare(strict_types=1);

namespace DoctrineMigrations\General;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210422151252 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) DEFAULT NULL, is_active TINYINT(1) DEFAULT NULL, is_verified TINYINT(1) NOT NULL, google_id VARCHAR(255) DEFAULT NULL, enabled TINYINT(1) DEFAULT NULL, locale VARCHAR(255) DEFAULT NULL, nombre VARCHAR(255) DEFAULT NULL, apellido VARCHAR(255) DEFAULT NULL, google_avatar VARCHAR(255) DEFAULT NULL, fecha_crea DATETIME NOT NULL, ultimo_ingreso DATETIME DEFAULT NULL, avatar VARCHAR(255) DEFAULT NULL, facebook_id VARCHAR(255) DEFAULT NULL, facebook_avatar VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE user');
    }
}
