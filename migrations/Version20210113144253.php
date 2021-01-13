<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210113144253 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE tile (id INT AUTO_INCREMENT NOT NULL, type VARCHAR(100) NOT NULL, room VARCHAR(255) DEFAULT NULL, coord_x INT NOT NULL, coord_y INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tile_tile (tile_source INT NOT NULL, tile_target INT NOT NULL, INDEX IDX_7D45AB9D110724C6 (tile_source), INDEX IDX_7D45AB9D8E27449 (tile_target), PRIMARY KEY(tile_source, tile_target)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE tile_tile ADD CONSTRAINT FK_7D45AB9D110724C6 FOREIGN KEY (tile_source) REFERENCES tile (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE tile_tile ADD CONSTRAINT FK_7D45AB9D8E27449 FOREIGN KEY (tile_target) REFERENCES tile (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE tile_tile DROP FOREIGN KEY FK_7D45AB9D110724C6');
        $this->addSql('ALTER TABLE tile_tile DROP FOREIGN KEY FK_7D45AB9D8E27449');
        $this->addSql('DROP TABLE tile');
        $this->addSql('DROP TABLE tile_tile');
    }
}
