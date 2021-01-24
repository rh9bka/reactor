<?php

use yii\db\Migration;

/**
 * Class m210123_105816_createTable
 */
class m210123_105816_createTable extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210123_105816_createTable cannot be reverted.\n";

        return false;
    }

    public function up()
    {
        $sql = 'CREATE TABLE `urls` (
                `id` INT(11) NOT NULL AUTO_INCREMENT,
                `created_at` INT(11) NULL DEFAULT NULL,
                `expired_at` INT(11) NULL DEFAULT NULL,
                `userID` INT(11) NULL DEFAULT NULL,
                `cntGo` INT(11) NULL DEFAULT \'0\' COMMENT \'кол-во удачных переходов\',
                `cntErr` INT(11) NULL DEFAULT \'0\' COMMENT \'кол-во неудачных переходов\',
                `minUrl` VARCHAR(50) NULL DEFAULT NULL COLLATE \'utf8mb4_unicode_ci\',
                `fullUrl` VARCHAR(500) NULL DEFAULT NULL COLLATE \'utf8mb4_unicode_ci\',
                PRIMARY KEY (`id`) USING BTREE,
	            UNIQUE INDEX `minUrl` (`minUrl`) USING BTREE
            )
            COLLATE=\'utf8mb4_unicode_ci\'
            ENGINE=InnoDB
            ;
        ';
        $this->execute($sql);
    }
}
