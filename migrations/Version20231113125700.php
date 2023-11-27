<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231113125700 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE anime (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, auteur VARCHAR(255) DEFAULT NULL, nb_episode INT DEFAULT NULL, nb_saison INT DEFAULT NULL, duree_ep INT DEFAULT NULL, video_url VARCHAR(255) DEFAULT NULL, description VARCHAR(255) DEFAULT NULL, type VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE categorie (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE categorie_anime (categorie_id INT NOT NULL, anime_id INT NOT NULL, INDEX IDX_E67CB492BCF5E72D (categorie_id), INDEX IDX_E67CB492794BBE89 (anime_id), PRIMARY KEY(categorie_id, anime_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE studio_danimation (id INT AUTO_INCREMENT NOT NULL, nom_studio VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE studio_danimation_anime (studio_danimation_id INT NOT NULL, anime_id INT NOT NULL, INDEX IDX_539A563CDDB3CC50 (studio_danimation_id), INDEX IDX_539A563C794BBE89 (anime_id), PRIMARY KEY(studio_danimation_id, anime_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE categorie_anime ADD CONSTRAINT FK_E67CB492BCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE categorie_anime ADD CONSTRAINT FK_E67CB492794BBE89 FOREIGN KEY (anime_id) REFERENCES anime (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE studio_danimation_anime ADD CONSTRAINT FK_539A563CDDB3CC50 FOREIGN KEY (studio_danimation_id) REFERENCES studio_danimation (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE studio_danimation_anime ADD CONSTRAINT FK_539A563C794BBE89 FOREIGN KEY (anime_id) REFERENCES anime (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE categorie_anime DROP FOREIGN KEY FK_E67CB492BCF5E72D');
        $this->addSql('ALTER TABLE categorie_anime DROP FOREIGN KEY FK_E67CB492794BBE89');
        $this->addSql('ALTER TABLE studio_danimation_anime DROP FOREIGN KEY FK_539A563CDDB3CC50');
        $this->addSql('ALTER TABLE studio_danimation_anime DROP FOREIGN KEY FK_539A563C794BBE89');
        $this->addSql('DROP TABLE anime');
        $this->addSql('DROP TABLE categorie');
        $this->addSql('DROP TABLE categorie_anime');
        $this->addSql('DROP TABLE studio_danimation');
        $this->addSql('DROP TABLE studio_danimation_anime');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
