<?php
use rmrevin\yii\fontawesome\FAB;
?>
<footer class="footer mt">
    <div class="container">
        <div class="row">
            <div class="footer-logo"><img src="/images/icon.svg" alt="icon"/> <span>Crypto LAB</span></div>
        </div>
        <div class="row mb mt">
            <div class="col-md-3">
                <ul>
                    <li>CEO Speaking</li>
                    <li>White Paper
                        <ol>
                            <li>WP Cryptolab</li>
                            <li>WP Weco</li>
                            <li>WP Stable Coin</li>
                        </ol>
                    </li>
                </ul>
            </div>
            <div class="col-md-3">
                <ul>
                    <li>Product
                        <ol>
                            <li>WP Cryptolab</li>
                            <li>WP Weco</li>
                            <li>WP Stable Coin</li>
                        </ol>
                    </li>
                </ul>
            </div>
            <div class="col-md-3">
                <ul>
                    <li>LEARN
                        <ol>
                            <li>Article And Blog</li>
                            <li>FAQ</li>
                            <li>Academi</li>
                        </ol>
                    </li>
                </ul>
            </div>
            <div class="col-md-3">
                <ul>
                    <li>COMPANY
                        <ol>
                            <li>Team</li>
                            <li>Privacy</li>
                        </ol>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container">
        <p class="pull-left social-icon">
            <?=FAB::icon('facebook-square')?>
            <?=FAB::icon('whatsapp-square')?>
            <?=FAB::icon('youtube-square')?>
            <?=FAB::icon('twitter-square')?>
            <?=FAB::icon('telegram-plane')?>
            <?=FAB::icon('instagram')?>
        </p>

        <p class="pull-right">&copy; ECRYPTO LAB <?= date('Y') ?></p>
    </div>
</footer>