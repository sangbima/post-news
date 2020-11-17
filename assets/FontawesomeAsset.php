<?php
/**
 * Filename: FontawesomeAsset.php
 *
 * @author: Khairil <sangbima.net@gmail.com>
 * Date: 15/11/20
 * Time: 17.27
 */

namespace app\assets;

use yii\web\AssetBundle;

class FontawesomeAsset extends AssetBundle
{
    public $sourcePath = '@vendor/fortawesome/font-awesome';
    public $css = [
        'css/all.min.css'
    ];
    public $js = [];
    public $depends = [];
}