<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;

/**
 * This is the model class for table "exchange_rate".
 *
 * @property int $id
 * @property string $from
 * @property string $to
 * @property float|null $rate
 * @property int|null $ico
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property int|null $created_at
 * @property int|null $updated_at
 */
class ExchangeRate extends \yii\db\ActiveRecord
{
    public function behaviors()
    {
        return [
            TimestampBehavior::class,
            BlameableBehavior::class
        ];
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'exchange_rate';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['from', 'to'], 'required'],
            [['rate'], 'number'],
            [['ico', 'created_by', 'updated_by', 'created_at', 'updated_at'], 'integer'],
            [['from', 'to'], 'string', 'max' => 150],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'from' => 'From',
            'to' => 'To',
            'rate' => 'Rate',
            'ico' => 'ICO?',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * {@inheritdoc}
     * @return \app\models\query\ExchangeRateQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\query\ExchangeRateQuery(get_called_class());
    }
}
