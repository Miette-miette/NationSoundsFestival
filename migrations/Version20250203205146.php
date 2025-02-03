<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250203205146 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE concert ADD updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', CHANGE img img VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE location ADD updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', CHANGE img img VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE news ADD updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', CHANGE content content VARCHAR(20000) NOT NULL, CHANGE img img VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE partner ADD updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', CHANGE img img VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE performance ADD updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', CHANGE img img VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE workshop ADD updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', CHANGE img img VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE concert DROP updated_at, CHANGE img img VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE location DROP updated_at, CHANGE img img VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE news DROP updated_at, CHANGE content content MEDIUMTEXT NOT NULL, CHANGE img img VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE partner DROP updated_at, CHANGE img img VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE performance DROP updated_at, CHANGE img img VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE workshop DROP updated_at, CHANGE img img VARCHAR(255) NOT NULL');
    }
}
