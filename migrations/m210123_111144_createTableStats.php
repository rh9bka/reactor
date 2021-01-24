<?php

use yii\db\Migration;

/**
 * Class m210123_111144_createTableStats
 */
class m210123_111144_createTableStats extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210123_111144_createTableStats cannot be reverted.\n";

        return false;
    }

    public function up()
    {
        $sql = 'CREATE TABLE `stats` (
                `id` INT NOT NULL AUTO_INCREMENT,
                `urlID` INT NOT NULL,
                `created_at` INT NOT NULL,
                `userID` INT NOT NULL DEFAULT 0,
                `userIP` VARCHAR(39) NOT NULL,
                `userAgent` TEXT NULL,
                PRIMARY KEY (`id`),
                CONSTRAINT `FK__urls` FOREIGN KEY (`urlID`) REFERENCES `urls` (`id`) ON UPDATE NO ACTION ON DELETE CASCADE
            )
            COLLATE=\'utf8mb4_unicode_ci\'
            ENGINE=InnoDB
            ;
        ';
        $this->execute($sql);
    }
}
