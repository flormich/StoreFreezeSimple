<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190418170112 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE product (id INT AUTO_INCREMENT NOT NULL, category_id INT NOT NULL, freezer_id INT DEFAULT NULL, picture_product_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, quantity_unit INT DEFAULT NULL, quantity_gr INT DEFAULT NULL, INDEX IDX_D34A04AD12469DE2 (category_id), INDEX IDX_D34A04AD3FE9820 (freezer_id), INDEX IDX_D34A04AD6954265D (picture_product_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE book (id INT AUTO_INCREMENT NOT NULL, page_id INT NOT NULL, name VARCHAR(255) DEFAULT NULL, color VARCHAR(100) DEFAULT NULL, INDEX IDX_CBE5A331C4663E4 (page_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE freezer (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) DEFAULT NULL, drawer INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE page (id INT AUTO_INCREMENT NOT NULL, number INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE picture_product (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE picture_recette (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE plat (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE product_recette (id INT AUTO_INCREMENT NOT NULL, product_id INT DEFAULT NULL, recette_id INT DEFAULT NULL, INDEX IDX_986278204584665A (product_id), INDEX IDX_9862782089312FE9 (recette_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE recette (id INT AUTO_INCREMENT NOT NULL, plat_id INT NOT NULL, book_id INT DEFAULT NULL, picture_recette_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, number_people INT DEFAULT NULL, time_prepa TIME DEFAULT NULL, time_baking TIME DEFAULT NULL, description VARCHAR(255) DEFAULT NULL, page INT DEFAULT NULL, INDEX IDX_49BB6390D73DB560 (plat_id), INDEX IDX_49BB639016A2B381 (book_id), INDEX IDX_49BB6390A5E16FEE (picture_recette_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04AD12469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04AD3FE9820 FOREIGN KEY (freezer_id) REFERENCES freezer (id)');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04AD6954265D FOREIGN KEY (picture_product_id) REFERENCES picture_product (id)');
        $this->addSql('ALTER TABLE book ADD CONSTRAINT FK_CBE5A331C4663E4 FOREIGN KEY (page_id) REFERENCES page (id)');
        $this->addSql('ALTER TABLE product_recette ADD CONSTRAINT FK_986278204584665A FOREIGN KEY (product_id) REFERENCES product (id)');
        $this->addSql('ALTER TABLE product_recette ADD CONSTRAINT FK_9862782089312FE9 FOREIGN KEY (recette_id) REFERENCES recette (id)');
        $this->addSql('ALTER TABLE recette ADD CONSTRAINT FK_49BB6390D73DB560 FOREIGN KEY (plat_id) REFERENCES plat (id)');
        $this->addSql('ALTER TABLE recette ADD CONSTRAINT FK_49BB639016A2B381 FOREIGN KEY (book_id) REFERENCES book (id)');
        $this->addSql('ALTER TABLE recette ADD CONSTRAINT FK_49BB6390A5E16FEE FOREIGN KEY (picture_recette_id) REFERENCES picture_recette (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE product_recette DROP FOREIGN KEY FK_986278204584665A');
        $this->addSql('ALTER TABLE recette DROP FOREIGN KEY FK_49BB639016A2B381');
        $this->addSql('ALTER TABLE product DROP FOREIGN KEY FK_D34A04AD12469DE2');
        $this->addSql('ALTER TABLE product DROP FOREIGN KEY FK_D34A04AD3FE9820');
        $this->addSql('ALTER TABLE book DROP FOREIGN KEY FK_CBE5A331C4663E4');
        $this->addSql('ALTER TABLE product DROP FOREIGN KEY FK_D34A04AD6954265D');
        $this->addSql('ALTER TABLE recette DROP FOREIGN KEY FK_49BB6390A5E16FEE');
        $this->addSql('ALTER TABLE recette DROP FOREIGN KEY FK_49BB6390D73DB560');
        $this->addSql('ALTER TABLE product_recette DROP FOREIGN KEY FK_9862782089312FE9');
        $this->addSql('DROP TABLE product');
        $this->addSql('DROP TABLE book');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE freezer');
        $this->addSql('DROP TABLE page');
        $this->addSql('DROP TABLE picture_product');
        $this->addSql('DROP TABLE picture_recette');
        $this->addSql('DROP TABLE plat');
        $this->addSql('DROP TABLE product_recette');
        $this->addSql('DROP TABLE recette');
    }
}
