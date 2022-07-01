<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%history}}`.
 */
class m220630_110516_create_history_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%history}}', [
            'id' => $this->primaryKey(),
            'import_time' => $this->dateTime(),
            'created_at' => $this->dateTime(),
            'created_by' => $this->integer(11),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%history}}');
    }
}
