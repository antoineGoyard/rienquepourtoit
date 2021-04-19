<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210118105428 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE ad (id INT AUTO_INCREMENT NOT NULL, supplement_id INT DEFAULT NULL, house_type_id INT NOT NULL, user_id INT NOT NULL, price INT NOT NULL, longitude DOUBLE PRECISION NOT NULL, latitude DOUBLE PRECISION NOT NULL, pieces_number INT NOT NULL, surface INT NOT NULL, ad_type VARCHAR(255) NOT NULL, short_content VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, city VARCHAR(255) NOT NULL, address VARCHAR(255) NOT NULL, zip_code INT NOT NULL, UNIQUE INDEX UNIQ_77E0ED587793FA21 (supplement_id), INDEX IDX_77E0ED58519B0A8E (house_type_id), INDEX IDX_77E0ED58A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE ad ADD CONSTRAINT FK_77E0ED587793FA21 FOREIGN KEY (supplement_id) REFERENCES ad_supplement (id)');
        $this->addSql('ALTER TABLE ad ADD CONSTRAINT FK_77E0ED58519B0A8E FOREIGN KEY (house_type_id) REFERENCES house_type (id)');
        $this->addSql('ALTER TABLE ad ADD CONSTRAINT FK_77E0ED58A76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE ad_supplement ADD rooms_number INT DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE ad');
        $this->addSql('ALTER TABLE ad_supplement DROP rooms_number');
    }
}
