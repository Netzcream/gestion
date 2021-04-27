<?php

declare(strict_types=1);

namespace DoctrineMigrationsGeneral;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210427144947 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE correo (id INT AUTO_INCREMENT NOT NULL, id_crm VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE contacto ADD correo_id INT DEFAULT NULL, ADD correo_alternativo_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE contacto ADD CONSTRAINT FK_2741493C1CA6755A FOREIGN KEY (correo_id) REFERENCES correo (id)');
        $this->addSql('ALTER TABLE contacto ADD CONSTRAINT FK_2741493C629CE7EE FOREIGN KEY (correo_alternativo_id) REFERENCES correo (id)');
        $this->addSql('CREATE INDEX IDX_2741493C1CA6755A ON contacto (correo_id)');
        $this->addSql('CREATE INDEX IDX_2741493C629CE7EE ON contacto (correo_alternativo_id)');
        $this->addSql('ALTER TABLE empresa ADD correo_id INT DEFAULT NULL, ADD correo_alternativo_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE empresa ADD CONSTRAINT FK_B8D75A501CA6755A FOREIGN KEY (correo_id) REFERENCES correo (id)');
        $this->addSql('ALTER TABLE empresa ADD CONSTRAINT FK_B8D75A50629CE7EE FOREIGN KEY (correo_alternativo_id) REFERENCES correo (id)');
        $this->addSql('CREATE INDEX IDX_B8D75A501CA6755A ON empresa (correo_id)');
        $this->addSql('CREATE INDEX IDX_B8D75A50629CE7EE ON empresa (correo_alternativo_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE contacto DROP FOREIGN KEY FK_2741493C1CA6755A');
        $this->addSql('ALTER TABLE contacto DROP FOREIGN KEY FK_2741493C629CE7EE');
        $this->addSql('ALTER TABLE empresa DROP FOREIGN KEY FK_B8D75A501CA6755A');
        $this->addSql('ALTER TABLE empresa DROP FOREIGN KEY FK_B8D75A50629CE7EE');
        $this->addSql('DROP TABLE correo');
        $this->addSql('DROP INDEX IDX_2741493C1CA6755A ON contacto');
        $this->addSql('DROP INDEX IDX_2741493C629CE7EE ON contacto');
        $this->addSql('ALTER TABLE contacto DROP correo_id, DROP correo_alternativo_id');
        $this->addSql('DROP INDEX IDX_B8D75A501CA6755A ON empresa');
        $this->addSql('DROP INDEX IDX_B8D75A50629CE7EE ON empresa');
        $this->addSql('ALTER TABLE empresa DROP correo_id, DROP correo_alternativo_id');
    }
}
