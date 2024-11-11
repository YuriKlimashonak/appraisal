<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241110213537 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP SEQUENCE appraisals_id_seq CASCADE');
        $this->addSql('CREATE TABLE appraisal (id SERIAL NOT NULL, title VARCHAR(255) NOT NULL, cost INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('DROP TABLE appraisals');
        $this->addSql('ALTER TABLE "order" ADD appraisal_id INT NOT NULL');
        $this->addSql('ALTER TABLE "order" ADD customer_id INT NOT NULL');
        $this->addSql('ALTER TABLE "order" ADD CONSTRAINT FK_F5299398DD670628 FOREIGN KEY (appraisal_id) REFERENCES appraisal (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE "order" ADD CONSTRAINT FK_F52993989395C3F3 FOREIGN KEY (customer_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_F5299398DD670628 ON "order" (appraisal_id)');
        $this->addSql('CREATE INDEX IDX_F52993989395C3F3 ON "order" (customer_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE "order" DROP CONSTRAINT FK_F5299398DD670628');
        $this->addSql('CREATE SEQUENCE appraisals_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE appraisals (id SERIAL NOT NULL, title VARCHAR(255) NOT NULL, cost INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('DROP TABLE appraisal');
        $this->addSql('ALTER TABLE "order" DROP CONSTRAINT FK_F52993989395C3F3');
        $this->addSql('DROP INDEX IDX_F5299398DD670628');
        $this->addSql('DROP INDEX IDX_F52993989395C3F3');
        $this->addSql('ALTER TABLE "order" DROP appraisal_id');
        $this->addSql('ALTER TABLE "order" DROP customer_id');
    }
}
