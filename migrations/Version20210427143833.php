<?php

declare(strict_types=1);

namespace DoctrineMigrationsGeneral;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210427143833 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE contacto (id INT AUTO_INCREMENT NOT NULL, tipo_documento_id INT DEFAULT NULL, genero_id INT DEFAULT NULL, nacionalidad_id INT DEFAULT NULL, estado_civil_id INT DEFAULT NULL, estado_id INT DEFAULT NULL, empresa_id INT DEFAULT NULL, id_crm VARCHAR(255) NOT NULL, nombre VARCHAR(255) NOT NULL, apellido VARCHAR(255) NOT NULL, fecha_nacimiento DATETIME DEFAULT NULL, documento VARCHAR(50) DEFAULT NULL, INDEX IDX_2741493CF6939175 (tipo_documento_id), INDEX IDX_2741493CBCE7B795 (genero_id), INDEX IDX_2741493CAB8DC0F8 (nacionalidad_id), INDEX IDX_2741493C75376D93 (estado_civil_id), INDEX IDX_2741493C9F5A440B (estado_id), INDEX IDX_2741493C521E1991 (empresa_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE contacto_estado (id INT AUTO_INCREMENT NOT NULL, id_crm VARCHAR(255) NOT NULL, nombre VARCHAR(255) NOT NULL, vigente TINYINT(1) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE direccion (id INT AUTO_INCREMENT NOT NULL, pais_id INT DEFAULT NULL, contacto_id INT DEFAULT NULL, empresa_id INT DEFAULT NULL, id_crm VARCHAR(255) NOT NULL, calle VARCHAR(255) DEFAULT NULL, numero VARCHAR(20) DEFAULT NULL, informacion_adicional VARCHAR(255) DEFAULT NULL, provincia VARCHAR(255) DEFAULT NULL, localidad VARCHAR(255) DEFAULT NULL, vigente TINYINT(1) DEFAULT NULL, INDEX IDX_F384BE95C604D5C6 (pais_id), INDEX IDX_F384BE956B505CA9 (contacto_id), INDEX IDX_F384BE95521E1991 (empresa_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE empresa (id INT AUTO_INCREMENT NOT NULL, tipo_documento_id INT DEFAULT NULL, estado_id INT DEFAULT NULL, id_crm VARCHAR(255) NOT NULL, razon_social VARCHAR(255) NOT NULL, nombre_fantasia VARCHAR(255) DEFAULT NULL, documento VARCHAR(50) DEFAULT NULL, cliente TINYINT(1) DEFAULT NULL, proveedor TINYINT(1) DEFAULT NULL, INDEX IDX_B8D75A50F6939175 (tipo_documento_id), INDEX IDX_B8D75A509F5A440B (estado_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE empresa_contacto (empresa_id INT NOT NULL, contacto_id INT NOT NULL, INDEX IDX_27C80EF7521E1991 (empresa_id), INDEX IDX_27C80EF76B505CA9 (contacto_id), PRIMARY KEY(empresa_id, contacto_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE empresa_estado (id INT AUTO_INCREMENT NOT NULL, id_crm VARCHAR(255) NOT NULL, nombre VARCHAR(255) NOT NULL, vigente TINYINT(1) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE estado_civil (id INT AUTO_INCREMENT NOT NULL, id_crm VARCHAR(255) NOT NULL, nombre VARCHAR(255) NOT NULL, vigente TINYINT(1) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE genero (id INT AUTO_INCREMENT NOT NULL, id_crm VARCHAR(255) NOT NULL, nombre VARCHAR(255) NOT NULL, vigente TINYINT(1) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pais (id INT AUTO_INCREMENT NOT NULL, id_crm VARCHAR(255) NOT NULL, nombre VARCHAR(255) NOT NULL, iso VARCHAR(255) DEFAULT NULL, nombre_corto VARCHAR(255) DEFAULT NULL, vigente TINYINT(1) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tipo_documento (id INT AUTO_INCREMENT NOT NULL, id_crm VARCHAR(255) NOT NULL, nombre VARCHAR(255) NOT NULL, vigente TINYINT(1) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) DEFAULT NULL, is_active TINYINT(1) DEFAULT NULL, is_verified TINYINT(1) NOT NULL, google_id VARCHAR(255) DEFAULT NULL, enabled TINYINT(1) DEFAULT NULL, locale VARCHAR(255) DEFAULT NULL, nombre VARCHAR(255) DEFAULT NULL, apellido VARCHAR(255) DEFAULT NULL, google_avatar VARCHAR(255) DEFAULT NULL, fecha_crea DATETIME NOT NULL, ultimo_ingreso DATETIME DEFAULT NULL, avatar VARCHAR(255) DEFAULT NULL, facebook_id VARCHAR(255) DEFAULT NULL, facebook_avatar VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE contacto ADD CONSTRAINT FK_2741493CF6939175 FOREIGN KEY (tipo_documento_id) REFERENCES tipo_documento (id)');
        $this->addSql('ALTER TABLE contacto ADD CONSTRAINT FK_2741493CBCE7B795 FOREIGN KEY (genero_id) REFERENCES genero (id)');
        $this->addSql('ALTER TABLE contacto ADD CONSTRAINT FK_2741493CAB8DC0F8 FOREIGN KEY (nacionalidad_id) REFERENCES pais (id)');
        $this->addSql('ALTER TABLE contacto ADD CONSTRAINT FK_2741493C75376D93 FOREIGN KEY (estado_civil_id) REFERENCES estado_civil (id)');
        $this->addSql('ALTER TABLE contacto ADD CONSTRAINT FK_2741493C9F5A440B FOREIGN KEY (estado_id) REFERENCES contacto_estado (id)');
        $this->addSql('ALTER TABLE contacto ADD CONSTRAINT FK_2741493C521E1991 FOREIGN KEY (empresa_id) REFERENCES empresa (id)');
        $this->addSql('ALTER TABLE direccion ADD CONSTRAINT FK_F384BE95C604D5C6 FOREIGN KEY (pais_id) REFERENCES pais (id)');
        $this->addSql('ALTER TABLE direccion ADD CONSTRAINT FK_F384BE956B505CA9 FOREIGN KEY (contacto_id) REFERENCES contacto (id)');
        $this->addSql('ALTER TABLE direccion ADD CONSTRAINT FK_F384BE95521E1991 FOREIGN KEY (empresa_id) REFERENCES empresa (id)');
        $this->addSql('ALTER TABLE empresa ADD CONSTRAINT FK_B8D75A50F6939175 FOREIGN KEY (tipo_documento_id) REFERENCES tipo_documento (id)');
        $this->addSql('ALTER TABLE empresa ADD CONSTRAINT FK_B8D75A509F5A440B FOREIGN KEY (estado_id) REFERENCES empresa_estado (id)');
        $this->addSql('ALTER TABLE empresa_contacto ADD CONSTRAINT FK_27C80EF7521E1991 FOREIGN KEY (empresa_id) REFERENCES empresa (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE empresa_contacto ADD CONSTRAINT FK_27C80EF76B505CA9 FOREIGN KEY (contacto_id) REFERENCES contacto (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE direccion DROP FOREIGN KEY FK_F384BE956B505CA9');
        $this->addSql('ALTER TABLE empresa_contacto DROP FOREIGN KEY FK_27C80EF76B505CA9');
        $this->addSql('ALTER TABLE contacto DROP FOREIGN KEY FK_2741493C9F5A440B');
        $this->addSql('ALTER TABLE contacto DROP FOREIGN KEY FK_2741493C521E1991');
        $this->addSql('ALTER TABLE direccion DROP FOREIGN KEY FK_F384BE95521E1991');
        $this->addSql('ALTER TABLE empresa_contacto DROP FOREIGN KEY FK_27C80EF7521E1991');
        $this->addSql('ALTER TABLE empresa DROP FOREIGN KEY FK_B8D75A509F5A440B');
        $this->addSql('ALTER TABLE contacto DROP FOREIGN KEY FK_2741493C75376D93');
        $this->addSql('ALTER TABLE contacto DROP FOREIGN KEY FK_2741493CBCE7B795');
        $this->addSql('ALTER TABLE contacto DROP FOREIGN KEY FK_2741493CAB8DC0F8');
        $this->addSql('ALTER TABLE direccion DROP FOREIGN KEY FK_F384BE95C604D5C6');
        $this->addSql('ALTER TABLE contacto DROP FOREIGN KEY FK_2741493CF6939175');
        $this->addSql('ALTER TABLE empresa DROP FOREIGN KEY FK_B8D75A50F6939175');
        $this->addSql('DROP TABLE contacto');
        $this->addSql('DROP TABLE contacto_estado');
        $this->addSql('DROP TABLE direccion');
        $this->addSql('DROP TABLE empresa');
        $this->addSql('DROP TABLE empresa_contacto');
        $this->addSql('DROP TABLE empresa_estado');
        $this->addSql('DROP TABLE estado_civil');
        $this->addSql('DROP TABLE genero');
        $this->addSql('DROP TABLE pais');
        $this->addSql('DROP TABLE tipo_documento');
        $this->addSql('DROP TABLE user');
    }
}
