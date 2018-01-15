<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "Species".
 *
 * @property string $name
 * @property string $id
 *
 * @property Breed[] $breeds
 */
class Species extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'species';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'name' => 'Name',
            'id' => 'ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBreeds()
    {
        return $this->hasMany(Breed::className(), ['fk_species' => 'id']);
    }
}
