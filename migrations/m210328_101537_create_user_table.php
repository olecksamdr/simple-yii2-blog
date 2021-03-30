<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user}}`.
 */
class m210328_101537_create_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%user}}', [
            'id' => $this->primaryKey(),
            'username' => $this->string()->notNull(),

            // https://www.yiiframework.com/doc/api/2.0/yii-web-identityinterface#getAuthKey()-detail
            'auth_key' => $this->string(32)->notNull(),

            'password_hash' => $this->string()->notNull(),
            'email' => $this->string()->notNull()->unique(),

            // TimestampBehavior is used to autofill this fields
            //  with current Unix timestamp 
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%user}}');
    }
}
