<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180516081046 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE log (id_log INT UNSIGNED AUTO_INCREMENT NOT NULL, log_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, action_name SMALLINT DEFAULT NULL, table_name VARCHAR(255) DEFAULT NULL, data JSON DEFAULT NULL, PRIMARY KEY(id_log)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE price (id_price INT UNSIGNED AUTO_INCREMENT NOT NULL, product_id INT UNSIGNED NOT NULL, value DOUBLE PRECISION DEFAULT NULL, begin_date DATE NOT NULL, end_date DATE NOT NULL, INDEX IDX_CAC822D94584665A (product_id), PRIMARY KEY(id_price)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE feature (id_feature INT UNSIGNED AUTO_INCREMENT NOT NULL, name VARCHAR(50) DEFAULT NULL, PRIMARY KEY(id_feature)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE product (id_product INT UNSIGNED AUTO_INCREMENT NOT NULL, name VARCHAR(150) NOT NULL, description TEXT DEFAULT NULL, picture BLOB DEFAULT NULL, PRIMARY KEY(id_product)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE product_feature (product_id INT UNSIGNED NOT NULL, feature_id INT UNSIGNED NOT NULL, INDEX IDX_CE0E6ED64584665A (product_id), INDEX IDX_CE0E6ED660E4B879 (feature_id), PRIMARY KEY(product_id, feature_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE address (id_address INT UNSIGNED AUTO_INCREMENT NOT NULL, customer_id INT UNSIGNED NOT NULL, line1 VARCHAR(150) DEFAULT NULL, line2 VARCHAR(150) DEFAULT NULL, line3 VARCHAR(150) DEFAULT NULL, country VARCHAR(100) DEFAULT NULL, zicode VARCHAR(10) DEFAULT NULL, INDEX IDX_D4E6F819395C3F3 (customer_id), PRIMARY KEY(id_address)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE customer_order (id_address INT UNSIGNED AUTO_INCREMENT NOT NULL, customer_id INT UNSIGNED NOT NULL, INDEX IDX_3B1CE6A39395C3F3 (customer_id), PRIMARY KEY(id_address)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lead (id_lead INT UNSIGNED AUTO_INCREMENT NOT NULL, firstname VARCHAR(150) DEFAULT NULL, lastname VARCHAR(150) DEFAULT NULL, birthday DATE DEFAULT NULL, phone VARCHAR(15) DEFAULT NULL, email VARCHAR(500) NOT NULL, state SMALLINT DEFAULT NULL, PRIMARY KEY(id_lead)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE customer (id_customer INT UNSIGNED AUTO_INCREMENT NOT NULL, lead_id INT UNSIGNED DEFAULT NULL, firstname VARCHAR(150) DEFAULT NULL, lastname VARCHAR(150) DEFAULT NULL, birthday DATE DEFAULT NULL, phone VARCHAR(15) DEFAULT NULL, email VARCHAR(500) NOT NULL, created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, updated_at DATETIME DEFAULT NULL, deleted_at DATETIME DEFAULT NULL, number_orders SMALLINT UNSIGNED NOT NULL, UNIQUE INDEX UNIQ_81398E0955458D (lead_id), PRIMARY KEY(id_customer)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE price ADD CONSTRAINT FK_CAC822D94584665A FOREIGN KEY (product_id) REFERENCES product (id_product)');
        $this->addSql('ALTER TABLE product_feature ADD CONSTRAINT FK_CE0E6ED64584665A FOREIGN KEY (product_id) REFERENCES product (id_product) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE product_feature ADD CONSTRAINT FK_CE0E6ED660E4B879 FOREIGN KEY (feature_id) REFERENCES feature (id_feature) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE address ADD CONSTRAINT FK_D4E6F819395C3F3 FOREIGN KEY (customer_id) REFERENCES customer (id_customer)');
        $this->addSql('ALTER TABLE customer_order ADD CONSTRAINT FK_3B1CE6A39395C3F3 FOREIGN KEY (customer_id) REFERENCES customer (id_customer)');
        $this->addSql('ALTER TABLE customer ADD CONSTRAINT FK_81398E0955458D FOREIGN KEY (lead_id) REFERENCES lead (id_lead)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE product_feature DROP FOREIGN KEY FK_CE0E6ED660E4B879');
        $this->addSql('ALTER TABLE price DROP FOREIGN KEY FK_CAC822D94584665A');
        $this->addSql('ALTER TABLE product_feature DROP FOREIGN KEY FK_CE0E6ED64584665A');
        $this->addSql('ALTER TABLE customer DROP FOREIGN KEY FK_81398E0955458D');
        $this->addSql('ALTER TABLE address DROP FOREIGN KEY FK_D4E6F819395C3F3');
        $this->addSql('ALTER TABLE customer_order DROP FOREIGN KEY FK_3B1CE6A39395C3F3');
        $this->addSql('DROP TABLE log');
        $this->addSql('DROP TABLE price');
        $this->addSql('DROP TABLE feature');
        $this->addSql('DROP TABLE product');
        $this->addSql('DROP TABLE product_feature');
        $this->addSql('DROP TABLE address');
        $this->addSql('DROP TABLE customer_order');
        $this->addSql('DROP TABLE lead');
        $this->addSql('DROP TABLE customer');
    }
}
