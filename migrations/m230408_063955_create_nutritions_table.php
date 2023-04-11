<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%nutritions}}`.
 */
class m230408_063955_create_nutritions_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%nutritions}}', [
            'id' => $this->primaryKey(),
            'carbohydrates' => $this->float(),
            'protein' => $this->float(),
            'fat' => $this->float(),
            'calories' => $this->integer(),
            'sugar' => $this->integer(),
        ]);

//        $this->alterColumn('{{%status}}', 'id', $this->integer(11).' NOT NULL AUTO_INCREMENT');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%nutritions}}');
    }
}
