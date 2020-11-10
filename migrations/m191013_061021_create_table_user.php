<?php

use yii\db\Migration;

/**
 * Class m191013_061021_create_table_user
 */
class m191013_061021_create_table_user extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('user', [
            'id' => $this->primaryKey(),
            'username' => $this->string(100)->notNull()->unique(),
            'password_hash' => $this->string(255),
            'auth_key' => $this->string(255),
            'token_expired' => $this->integer(),
            'fullname' => $this->string(100),
            'email' => $this->string(150)->notNull()->unique(),
            'phone' => $this->string(),
            'password_reset_token' => $this->string(255),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'deleted_at' => $this->integer(),
            'status' => $this->integer(2)->defaultValue(0)
        ]);

        $this->insert('user', [
            'username' => 'admin@localhost.dev',
            'fullname' => 'Administrator',
            'email' => 'admin@localhost.dev',
            'auth_key' => Yii::$app->security->generateRandomString(),
            'password_hash' => Yii::$app->security->generatePasswordHash('admin212'),
            'status' => 10,
            'created_at' => date('U'),
            'updated_at' => date('U')
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('user');
        echo "m191013_061021_create_table_user cannot be reverted.\n";
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m191013_061021_create_table_user cannot be reverted.\n";

        return false;
    }
    */
}
