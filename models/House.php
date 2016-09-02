<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "house".
 *
 * @property integer $id
 * @property string $number
 * @property integer $district_id
 * @property integer $city_id
 * @property integer $street_id
 *
 * @property Street $street
 */
class House extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'house';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['number', 'district_id', 'city_id', 'street_id'], 'required'],
            [['district_id', 'city_id', 'street_id'], 'integer'],
            [['number'], 'string', 'max' => 50],
            [['street_id'], 'exist', 'skipOnError' => true, 'targetClass' => Street::className(), 'targetAttribute' => ['street_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'number' => 'Number',
            'district_id' => 'District ID',
            'city_id' => 'City ID',
            'street_id' => 'Street ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStreet()
    {
        return $this->hasOne(Street::className(), ['id' => 'street_id']);
    }
}
