<?php
use rmrevin\yii\fontawesome\FAB;
use yii\helpers\Html;
use yii\helpers\Url;
?>
<footer class="footer mt">
    <div class="container">
        <div class="row">
            <div class="footer-logo"><img src="/images/icon.svg" alt="icon"/> <span>Crypto LAB</span></div>
        </div>
        <div class="row mb mt">
            <div class="col-md-3">
                <ul>
                    <li>
                        <?=Html::a('CEO Speaking', ['#'], $options = [])?>
                    </li>
                    <li>White Paper
                        <ol>
                            <li><?=Html::a('WP Cryptolab', ['#'], $options = [])?></li>
                            <li><?=Html::a('WP Weco', ['#'], $options = [])?></li>
                            <li><?=Html::a('WP Stable Coin', ['#'], $options = [])?></li>
                        </ol>
                    </li>
                </ul>
            </div>
            <div class="col-md-3">
                <ul>
                    <li>Product
                        <ol>
                            <li><?=Html::a('WP Cryptolab', ['#'], $options = [])?></li>
                            <li><?=Html::a('WP Weco', ['#'], $options = [])?></li>
                            <li><?=Html::a('WP Stable Coin', ['#'], $options = [])?></li>
                        </ol>
                    </li>
                </ul>
            </div>
            <div class="col-md-3">
                <ul>
                    <li>LEARN
                        <ol>
                            <li><?=Html::a('Article And Blog', ['#'], $options = [])?></li>
                            <li><?=Html::a('FAQ', ['#'], $options = [])?></li>
                            <li><?=Html::a('Academi', ['#'], $options = [])?></li>
                        </ol>
                    </li>
                </ul>
            </div>
            <div class="col-md-3">
                <ul>
                    <li>COMPANY
                        <ol>
                            <li><?=Html::a('Team', ['#'], $options = [])?></li>
                            <li><?=Html::a('Privacy', ['#'], $options = [])?></li>
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

        <p class="pull-right">&copy; ECRYPTO LAB <?= date('Y') ?></p>
    </div>
</footer>