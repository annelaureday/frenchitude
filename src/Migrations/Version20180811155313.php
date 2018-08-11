<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180811155313 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE produits (id INT AUTO_INCREMENT NOT NULL, reference VARCHAR(5) NOT NULL, nom VARCHAR(45) NOT NULL, marque VARCHAR(45) NOT NULL, categories VARCHAR(45) NOT NULL, description LONGTEXT NOT NULL, couleur VARCHAR(20) NOT NULL, taille VARCHAR(5) NOT NULL, public VARCHAR(5) NOT NULL, photo VARCHAR(250) NOT NULL, prix INT NOT NULL, stock VARCHAR(3) DEFAULT NULL, collections VARCHAR(45) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('DROP TABLE utilisateurs');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE utilisateurs (id INT AUTO_INCREMENT NOT NULL, civilite VARCHAR(5) NOT NULL COLLATE utf8mb4_unicode_ci, pseudo VARCHAR(45) NOT NULL COLLATE utf8mb4_unicode_ci, mdp VARCHAR(45) NOT NULL COLLATE utf8mb4_unicode_ci, email VARCHAR(50) NOT NULL COLLATE utf8mb4_unicode_ci, nom VARCHAR(45) NOT NULL COLLATE utf8mb4_unicode_ci, prenom VARCHAR(45) NOT NULL COLLATE utf8mb4_unicode_ci, adresse VARCHAR(75) NOT NULL COLLATE utf8mb4_unicode_ci, code_postal VARCHAR(5) NOT NULL COLLATE utf8mb4_unicode_ci, ville VARCHAR(45) NOT NULL COLLATE utf8mb4_unicode_ci, statut INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('DROP TABLE produits');
    }
}
