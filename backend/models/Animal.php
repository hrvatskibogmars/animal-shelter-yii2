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
            [['vaccinated', 'sterilized','sex_male'], 'boolean'],
            [['name', 'nickname','chipid'], 'string', 'max' => 255],
            [['featured', 'status','type','created_at', 'updated_at', 'breed', 'specie'], 'integer'],
            [['nickname', 'image'], 'string'],
            [['birthday', 'description'], 'required'],
            [['file'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],
            [['galleryFiles'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg', 'maxFiles' => 4],
            [['gallery'], 'each', 'rule' => ['string']],

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
            'file' => 'Profilna slika',
            'galleryFiles' => 'Galerija slika',
            'specie' => 'Vrsta zivotinje',
            'breed' => 'Pasmina',
            'sex_male' => 'Spol',
            'status' => 'Status',
            'featured' => 'Istaknuti oglas',
            'birthday' => 'Datum Rođenja',
            'vaccinated' => 'Cijepljen',
            'sterilized' => 'Steriliziran',
            'chipid'=> 'Broj čipa'



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

    /**
   * fetch stored image file name with complete path
   * @return string
   */
    public function getImageFile()
    {
        return isset($this->image) ? Yii::$app->params['uploadPath'] . $this->image : null;
    }

    /**
     * fetch stored image url
     * @return string
     */
    public function getImageUrl()
    {
        // return a default image placeholder if your source avatar is not found
        $image = isset($this->image) ? $this->image : 'default_img.jpg';
        return Yii::$app->params['uploadUrl'] . $image;
    }
    /**
  * Process upload of image
  *
  * @return mixed the uploaded image instance
  */
    public function uploadImage()
    {
        // get the uploaded file instance. for multiple file uploads
        // the following data will return an array (you may need to use
        // getInstances method)
        $image = UploadedFile::getInstance($this, 'image');

        // if no image was uploaded abort the upload
        if (empty($image)) {
            return false;
        }

        // store the source file name
        $this->filename = $image->name;
        $ext = end((explode(".", $image->name)));

        // generate a unique file name
        $this->avatar = Yii::$app->security->generateRandomString().".{$ext}";

        // the uploaded image instance
        return $image;
    }

    /**
    * Process deletion of image
    *
    * @return boolean the status of deletion
    */
    public function deleteImage()
    {
        $file = $this->getImageFile();

        // check if file exists on server
        if (empty($file) || !file_exists($file)) {
            return false;
        }

        // check if uploaded file can be deleted on server
        if (!unlink($file)) {
            return false;
        }

        // if deletion successful, reset your file attributes
        $this->avatar = null;
        $this->filename = null;

        return true;
    }
}
