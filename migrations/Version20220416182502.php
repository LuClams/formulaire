<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220416182502 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE booking CHANGE amount amount DOUBLE PRECISION DEFAULT NULL');
        $this->addSql('ALTER TABLE manager ADD hostel_id INT NOT NULL');
        $this->addSql('ALTER TABLE manager ADD CONSTRAINT FK_FA2425B9FC68ACC0 FOREIGN KEY (hostel_id) REFERENCES hostel (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_FA2425B9FC68ACC0 ON manager (hostel_id)');
        $this->addSql('ALTER TABLE room ADD manager_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE room ADD CONSTRAINT FK_729F519B783E3463 FOREIGN KEY (manager_id) REFERENCES manager (id)');
        $this->addSql('CREATE INDEX IDX_729F519B783E3463 ON room (manager_id)');
        $this->addSql('ALTER TABLE user CHANGE roles roles JSON NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE booking CHANGE amount amount DOUBLE PRECISION DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE manager DROP FOREIGN KEY FK_FA2425B9FC68ACC0');
        $this->addSql('DROP INDEX UNIQ_FA2425B9FC68ACC0 ON manager');
        $this->addSql('ALTER TABLE manager DROP hostel_id');
        $this->addSql('ALTER TABLE room DROP FOREIGN KEY FK_729F519B783E3463');
        $this->addSql('DROP INDEX IDX_729F519B783E3463 ON room');
        $this->addSql('ALTER TABLE room DROP manager_id');
        $this->addSql('ALTER TABLE user CHANGE roles roles LONGTEXT NOT NULL COLLATE `utf8mb4_bin`');
    }
}
