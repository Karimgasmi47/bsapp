<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211122155626 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE issue (id INT AUTO_INCREMENT NOT NULL, type_id INT NOT NULL, priority_id INT DEFAULT NULL, status_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, INDEX IDX_12AD233EC54C8C93 (type_id), INDEX IDX_12AD233E497B19F9 (priority_id), INDEX IDX_12AD233E6BF700BD (status_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE issue_priority (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, constant_code VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE issue_status (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, constant_code VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE issue_type (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, constant_code VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE issue ADD CONSTRAINT FK_12AD233EC54C8C93 FOREIGN KEY (type_id) REFERENCES issue_type (id)');
        $this->addSql('ALTER TABLE issue ADD CONSTRAINT FK_12AD233E497B19F9 FOREIGN KEY (priority_id) REFERENCES issue_priority (id)');
        $this->addSql('ALTER TABLE issue ADD CONSTRAINT FK_12AD233E6BF700BD FOREIGN KEY (status_id) REFERENCES issue_status (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE issue DROP FOREIGN KEY FK_12AD233E497B19F9');
        $this->addSql('ALTER TABLE issue DROP FOREIGN KEY FK_12AD233E6BF700BD');
        $this->addSql('ALTER TABLE issue DROP FOREIGN KEY FK_12AD233EC54C8C93');
        $this->addSql('DROP TABLE issue');
        $this->addSql('DROP TABLE issue_priority');
        $this->addSql('DROP TABLE issue_status');
        $this->addSql('DROP TABLE issue_type');
    }
}
