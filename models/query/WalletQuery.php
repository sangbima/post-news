<?php

namespace app\models\query;

/**
 * This is the ActiveQuery class for [[\app\models\Wallet]].
 *
 * @see \app\models\Wallet
 */
class WalletQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \app\models\Wallet[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \app\models\Wallet|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }

    public function stage1()
    {
        return $this->andWhere(['stage' => 1]);
    }

    public function stage2()
    {
        return $this->andWhere(['stage' => 2]);
    }

    public function stage3()
    {
        return $this->andWhere(['stage' => 3]);
    }

    public function stage4()
    {
        return $this->andWhere(['stage' => 4]);
    }

    public function stage5()
    {
        return $this->andWhere(['stage' => 5]);
    }

    public function indonesia()
    {
        return $this->andWhere(['country' => 1]);
    }

    public function singapore()
    {
        return $this->andWhere(['country' => 2]);
    }

    public function usa()
    {
        return $this->andWhere(['country' => 3]);
    }

    public function uea()
    {
        return $this->andWhere(['country' => 4]);
    }
    
    public function hongkong()
    {
        return $this->andWhere(['country' => 5]);
    }
}
