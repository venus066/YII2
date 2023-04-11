<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "nutritions".
 *
 * @property int $id
 * @property float|null $carbohydrates
 * @property float|null $protein
 * @property float|null $fat
 * @property int|null $calories
 * @property float|null $sugar
 */
class Nutrition extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'nutritions';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id', 'calories'], 'integer'],
            [['carbohydrates', 'protein', 'fat', 'sugar'], 'number'],
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
            'carbohydrates' => 'Carbohydrates',
            'protein' => 'Protein',
            'fat' => 'Fat',
            'calories' => 'Calories',
            'sugar' => 'Sugar',
        ];
    }
}
