<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%import_data}}`.
 */
class m220630_110943_create_import_data_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%import_data}}', [
            'id' => $this->primaryKey(),
            'history_id' => $this->integer(11)->notNull(),
            'city' => $this->string(255)->notNull(),
            'lat' => $this->string(255),
            'lng' => $this->string(255),
            'lighting' => $this->integer(2),
            'size' => $this->string(255),
            'side_type' => $this->string(255),
            'side' => $this->string(255),
            'price_type' => $this->string(255),
            'price_accommodation' => $this->float(2),
            'nds_accommodation' => $this->string(255),
            'kvant_accommodation' => $this->string(255),
            'impression_per_day' => $this->integer(11)
        ]);

        $this->addForeignKey(
            'fk-history_id',
            'import_data',
            'history_id',
            'history',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%import_data}}');
    }
}
