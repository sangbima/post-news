<?php

namespace app\models\base;

use Yii;
use yii\db\ActiveRecord;

class BaseModel extends ActiveRecord
{
    public static function model($className = __CLASS__) 
    {
        return parent::model($className);
    }

    /**
     * Digunakan untuk memberikan nilai deleted_at
     */
    public function delete()
    {
        $model = parent::find()
            ->where(['id' => $this->id])
            ->one();
        $model->deleted_at = date('U');

        return $model->save(false);
    }

    /**
     * Digunakan untuk mengecek apakah record ada di tempat sampah atau tidak
     */
    public function trashed()
    {
        return parent::find()
            ->onCondition(['<>', 'deleted_at', 'null']);
    }

    /**
     * Digunakan untuk mengembalikan nilai deleted_at ke null
     */
    public function restore()
    {
        $model = parent::find()
            ->where(['id' => $this->id])
            ->one();
        $model->deleted_at = null;

        return $model->save(false);
    }

    /**
     * Digunakan untuk mengambil semua record, termasuk record dengan deleted_at tidak null
     */
    public function withTrashed()
    {
        return parent::find();
    }

    /**
     * Digunakan untuk mengambil record dengan deleted_at tidak null
     */
    public function onlyTrashed()
    {
        return parent::find()
            ->where(['IS NOT', 'deleted_at', new \yii\db\Expression('null')]);
    }

    /**
     * Digunakan untuk menghapus record secara permanent
     */
    public function forceDelete()
    {
        return parent::delete();
    }

    /**
     * Digunakan untuk mengambil semua record, dimana kolom deleted_at adalah null
     */
    public static function findWithoutTrash()
    {
        return parent::find()
            ->where(['IS', 'deleted_at', new \yii\db\Expression('null')]);
    }
}