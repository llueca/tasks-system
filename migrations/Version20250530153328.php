<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250530153328 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE users ALTER first_name TYPE VARCHAR(255)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE users ALTER last_name TYPE VARCHAR(255)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE users ADD COLUMN enabled BOOLEAN DEFAULT FALSE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE users ADD COLUMN validated BOOLEAN DEFAULT FALSE
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE SCHEMA public
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE users ALTER first_name TYPE VARCHAR(128)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE users ALTER last_name TYPE VARCHAR(128)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE users DROP COLUMN enabled
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE users DROP COLUMN validated
        SQL);
    }
}
