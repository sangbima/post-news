<?php

use yii\db\Migration;

/**
 * Class m201110_232534_create_table_posts
 */
class m201110_232534_create_table_posts extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('posts', [
            'id' => $this->primaryKey(),
            'title' => $this->string(100)->notNull(),
            'slug' => $this->string(100)->notNull(),
            'content' => $this->text()->notNull(),
            'image' => $this->string(255),
            'is_important' => $this->smallInteger(6)->defaultValue(9),
            'category_id' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('posts');
        echo "m201110_232534_create_table_posts cannot be reverted.\n";
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m201110_232534_create_table_posts cannot be reverted.\n";

        return false;
    }
    */
}
