<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170802065134 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE item_request DROP FOREIGN KEY FK_30CAA9CBE24CC4C7');
        $this->addSql('ALTER TABLE item_request ADD CONSTRAINT FK_30CAA9CBE24CC4C7 FOREIGN KEY (material_request_id) REFERENCES material_request (id) ON DELETE CASCADE');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE item_request DROP FOREIGN KEY FK_30CAA9CBE24CC4C7');
        $this->addSql('ALTER TABLE item_request ADD CONSTRAINT FK_30CAA9CBE24CC4C7 FOREIGN KEY (material_request_id) REFERENCES material_request (id)');
    }
}
