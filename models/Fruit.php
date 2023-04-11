<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "fruits".
 *
 * @property int $id
 * @property string|null $genus
 * @property string|null $name
 * @property string|null $family
 * @property string|null $order
 * @property int $favorite
 * @property int|null $nutrition_id
 */
class Fruit extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'fruits';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id', 'nutrition_id', 'favorite'], 'integer'],
            [['genus', 'name', 'family', 'order'], 'string', 'max' => 255],
            [['id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'genus' => 'Genus',
            'name' => 'Name',
            'family' => 'Family',
            'order' => 'Order',
            'favorite' => 'Favorite',
            'nutrition_id' => 'Nutrition ID',
        ];
    }
}
