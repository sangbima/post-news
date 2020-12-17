<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%exchange_rate}}`.
 */
class m201217_035955_create_exchange_rate_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%exchange_rate}}', [
            'id' => $this->primaryKey(),
            'from' => $this->string(150)->notNull(),
            'to' => $this->string(150)->notNull(),
            'rate' => $this->decimal(20, 10),
            'ico' => $this->boolean()->defaultValue(false),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%exchange_rate}}');
    }
}
