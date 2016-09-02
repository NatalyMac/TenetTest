<?php

use yii\db\Migration;

/**
 * Handles the creation for table `user`.
 */
class m160831_175836_create_user_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('user', [
            'id' => $this->primaryKey(),
            'name' => $this->string(50)->notNull(),
            'email' => $this->string(50)->notNull()->unique(),
            'phone' => $this->string(25),
            'district_id' =>$this->integer()->notNull(),
            'city_id' =>$this->integer()->notNull(),
            'street_id' =>$this->integer()->notNull(),
            'house_id' =>$this->integer()->notNull(),
            'flat' =>$this->string(5),
            'password' => $this->string(255)->notNull(),
            'authKey' => $this->string(255),
            'accessToken' =>  $this->string(255),
        ]);
        $this->createIndex('idx-user-house_id', 'user', 'house_id');
        $this->addForeignKey('fk-user-house_id', 'user', 'house_id', 'house', 'id', 'CASCADE');
        $this->createIndex('idx-user-street_id', 'user', 'street_id');
        $this->addForeignKey('fk-user-street_id', 'user', 'street_id', 'street', 'id', 'CASCADE');
        $this->createIndex('idx-user_city_id', 'user', 'city_id');
        $this->addForeignKey('fk-user_city_id', 'user', 'city_id', 'city', 'id', 'CASCADE');
        $this->createIndex('idx-user-district_id', 'user', 'district_id');
        $this->addForeignKey('fk-user-district_id', 'user', 'district_id', 'district', 'id', 'CASCADE');
        
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('user');
    }
}
