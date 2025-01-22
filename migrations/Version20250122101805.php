<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250122101805 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP SEQUENCE posts_id_seq CASCADE');
        $this->addSql('CREATE TABLE post (id SERIAL NOT NULL, users_id INT DEFAULT NULL, content VARCHAR(255) DEFAULT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_5A8A6C8D67B3B43D ON post (users_id)');
        $this->addSql('ALTER TABLE post ADD CONSTRAINT FK_5A8A6C8D67B3B43D FOREIGN KEY (users_id) REFERENCES users (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE posts DROP CONSTRAINT fk_885dbafa67b3b43d');
        $this->addSql('DROP TABLE posts');
        $this->addSql('ALTER TABLE users DROP email');
        $this->addSql('ALTER TABLE users DROP bio');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('CREATE SEQUENCE posts_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE posts (id SERIAL NOT NULL, users_id INT DEFAULT NULL, content VARCHAR(255) DEFAULT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX idx_885dbafa67b3b43d ON posts (users_id)');
        $this->addSql('ALTER TABLE posts ADD CONSTRAINT fk_885dbafa67b3b43d FOREIGN KEY (users_id) REFERENCES users (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE post DROP CONSTRAINT FK_5A8A6C8D67B3B43D');
        $this->addSql('DROP TABLE post');
        $this->addSql('ALTER TABLE users ADD email VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE users ADD bio VARCHAR(255) DEFAULT NULL');
    }
}
