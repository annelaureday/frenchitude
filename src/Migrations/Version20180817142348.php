<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180817142348 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE commentaire (id INT AUTO_INCREMENT NOT NULL, utilisateurs_id_id INT DEFAULT NULL, produits_id_id INT DEFAULT NULL, commentaire VARCHAR(45) NOT NULL, INDEX IDX_67F068BC9CCC1BA8 (utilisateurs_id_id), INDEX IDX_67F068BCA33EA19 (produits_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE details (id INT AUTO_INCREMENT NOT NULL, panier_id_id INT NOT NULL, produits_id_id INT NOT NULL, quantite VARCHAR(3) DEFAULT NULL, montant_ttc DOUBLE PRECISION NOT NULL, INDEX IDX_72260B8A5669B1EA (panier_id_id), INDEX IDX_72260B8AA33EA19 (produits_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE livraison (id INT AUTO_INCREMENT NOT NULL, user_id_id INT NOT NULL, type VARCHAR(45) NOT NULL, tarif INT NOT NULL, INDEX IDX_A60C9F1F9D86650F (user_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE paiement (id INT AUTO_INCREMENT NOT NULL, panier_id_id INT NOT NULL, statut VARCHAR(255) NOT NULL, date_paiement DATETIME NOT NULL, ref_ordre VARCHAR(45) NOT NULL, INDEX IDX_B1DC7A1E5669B1EA (panier_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE panier (id INT AUTO_INCREMENT NOT NULL, livraison_id_id INT NOT NULL, utilisateurs_id_id INT NOT NULL, montant INT NOT NULL, statut VARCHAR(45) NOT NULL, date_panier DATETIME NOT NULL, INDEX IDX_24CC0DF2C389EC2E (livraison_id_id), UNIQUE INDEX UNIQ_24CC0DF29CCC1BA8 (utilisateurs_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE produits (id INT AUTO_INCREMENT NOT NULL, reference VARCHAR(45) NOT NULL, nom VARCHAR(45) NOT NULL, marque VARCHAR(45) NOT NULL, categorie VARCHAR(45) NOT NULL, description LONGTEXT NOT NULL, couleur VARCHAR(45) NOT NULL, taille VARCHAR(5) NOT NULL, public VARCHAR(5) NOT NULL, photo VARCHAR(255) NOT NULL, prix INT NOT NULL, stock INT NOT NULL, collection VARCHAR(45) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE utilisateurs (id INT AUTO_INCREMENT NOT NULL, civilite ENUM(\'mr\', \'mme\'), pseudo VARCHAR(45) NOT NULL, mdp VARCHAR(85) NOT NULL, email VARCHAR(50) NOT NULL, nom VARCHAR(45) NOT NULL, prenom VARCHAR(45) NOT NULL, adresse VARCHAR(75) NOT NULL, code_postal VARCHAR(5) NOT NULL, ville VARCHAR(45) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT FK_67F068BC9CCC1BA8 FOREIGN KEY (utilisateurs_id_id) REFERENCES utilisateurs (id)');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT FK_67F068BCA33EA19 FOREIGN KEY (produits_id_id) REFERENCES produits (id)');
        $this->addSql('ALTER TABLE details ADD CONSTRAINT FK_72260B8A5669B1EA FOREIGN KEY (panier_id_id) REFERENCES panier (id)');
        $this->addSql('ALTER TABLE details ADD CONSTRAINT FK_72260B8AA33EA19 FOREIGN KEY (produits_id_id) REFERENCES produits (id)');
        $this->addSql('ALTER TABLE livraison ADD CONSTRAINT FK_A60C9F1F9D86650F FOREIGN KEY (user_id_id) REFERENCES utilisateurs (id)');
        $this->addSql('ALTER TABLE paiement ADD CONSTRAINT FK_B1DC7A1E5669B1EA FOREIGN KEY (panier_id_id) REFERENCES panier (id)');
        $this->addSql('ALTER TABLE panier ADD CONSTRAINT FK_24CC0DF2C389EC2E FOREIGN KEY (livraison_id_id) REFERENCES livraison (id)');
        $this->addSql('ALTER TABLE panier ADD CONSTRAINT FK_24CC0DF29CCC1BA8 FOREIGN KEY (utilisateurs_id_id) REFERENCES utilisateurs (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE panier DROP FOREIGN KEY FK_24CC0DF2C389EC2E');
        $this->addSql('ALTER TABLE details DROP FOREIGN KEY FK_72260B8A5669B1EA');
        $this->addSql('ALTER TABLE paiement DROP FOREIGN KEY FK_B1DC7A1E5669B1EA');
        $this->addSql('ALTER TABLE commentaire DROP FOREIGN KEY FK_67F068BCA33EA19');
        $this->addSql('ALTER TABLE details DROP FOREIGN KEY FK_72260B8AA33EA19');
        $this->addSql('ALTER TABLE commentaire DROP FOREIGN KEY FK_67F068BC9CCC1BA8');
        $this->addSql('ALTER TABLE livraison DROP FOREIGN KEY FK_A60C9F1F9D86650F');
        $this->addSql('ALTER TABLE panier DROP FOREIGN KEY FK_24CC0DF29CCC1BA8');
        $this->addSql('DROP TABLE commentaire');
        $this->addSql('DROP TABLE details');
        $this->addSql('DROP TABLE livraison');
        $this->addSql('DROP TABLE paiement');
        $this->addSql('DROP TABLE panier');
        $this->addSql('DROP TABLE produits');
        $this->addSql('DROP TABLE utilisateurs');
    }
}
