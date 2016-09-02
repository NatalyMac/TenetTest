<?php

use yii\db\Migration;

/**
 * Handles the creation for table `house`.
 */
class m160831_175835_create_house_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('house', [
            'id' => $this->primaryKey(),
            'name' => $this->string(50)->notNull(),
            'district_id' =>$this->integer()->notNull(),
            'city_id' =>$this->integer()->notNull(),
            'street_id' =>$this->integer()->notNull(),
        ]);
        $this->createIndex('idx-house-street_id', 'house', 'street_id');
        $this->addForeignKey('fk-house-street_id', 'house', 'street_id', 'street', 'id', 'CASCADE');
        $this->createIndex('idx-house_city_id', 'house', 'city_id');
        $this->addForeignKey('fk-house_city_id', 'house', 'city_id', 'city', 'id', 'CASCADE');
        $this->createIndex('idx-house-district_id', 'house', 'district_id');
        $this->addForeignKey('fk-house-district_id', 'house', 'district_id', 'district', 'id', 'CASCADE');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('house');
    }
}
