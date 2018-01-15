<?php

use yii\db\Migration;

/**
 * Class m180110_151144_add_columns_to_animal_table
 */
class m180110_151144_add_columns_to_animal_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->alterColumn('animal', 'created_at', $this->text());
        $this->alterColumn('animal', 'updated_at', $this->text());
        $this->dropColumn('animal', 'created');
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m180110_151144_add_columns_to_animal_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180110_151144_add_columns_to_animal_table cannot be reverted.\n";

        return false;
    }
    */
}
