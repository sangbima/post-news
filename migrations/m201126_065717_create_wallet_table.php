<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%wallet}}`.
 */
class m201126_065717_create_wallet_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%wallet}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(150)->notNull(),
            'address' => $this->string(150)->notNull()->unique(),
            'id_member' => $this->string(50)->notNull()->unique(),
            'stage' => $this->integer()->notNull(),
            'coin' => $this->money()->notNull(),
            'country' => $this->integer()->notNull(),
            'buy_date' => $this->date(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%wallet}}');
    }
}
