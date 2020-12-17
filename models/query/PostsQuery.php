<?php

namespace app\models\query;

/**
 * This is the ActiveQuery class for [[\app\models\Posts]].
 *
 * @see \app\models\Posts
 */
class PostsQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \app\models\Posts[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \app\models\Posts|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }

    public function important()
    {
        return $this->andWhere(['is_important' => 10]);
    }

    

    public function products()
    {
        return $this->andWhere(['category_id' => 1]);
    }

    public function partners()
    {
        return $this->andWhere(['category_id' => 2]);
    }

    public function features()
    {
        return $this->andWhere(['category_id' => 3]);
    }

    public function wp()
    {
        return $this->andWhere(['category_id' => 4]);
    }

    public function learns()
    {
        return $this->andWhere(['category_id' => 5]);
    }

    public function companies()
    {
        return $this->andWhere(['category_id' => 6]);
    }

    public function faq()
    {
        return $this->andWhere(['category_id' => 7]);
    }

    public function ceo()
    {
        return $this->andWhere(['category_id' => 8]);
    }
}
