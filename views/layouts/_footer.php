<?php
use rmrevin\yii\fontawesome\FAB;
use yii\helpers\Html;
use yii\helpers\Url;
?>
<footer class="footer mt">
    <div class="container">
        <div class="row">
            <div class="footer-logo"><img src="/images/icon.svg" alt="icon"/> <span>Crypto Foundation</span></div>
        </div>
        <div class="row mb mt">
            <div class="col-md-3">
                <ul>
                    <li>
                        <?php 
                            $ceo = \app\models\Posts::find()->ceo()->one();
                            if ($ceo) {
                        ?>
                        <?=Html::a($ceo->title, ['/site/view-post', 'slug' => $ceo->slug], $options = [])?>
                        <?php } else { ?>
                            <?=Html::a('CEO Speaking', ['#'], $options = [])?>
                        <?php }?>
                    </li>
                    <li>White Paper
                        <ol>
                            <?php 
                                $wps = \app\models\Posts::find()->wp()->limit(3)->all();
                                if($wps) {
                                    foreach($wps as $key => $wp) {
                                        ?>
                                        <li><?=Html::a($wp->title, ['/site/view-post', 'slug' => $wp->slug], $options = [])?></li>
                                        <?php
                                    }
                                } else {
                            ?>
                            <li><?=Html::a('WP Cryptolab', ['#'], $options = [])?></li>
                            <li><?=Html::a('WP Weco', ['#'], $options = [])?></li>
                            <li><?=Html::a('WP Stable Coin', ['#'], $options = [])?></li>
                                <?php }?>
                        </ol>
                    </li>
                </ul>
            </div>
            <div class="col-md-3">
                <ul>
                    <li>Product
                        <ol>
                            <?php 
                                $products = \app\models\Posts::find()->products()->limit(3)->all();
                                if($products) {
                                    foreach($products as $key => $product) {
                                        ?>
                                        <li><?=Html::a($product->title, ['/site/view-post', 'slug' => $product->slug], $options = [])?></li>
                                        <?php
                                    }
                                } else {
                            ?>
                            <li><?=Html::a('WP Cryptolab', ['#'], $options = [])?></li>
                            <li><?=Html::a('WP Weco', ['#'], $options = [])?></li>
                            <li><?=Html::a('WP Stable Coin', ['#'], $options = [])?></li>
                            <?php }?>
                        </ol>
                    </li>
                </ul>
            </div>
            <div class="col-md-3">
                <ul>
                    <li>LEARN
                        <ol>
                            <?php 
                                $learns = \app\models\Posts::find()->learns()->limit(3)->all();
                                if($learns) {
                                    foreach($learns as $key => $learn) {
                                        ?>
                                        <li><?=Html::a($learn->title, ['/site/view-post', 'slug' => $learn->slug], $options = [])?></li>
                                        <?php
                                    }
                                } else {
                            ?>
                            <li><?=Html::a('Article And Blog', ['#'], $options = [])?></li>
                            <li><?=Html::a('FAQ', ['#'], $options = [])?></li>
                            <li><?=Html::a('Academi', ['#'], $options = [])?></li>
                            <?php }?>
                        </ol>
                    </li>
                </ul>
            </div>
            <div class="col-md-3">
                <ul>
                    <li>COMPANY
                        <ol>
                            <?php 
                                $companies = \app\models\Posts::find()->companies()->limit(3)->all();
                                if($companies) {
                                    foreach($companies as $key => $company) {
                                        ?>
                                        <li><?=Html::a($company->title, ['/site/view-post', 'slug' => $company->slug], $options = [])?></li>
                                        <?php
                                    }
                                } else {
                            ?>
                            <li><?=Html::a('Team', ['#'], $options = [])?></li>
                            <li><?=Html::a('Privacy', ['#'], $options = [])?></li>
                            <?php }?>
                        </ol>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container">
        <p class="pull-left social-icon">
            <?=Html::a(FAB::icon('facebook-square'), ['#'], $options = [])?>
            <?=Html::a(FAB::icon('whatsapp-square'), ['#'], $options = [])?>
            <?=Html::a(FAB::icon('youtube-square'), ['#'], $options = [])?>
            <?=Html::a(FAB::icon('twitter-square'), ['#'], $options = [])?>
            <?=Html::a(FAB::icon('telegram-plane'), ['#'], $options = [])?>
            <?=Html::a(FAB::icon('instagram'), ['#'], $options = [])?>
        </p>

        <p class="pull-right">&copy; ECRYPTO Foundation <?= date('Y') ?></p>
    </div>
</footer>