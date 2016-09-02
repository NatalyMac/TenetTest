<?php

use yii\db\Migration;

/**
 * Handles the creation for table `city`.
 */
class m160831_175822_create_city_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('city', [
            'id' => $this->primaryKey(),
            'name' => $this->string(50)->notNull(),
            'district_id' =>$this->integer()->notNull(),
        ]);
        $this->createIndex('idx-city-district_id', 'city', 'district_id');
        $this->addForeignKey('fk-city-district_id', 'city', 'district_id', 'district', 'id', 'CASCADE');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('city');
    }
}
