<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "advisors".
 *
 * @property int $id
 * @property string $name
 * @property string $title
 * @property string $img
 * @property string $description
 */
class Advisors extends \yii\db\ActiveRecord
{
    public $photo;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'advisors';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'title', 'description'], 'required'],
            [['description'], 'string'],
            [['name', 'img'], 'string', 'max' => 150],
            [['title'], 'string', 'max' => 50],
            [['photo'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, jpeg, svg']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'title' => 'Title',
            'img' => 'Img',
            'description' => 'Description',
            'photo' => 'Avatar'
        ];
    }
}
