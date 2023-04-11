<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%fruits}}`.
 */
class m230408_063956_create_fruits_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%fruits}}', [
            'id' => $this->primaryKey(),
            'genus' => $this->string(255),
            'name' => $this->string(255),
            'family' => $this->string(255),
            'order' => $this->string(255),
            'favorite' => $this->integer(1),
            'nutrition_id' => $this->integer(11),
        ]);

        // creates index for column `post_id`
        $this->createIndex(
            'idx-fruits-nutrition_id',
            'fruits',
            'nutrition_id'
        );

        // add foreign key for table `tag`
        $this->addForeignKey(
            'fk-fruits-nutrition_id',
            'fruits',
            'nutrition_id',
            'nutritions',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

        // drops foreign key for table `post`
        $this->dropForeignKey(
            'fk-fruits-nutrition_id',
            'fruits'
        );

        // drops index for column `post_id`
        $this->dropIndex(
            'idx-fruits-nutrition_id',
            'fruits'
        );

        $this->dropTable('{{%fruits}}');
    }
}
