<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240228170746 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE authors (id VARCHAR(36) NOT NULL, name VARCHAR(55) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('INSERT INTO authors (id, name) VALUES (\'96e900fe-1c3d-4077-b153-da155686d7b9\', \'Jordi Martínez\')');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE authors');
    }
}
