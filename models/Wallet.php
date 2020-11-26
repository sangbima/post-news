<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "wallet".
 *
 * @property int $id
 * @property string $name
 * @property string $address
 * @property string $id_member
 * @property int $stage
 * @property float $coin
 * @property int $country
 * @property string|null $buy_date
 */
class Wallet extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'wallet';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'address', 'id_member', 'stage', 'coin', 'country'], 'required'],
            [['stage', 'country'], 'integer'],
            [['coin'], 'number'],
            [['buy_date'], 'safe'],
            [['name', 'address'], 'string', 'max' => 150],
            [['id_member'], 'string', 'max' => 50],
            [['address'], 'unique'],
            [['id_member'], 'unique'],
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
            'address' => 'Address',
            'id_member' => 'ID',
            'stage' => 'Stage',
            'coin' => 'Coin',
            'country' => 'Country',
            'buy_date' => 'Buy Date',
        ];
    }

    /**
     * {@inheritdoc}
     * @return \app\models\query\WalletQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\query\WalletQuery(get_called_class());
    }
}
