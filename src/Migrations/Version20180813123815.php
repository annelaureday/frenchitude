<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180813123815 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE utilisateurs (id INT AUTO_INCREMENT NOT NULL, civilite VARCHAR(5) NOT NULL, pseudo VARCHAR(45) NOT NULL, mdp VARCHAR(45) NOT NULL, email VARCHAR(50) NOT NULL, nom VARCHAR(45) NOT NULL, prenom VARCHAR(45) NOT NULL, adresse VARCHAR(75) NOT NULL, code_postal INT NOT NULL, ville VARCHAR(45) NOT NULL, statut INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE livraison (id INT AUTO_INCREMENT NOT NULL, user_id_id INT NOT NULL, type VARCHAR(45) NOT NULL, tarif INT NOT NULL, INDEX IDX_A60C9F1F9D86650F (user_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE livraison ADD CONSTRAINT FK_A60C9F1F9D86650F FOREIGN KEY (user_id_id) REFERENCES utilisateurs (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE livraison DROP FOREIGN KEY FK_A60C9F1F9D86650F');
        $this->addSql('DROP TABLE utilisateurs');
        $this->addSql('DROP TABLE livraison');
    }
}
