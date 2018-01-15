<?php

use yii\db\Migration;

/**
 * Class m180109_171036_add_columns_to_animal_table
 */
class m180109_171036_add_columns_to_animal_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->addColumn('animal', 'created_at', $this->datetime()->notNull());
        $this->addColumn('animal', 'updated_at', $this->datetime());
        $this->addColumn('animal', 'birthday', $this->datetime());
        $this->addColumn('animal', 'image', $this->text());
        $this->addColumn('animal', 'nickname', $this->text());
        $this->addColumn('animal', 'description', $this->text());
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m180109_171036_add_columns_to_animal_table cannot be reverted.\n";
        $this->dropColumn('animal', 'created_at');
        $this->dropColumn('animal', 'updated_at');
        $this->dropColumn('animal', 'image');
        $this->dropColumn('animal', 'birthday');
        $this->dropColumn('animal', 'nickname');
        $this->dropColumn('animal', 'description');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180109_171036_add_columns_to_animal_table cannot be reverted.\n";

        return false;
    }
    */
}
