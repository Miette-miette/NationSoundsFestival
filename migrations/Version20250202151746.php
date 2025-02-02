<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250202151746 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE concert ADD location_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE concert ADD CONSTRAINT FK_D57C02D264D218E FOREIGN KEY (location_id) REFERENCES location (id)');
        $this->addSql('CREATE INDEX IDX_D57C02D264D218E ON concert (location_id)');
        $this->addSql('ALTER TABLE news CHANGE content content VARCHAR(20000) NOT NULL');
        $this->addSql('ALTER TABLE performance ADD location_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE performance ADD CONSTRAINT FK_82D7968164D218E FOREIGN KEY (location_id) REFERENCES location (id)');
        $this->addSql('CREATE INDEX IDX_82D7968164D218E ON performance (location_id)');
        $this->addSql('ALTER TABLE workshop ADD location_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE workshop ADD CONSTRAINT FK_9B6F02C464D218E FOREIGN KEY (location_id) REFERENCES location (id)');
        $this->addSql('CREATE INDEX IDX_9B6F02C464D218E ON workshop (location_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE concert DROP FOREIGN KEY FK_D57C02D264D218E');
        $this->addSql('DROP INDEX IDX_D57C02D264D218E ON concert');
        $this->addSql('ALTER TABLE concert DROP location_id');
        $this->addSql('ALTER TABLE news CHANGE content content MEDIUMTEXT NOT NULL');
        $this->addSql('ALTER TABLE performance DROP FOREIGN KEY FK_82D7968164D218E');
        $this->addSql('DROP INDEX IDX_82D7968164D218E ON performance');
        $this->addSql('ALTER TABLE performance DROP location_id');
        $this->addSql('ALTER TABLE workshop DROP FOREIGN KEY FK_9B6F02C464D218E');
        $this->addSql('DROP INDEX IDX_9B6F02C464D218E ON workshop');
        $this->addSql('ALTER TABLE workshop DROP location_id');
    }
}
