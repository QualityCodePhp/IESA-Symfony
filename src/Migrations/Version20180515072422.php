<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180515072422 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE order_products CHANGE id_customer_order id_customer_order INT UNSIGNED DEFAULT NULL, CHANGE id_price id_price INT UNSIGNED DEFAULT NULL, CHANGE id_product id_product INT UNSIGNED DEFAULT NULL');
        $this->addSql('ALTER TABLE price CHANGE id_product id_product INT UNSIGNED DEFAULT NULL');
        $this->addSql('ALTER TABLE address CHANGE id_customer id_customer INT UNSIGNED DEFAULT NULL');
        $this->addSql('ALTER TABLE product_features CHANGE id_product id_product INT UNSIGNED DEFAULT NULL, CHANGE id_feature id_feature INT UNSIGNED DEFAULT NULL');
        $this->addSql('ALTER TABLE customer_order CHANGE id_customer id_customer INT UNSIGNED DEFAULT NULL');
        $this->addSql('ALTER TABLE customer CHANGE number_orders number_orders SMALLINT UNSIGNED NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE address CHANGE id_customer id_customer INT UNSIGNED NOT NULL');
        $this->addSql('ALTER TABLE customer CHANGE number_orders number_orders SMALLINT UNSIGNED DEFAULT 0 NOT NULL');
        $this->addSql('ALTER TABLE customer_order CHANGE id_customer id_customer INT UNSIGNED NOT NULL');
        $this->addSql('ALTER TABLE order_products CHANGE id_customer_order id_customer_order INT UNSIGNED NOT NULL, CHANGE id_price id_price INT UNSIGNED NOT NULL, CHANGE id_product id_product INT UNSIGNED NOT NULL');
        $this->addSql('ALTER TABLE price CHANGE id_product id_product INT UNSIGNED NOT NULL');
        $this->addSql('ALTER TABLE product_features CHANGE id_product id_product INT UNSIGNED NOT NULL, CHANGE id_feature id_feature INT UNSIGNED NOT NULL');
    }
}
