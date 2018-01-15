<?php

use yii\db\Migration;

/**
 * Class m180110_184123_add_columns_to_animal_table
 */
class m180110_184123_add_columns_to_animal_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->addColumn('animal', 'sex_male', $this->boolean());
        $this->addColumn('animal', 'approved', $this->boolean());
        $this->addColumn('animal', 'featured', $this->boolean());
        $this->addColumn('animal', 'foster_care', $this->boolean());
        $this->addColumn('animal', 'parasite', $this->boolean());
        $this->addColumn('animal', 'castrated', $this->boolean());
        $this->addColumn('animal', 'rabies', $this->boolean());
        $this->addColumn('animal', 'infectious_diseases', $this->boolean());
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m180110_184123_add_columns_to_animal_table cannot be reverted.\n";
        $this->dropColumn('animal', 'sex_male');
        $this->dropColumn('animal', 'approved');
        $this->dropColumn('animal', 'featured');
        $this->dropColumn('animal', 'foster_care');
        $this->dropColumn('animal', 'parasite');
        $this->dropColumn('animal', 'castrated');
        $this->dropColumn('animal', 'rabies');
        $this->dropColumn('animal', 'infectious_diseases');
        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180110_184123_add_columns_to_animal_table cannot be reverted.\n";

        return false;
    }
    */
}
