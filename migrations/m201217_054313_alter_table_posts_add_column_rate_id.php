<?php

use yii\db\Migration;

/**
 * Class m201217_054313_alter_table_posts_add_column_rate_id
 */
class m201217_054313_alter_table_posts_add_column_rate_id extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%posts}}', 'rate_id', $this->string(10));
        $this->addColumn('{{%posts}}', 'display_image', $this->boolean()->defaultValue(true));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%posts}}', 'rate_id');
        $this->dropColumn('{{%posts}}', 'display_image');
        echo "m201217_054313_alter_table_posts_add_column_rate_id cannot be reverted.\n";
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m201217_054313_alter_table_posts_add_column_rate_id cannot be reverted.\n";

        return false;
    }
    */
}
