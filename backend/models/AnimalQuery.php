<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[Animal]].
 *
 * @see Animal
 */
class AnimalQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Animal[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Animal|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
