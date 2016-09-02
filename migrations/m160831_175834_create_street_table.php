<?php

use yii\db\Migration;

/**
 * Handles the creation for table `street`.
 */
class m160831_175834_create_street_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('street', [
            'id' => $this->primaryKey(),
            'name' => $this->string(50)->notNull(),
            'district_id' =>$this->integer()->notNull(),
            'city_id' =>$this->integer()->notNull(),
        ]);

        $this->createIndex('idx-street_city_id', 'street', 'city_id');
        $this->addForeignKey('fk-street_city_id', 'street', 'city_id', 'city', 'id', 'CASCADE');
        $this->createIndex('idx-street-district_id', 'street', 'district_id');
        $this->addForeignKey('fk-street-district_id', 'street', 'district_id', 'district', 'id', 'CASCADE');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('street');
    }
}
