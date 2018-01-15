<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "breed".
 *
 * @property string $name
 * @property int $type
 * @property string $id
 *
 * @property Species $type0
 */
class Breed extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'breed';
    }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'string'],
            [['fk_species'], 'default', 'value' => null],
            [['fk_species'], 'integer'],
            [['fk_species'], 'exist', 'skipOnError' => true, 'targetClass' => Species::className(), 'targetAttribute' => ['fk_species' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'name' => 'Pasmina',
            'fk_species' => 'Vrsta',
            'id' => 'ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSpecies()
    {
        return $this->hasOne(Species::className(), ['id' => 'fk_species']);
    }
}
