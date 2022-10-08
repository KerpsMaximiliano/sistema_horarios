<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221008060922 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE cuota (id INT AUTO_INCREMENT NOT NULL, usuario_id INT DEFAULT NULL, mes VARCHAR(255) NOT NULL, pago TINYINT(1) NOT NULL, INDEX IDX_763CCB0FDB38439E (usuario_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE materia (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(255) NOT NULL, descripcion VARCHAR(255) NOT NULL, hora_inicio INT NOT NULL, hora_fin INT NOT NULL, aula VARCHAR(255) NOT NULL, estado VARCHAR(255) NOT NULL, dia VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE notificacion (id INT AUTO_INCREMENT NOT NULL, titulo VARCHAR(255) NOT NULL, descripcion VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE usuario (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, documento INT NOT NULL, nombre VARCHAR(255) NOT NULL, apellido VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_2265B05DE7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE usuario_materia (usuario_id INT NOT NULL, materia_id INT NOT NULL, INDEX IDX_14D6F8C3DB38439E (usuario_id), INDEX IDX_14D6F8C3B54DBBCB (materia_id), PRIMARY KEY(usuario_id, materia_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE usuario_notificacion (usuario_id INT NOT NULL, notificacion_id INT NOT NULL, INDEX IDX_78A29C39DB38439E (usuario_id), INDEX IDX_78A29C394D633FC4 (notificacion_id), PRIMARY KEY(usuario_id, notificacion_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE cuota ADD CONSTRAINT FK_763CCB0FDB38439E FOREIGN KEY (usuario_id) REFERENCES usuario (id)');
        $this->addSql('ALTER TABLE usuario_materia ADD CONSTRAINT FK_14D6F8C3DB38439E FOREIGN KEY (usuario_id) REFERENCES usuario (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE usuario_materia ADD CONSTRAINT FK_14D6F8C3B54DBBCB FOREIGN KEY (materia_id) REFERENCES materia (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE usuario_notificacion ADD CONSTRAINT FK_78A29C39DB38439E FOREIGN KEY (usuario_id) REFERENCES usuario (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE usuario_notificacion ADD CONSTRAINT FK_78A29C394D633FC4 FOREIGN KEY (notificacion_id) REFERENCES notificacion (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cuota DROP FOREIGN KEY FK_763CCB0FDB38439E');
        $this->addSql('ALTER TABLE usuario_materia DROP FOREIGN KEY FK_14D6F8C3DB38439E');
        $this->addSql('ALTER TABLE usuario_materia DROP FOREIGN KEY FK_14D6F8C3B54DBBCB');
        $this->addSql('ALTER TABLE usuario_notificacion DROP FOREIGN KEY FK_78A29C39DB38439E');
        $this->addSql('ALTER TABLE usuario_notificacion DROP FOREIGN KEY FK_78A29C394D633FC4');
        $this->addSql('DROP TABLE cuota');
        $this->addSql('DROP TABLE materia');
        $this->addSql('DROP TABLE notificacion');
        $this->addSql('DROP TABLE usuario');
        $this->addSql('DROP TABLE usuario_materia');
        $this->addSql('DROP TABLE usuario_notificacion');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
