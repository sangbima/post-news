<?php

use yii\helpers\Html;
/* @var $this yii\web\View */
/* @var $searchModel app\models\search\SearchPosts */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'FAQ';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="faq-index container min-height">
    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
        <?php foreach($faqs as $key => $faq):?>
            <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="heading-<?=$key?>">
                    <h4 class="panel-title">
                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse-<?=$key?>" aria-expanded="false" aria-controls="collapse-<?=$key?>">
                        <?=$faq->title?>
                        </a>
                    </h4>
                </div>
                <div id="collapse-<?=$key?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading-<?=$key?>">
                    <div class="panel-body">
                        <?=$faq->content?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
