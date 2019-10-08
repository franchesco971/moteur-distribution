<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191003124111 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE vehicle_model (id INT AUTO_INCREMENT NOT NULL, brand_id INT NOT NULL, label VARCHAR(255) NOT NULL, INDEX IDX_B53AF23544F5D008 (brand_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vehicle_category (id INT AUTO_INCREMENT NOT NULL, label VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE fuel (id INT AUTO_INCREMENT NOT NULL, label VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE finition (id INT AUTO_INCREMENT NOT NULL, vehicle_generation_id INT NOT NULL, label VARCHAR(255) NOT NULL, INDEX IDX_2060F8262EB330E (vehicle_generation_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE gearbox (id INT AUTO_INCREMENT NOT NULL, label VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE distribution (id INT AUTO_INCREMENT NOT NULL, label VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE transmission (id INT AUTO_INCREMENT NOT NULL, label VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE brand (id INT AUTO_INCREMENT NOT NULL, label VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vehicle (id INT AUTO_INCREMENT NOT NULL, brand_id INT NOT NULL, fuel_id INT NOT NULL, vehicle_category_id INT NOT NULL, gearbox_id INT NOT NULL, transmission_id INT NOT NULL, distribution_id INT DEFAULT NULL, buy_price DOUBLE PRECISION DEFAULT NULL, nickname VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, INDEX IDX_1B80E48644F5D008 (brand_id), INDEX IDX_1B80E48697C79677 (fuel_id), INDEX IDX_1B80E4869C7DE094 (vehicle_category_id), INDEX IDX_1B80E486C826082F (gearbox_id), INDEX IDX_1B80E48678D28519 (transmission_id), INDEX IDX_1B80E4866EB6DDB5 (distribution_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vehicle_generation (id INT AUTO_INCREMENT NOT NULL, vehicle_model_id INT NOT NULL, label VARCHAR(255) NOT NULL, INDEX IDX_56B4E3A6A467B873 (vehicle_model_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE vehicle_model ADD CONSTRAINT FK_B53AF23544F5D008 FOREIGN KEY (brand_id) REFERENCES brand (id)');
        $this->addSql('ALTER TABLE finition ADD CONSTRAINT FK_2060F8262EB330E FOREIGN KEY (vehicle_generation_id) REFERENCES vehicle_generation (id)');
        $this->addSql('ALTER TABLE vehicle ADD CONSTRAINT FK_1B80E48644F5D008 FOREIGN KEY (brand_id) REFERENCES brand (id)');
        $this->addSql('ALTER TABLE vehicle ADD CONSTRAINT FK_1B80E48697C79677 FOREIGN KEY (fuel_id) REFERENCES fuel (id)');
        $this->addSql('ALTER TABLE vehicle ADD CONSTRAINT FK_1B80E4869C7DE094 FOREIGN KEY (vehicle_category_id) REFERENCES vehicle_category (id)');
        $this->addSql('ALTER TABLE vehicle ADD CONSTRAINT FK_1B80E486C826082F FOREIGN KEY (gearbox_id) REFERENCES gearbox (id)');
        $this->addSql('ALTER TABLE vehicle ADD CONSTRAINT FK_1B80E48678D28519 FOREIGN KEY (transmission_id) REFERENCES transmission (id)');
        $this->addSql('ALTER TABLE vehicle ADD CONSTRAINT FK_1B80E4866EB6DDB5 FOREIGN KEY (distribution_id) REFERENCES distribution (id)');
        $this->addSql('ALTER TABLE vehicle_generation ADD CONSTRAINT FK_56B4E3A6A467B873 FOREIGN KEY (vehicle_model_id) REFERENCES vehicle_model (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE vehicle_generation DROP FOREIGN KEY FK_56B4E3A6A467B873');
        $this->addSql('ALTER TABLE vehicle DROP FOREIGN KEY FK_1B80E4869C7DE094');
        $this->addSql('ALTER TABLE vehicle DROP FOREIGN KEY FK_1B80E48697C79677');
        $this->addSql('ALTER TABLE vehicle DROP FOREIGN KEY FK_1B80E486C826082F');
        $this->addSql('ALTER TABLE vehicle DROP FOREIGN KEY FK_1B80E4866EB6DDB5');
        $this->addSql('ALTER TABLE vehicle DROP FOREIGN KEY FK_1B80E48678D28519');
        $this->addSql('ALTER TABLE vehicle_model DROP FOREIGN KEY FK_B53AF23544F5D008');
        $this->addSql('ALTER TABLE vehicle DROP FOREIGN KEY FK_1B80E48644F5D008');
        $this->addSql('ALTER TABLE finition DROP FOREIGN KEY FK_2060F8262EB330E');
        $this->addSql('DROP TABLE vehicle_model');
        $this->addSql('DROP TABLE vehicle_category');
        $this->addSql('DROP TABLE fuel');
        $this->addSql('DROP TABLE finition');
        $this->addSql('DROP TABLE gearbox');
        $this->addSql('DROP TABLE distribution');
        $this->addSql('DROP TABLE transmission');
        $this->addSql('DROP TABLE brand');
        $this->addSql('DROP TABLE vehicle');
        $this->addSql('DROP TABLE vehicle_generation');
    }
}
