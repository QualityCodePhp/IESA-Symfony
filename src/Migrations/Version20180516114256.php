<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180516114256 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE product_order (id INT AUTO_INCREMENT NOT NULL, ordered_products_id INT UNSIGNED NOT NULL, customer_order_id INT UNSIGNED NOT NULL, quantity INT NOT NULL, INDEX IDX_5475E8C45C5ED58F (ordered_products_id), INDEX IDX_5475E8C4A15A2E17 (customer_order_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE product_order ADD CONSTRAINT FK_5475E8C45C5ED58F FOREIGN KEY (ordered_products_id) REFERENCES price (id)');
        $this->addSql('ALTER TABLE product_order ADD CONSTRAINT FK_5475E8C4A15A2E17 FOREIGN KEY (customer_order_id) REFERENCES customer_order (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE product_order');
    }
}
