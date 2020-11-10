<?php

namespace app\models\base;

use app\models\EventParams;
use app\models\EventTypes;
use yii\helpers\ArrayHelper;

class DataCollections
{
    public static function ListDataEventTypes()
    {
        $datas = ArrayHelper::map(EventTypes::find()->select(['id', 'event_type_name'])->all(), 'id', 'event_type_name');
        return $datas;
    }

    public static function ListDataEventParams()
    {
        $datas = ArrayHelper::map(EventParams::find()->select(['id', 'param_name'])->all(), 'id', 'param_name');
        return $datas;
    }
}