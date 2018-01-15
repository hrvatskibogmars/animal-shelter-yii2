<?php

use yii\db\Migration;

/**
 * Handles the creation of table `animal`.
 */
class m180109_140546_create_animal_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeup()
    {
        $this->createTable('animal', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'created' => $this->timestamp(),
            'vaccinate' => $this->boolean(),

        ]);
    }

    /**
     * @inheritdoc
     */
    public function safedown()
    {
        $this->dropTable('animal');
    }
}
