<?php

namespace app\models;

use Yii;
use yii\behaviors\SluggableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;

/**
 * This is the model class for table "posts".
 *
 * @property int $id
 * @property string $title
 * @property string $slug
 * @property string $content
 * @property string|null $image
 * @property int|null $is_important
 * @property int|null $type
 * @property int|null $category_id
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property int|null $created_by
 * @property int|null $updated_by
 */
class Posts extends \yii\db\ActiveRecord
{
    const IMPORTANT = 10;
    const NOT_IMPORTANT = 9;
    const PAGE = 9;
    const ARTICLE = 10;

    public function behaviors()
    {
        return [
            TimestampBehavior::class,
            BlameableBehavior::class,
            [
                'class' => SluggableBehavior::class,
                'attribute' => 'title',
                'ensureUnique' => true
            ]
        ];
    }
    
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'posts';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'slug', 'content', 'type'], 'required'],
            [['content'], 'string'],
            [['is_important', 'type', 'category_id', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['title', 'slug'], 'string', 'max' => 100],
            [['image'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, jpeg, svg'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'slug' => 'Slug',
            'content' => 'Content',
            'image' => 'Image',
            'is_important' => 'Is Important',
            'type' => 'Type',
            'category_id' => 'Category',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }

    public function getCreatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }

    public function getUpdatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'updated_by']);
    }

    public function getCategory()
    {
        return Yii::$app->datastatic->getCategory($this->category_id);
    }

    /**
     * {@inheritdoc}
     * @return \app\models\query\PostsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\query\PostsQuery(get_called_class());
    }
}
