<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180814132709 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE details (id INT AUTO_INCREMENT NOT NULL, panier_id_id INT NOT NULL, produits_id_id INT NOT NULL, quantite VARCHAR(3) DEFAULT NULL, montant_ttc DOUBLE PRECISION NOT NULL, INDEX IDX_72260B8A5669B1EA (panier_id_id), INDEX IDX_72260B8AA33EA19 (produits_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE details ADD CONSTRAINT FK_72260B8A5669B1EA FOREIGN KEY (panier_id_id) REFERENCES panier (id)');
        $this->addSql('ALTER TABLE details ADD CONSTRAINT FK_72260B8AA33EA19 FOREIGN KEY (produits_id_id) REFERENCES produits (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE details');
    }
}
