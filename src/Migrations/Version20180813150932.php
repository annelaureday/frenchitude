<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180813150932 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE panier (id INT AUTO_INCREMENT NOT NULL, livraison_id_id INT NOT NULL, utilisateurs_id_id INT NOT NULL, montant INT NOT NULL, statut VARCHAR(45) NOT NULL, date_panier DATETIME NOT NULL, INDEX IDX_24CC0DF2C389EC2E (livraison_id_id), UNIQUE INDEX UNIQ_24CC0DF29CCC1BA8 (utilisateurs_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE panier ADD CONSTRAINT FK_24CC0DF2C389EC2E FOREIGN KEY (livraison_id_id) REFERENCES livraison (id)');
        $this->addSql('ALTER TABLE panier ADD CONSTRAINT FK_24CC0DF29CCC1BA8 FOREIGN KEY (utilisateurs_id_id) REFERENCES utilisateurs (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE panier');
    }
}
