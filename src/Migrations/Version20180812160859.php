<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180812160859 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE details_panier (id INT AUTO_INCREMENT NOT NULL, quantite VARCHAR(3) NOT NULL, montant_ttc DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE details_panier_produits (details_panier_id INT NOT NULL, produits_id INT NOT NULL, INDEX IDX_C0073A958D7D9EA7 (details_panier_id), INDEX IDX_C0073A95CD11A2CF (produits_id), PRIMARY KEY(details_panier_id, produits_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE details_panier_produits ADD CONSTRAINT FK_C0073A958D7D9EA7 FOREIGN KEY (details_panier_id) REFERENCES details_panier (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE details_panier_produits ADD CONSTRAINT FK_C0073A95CD11A2CF FOREIGN KEY (produits_id) REFERENCES produits (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE details_panier_produits DROP FOREIGN KEY FK_C0073A958D7D9EA7');
        $this->addSql('DROP TABLE details_panier');
        $this->addSql('DROP TABLE details_panier_produits');
    }
}
