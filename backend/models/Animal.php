<?php

namespace backend\models;

use Yii;
use yii\db\ActiveRecord;
use yii\behaviors\SluggableBehavior;
use yii\behaviors\BlameableBehavior;
use yii\web\UploadedFile;

/**
 * This is the model class for table "animal".
 *
 * @property int $id
 * @property string $name
 * @property string $created
 * @property bool $vaccinate
 */
class Animal extends \yii\db\ActiveRecord
{
    public $file;
    public $galleryFiles;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'animal';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['vaccinate'], 'boolean'],
            [['name'], 'string', 'max' => 255],
            [['nickname', 'image'], 'string', 'on' => 'update-photo-upload'],
            [['birthday', 'description'], 'required'],
            [['created_at', 'updated_at', 'breed', 'specie'], 'integer'],
            [['file'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg','on' => 'update-photo-upload'],
            [['galleryFiles'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg', 'maxFiles' => 4, 'on' => 'update-photo-upload'],
            [['gallery'], 'each', 'rule' => ['string'], 'on' => 'update-photo-upload'],

        ];
    }
    public function behaviors()
    {
        return [
                   [
                       'class' => BlameableBehavior::className(),
                       'createdByAttribute' => 'created_at',
                       'updatedByAttribute' => 'updated_at',
                   ],
                   'timestamp' => [
                       'class' => 'yii\behaviors\TimestampBehavior',
                       'attributes' => [
                           ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                           ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                       ],
                   ],
               ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Ime',
            'nickname' => 'Nadimak',
            'created_at' => 'Datum kreiranja',
            'description' => 'Bilješke',
            'vaccinate' => 'Cijepljen',
            'file' => 'Profilna Slika',
            'foster_care' => 'Udomljen',
            'parasite' => 'Paraziti',
            'castrated' => 'Kastriran',
            'sex_male' => 'Spol: Muški'



        ];
    }

    /**
     * @inheritdoc
     * @return AnimalQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new AnimalQuery(get_called_class());
    }
}
