<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%advisors}}`.
 */
class m201127_043355_create_advisors_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%advisors}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(150)->notNull(),
            'title' => $this->string(50)->notNull(),
            'img' => $this->string(150),
            'description' => $this->text()->notNull()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%advisors}}');
    }
}
