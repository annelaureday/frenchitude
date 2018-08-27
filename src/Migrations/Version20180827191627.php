<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180827191627 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE produits (id INT AUTO_INCREMENT NOT NULL, reference VARCHAR(45) NOT NULL, nom VARCHAR(45) NOT NULL, marque VARCHAR(45) NOT NULL, categorie VARCHAR(45) NOT NULL, description LONGTEXT NOT NULL, public VARCHAR(5) NOT NULL, photo VARCHAR(255) NOT NULL, prix DOUBLE PRECISION NOT NULL, stock INT NOT NULL, collection VARCHAR(45) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE utilisateurs (id INT AUTO_INCREMENT NOT NULL, civilite ENUM(\'mr\', \'mme\'), pseudo VARCHAR(45) NOT NULL, mdp VARCHAR(85) NOT NULL, email VARCHAR(50) NOT NULL, nom VARCHAR(45) NOT NULL, prenom VARCHAR(45) NOT NULL, adresse VARCHAR(75) NOT NULL, code_postal VARCHAR(5) NOT NULL, ville VARCHAR(45) NOT NULL, status INT DEFAULT 0, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE commentaire (id INT AUTO_INCREMENT NOT NULL, utilisateurs_id_id INT DEFAULT NULL, produits_id_id INT DEFAULT NULL, commentaire VARCHAR(45) NOT NULL, INDEX IDX_67F068BC9CCC1BA8 (utilisateurs_id_id), INDEX IDX_67F068BCA33EA19 (produits_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT FK_67F068BC9CCC1BA8 FOREIGN KEY (utilisateurs_id_id) REFERENCES utilisateurs (id)');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT FK_67F068BCA33EA19 FOREIGN KEY (produits_id_id) REFERENCES produits (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE commentaire DROP FOREIGN KEY FK_67F068BCA33EA19');
        $this->addSql('ALTER TABLE commentaire DROP FOREIGN KEY FK_67F068BC9CCC1BA8');
        $this->addSql('DROP TABLE produits');
        $this->addSql('DROP TABLE utilisateurs');
        $this->addSql('DROP TABLE commentaire');
    }
}
