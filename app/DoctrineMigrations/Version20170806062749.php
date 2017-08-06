<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170806062749 extends AbstractMigration
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
        $this->addSql('ALTER TABLE user ADD username VARCHAR(180) NOT NULL, ADD username_canonical VARCHAR(180) NOT NULL, ADD email VARCHAR(180) NOT NULL, ADD email_canonical VARCHAR(180) NOT NULL, ADD enabled TINYINT(1) NOT NULL, ADD salt VARCHAR(255) DEFAULT NULL, ADD password VARCHAR(255) NOT NULL, ADD last_login DATETIME DEFAULT NULL, ADD confirmation_token VARCHAR(180) DEFAULT NULL, ADD password_requested_at DATETIME DEFAULT NULL, ADD roles LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', CHANGE id id INT AUTO_INCREMENT NOT NULL, ADD PRIMARY KEY (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D64992FC23A8 ON user (username_canonical)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649A0D96FBF ON user (email_canonical)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649C05FB297 ON user (confirmation_token)');
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
        $this->addSql('ALTER TABLE `user` MODIFY id INT NOT NULL');
        $this->addSql('DROP INDEX UNIQ_8D93D64992FC23A8 ON `user`');
        $this->addSql('DROP INDEX UNIQ_8D93D649A0D96FBF ON `user`');
        $this->addSql('DROP INDEX UNIQ_8D93D649C05FB297 ON `user`');
        $this->addSql('ALTER TABLE `user` DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE `user` DROP username, DROP username_canonical, DROP email, DROP email_canonical, DROP enabled, DROP salt, DROP password, DROP last_login, DROP confirmation_token, DROP password_requested_at, DROP roles, CHANGE id id INT DEFAULT NULL');
    }
}
